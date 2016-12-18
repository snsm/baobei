<?php
namespace frontend\controllers;

use common\models\Customer;
use common\models\Money;
use common\models\Other;
use common\models\Scheme;
use common\models\Status_notes;
use yii;
use yii\web\Controller;
use common\models\Member;
use dosamigos\qrcode\QrCode;

class HomeController extends Controller{
    public $layout='home';

    function actionIndex(){

            return $this->render('index');
    }

    function actionCustomer(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            return $this->render('customer');
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionCustomer_list(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $customer=new Customer();
            $model=$customer->DataWhere()['model'];
            $total=$customer->DataWhere()['total'];
            $page=$customer->DataWhere()['page'];
            return $this->render('customer_list',['model'=>$model,'total'=>$total,'page'=>$page]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionCustomer_status(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $customer=new Customer();
            $money_cid=Money::find()->where(['cid'=>Yii::$app->request->get('cid')])->asArray()->all();
            $sql="SELECT * FROM  customer INNER JOIN customer_status INNER JOIN money ON customer_status.cid=customer.cid AND customer_status.m_mid=money.m_mid  WHERE customer.cid=".Yii::$app->request->get('cid')." AND money.m_mid=".$money_cid[0]['m_mid']."";
            $model=$customer->findBySql($sql)->asArray()->all();
            $notes=Status_notes::find()->where(['cid'=>Yii::$app->request->get('cid')])->asArray()->all();
            return $this->render('customer_status',['model'=>$model,'notes'=>$notes]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionCommission(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $customer=Customer::find()->where(['tuijianren'=>Yii::$app->session->get('MEMBER_User')])->asArray()->all();
            foreach($customer as $key=>$val){
                $sql="SELECT * FROM customer INNER JOIN money ON customer.tuijianren=money.tuijianren AND customer.cid=money.cid WHERE money.tuijianren=".Yii::$app->session->get('MEMBER_User')." AND money.cid=".$val['cid']."";
                $join=Money::findBySql($sql)->asArray()->all();
                $model[]=$join;
            }
            return $this->render('commission',['model'=>$model]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionWithdraw(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            return $this->render('withdraw');
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionScheme(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $scheme=new Scheme();
            return $this->render('scheme',['total'=>$scheme->Database()['total'],'page'=>$scheme->Database()['page'],'model'=>$scheme->Database()['model']]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionScheme_details(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $model=Scheme::find()->where(['sc_id'=>Yii::$app->request->get('sc_id')])->asArray()->all();
            return $this->render('scheme_details',['model'=>$model]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionFaq(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $other=new Other();
            return $this->render('faq',['total'=>$other->Database()['total'],'page'=>$other->Database()['page'],'model'=>$other->Database()['model']]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionInfo(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $model=Member::find()->where(['username'=>$sess])->asArray()->all();
            return $this->render('info',['model'=>$model]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionQrcode(){
        return QrCode::png(''.SITE_HOME_URL.'/home/yqing?mid='.Yii::$app->session->get('Mid').'');
    }
    function actionYqing(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $session->set('Mid',Yii::$app->request->get('mid'));
            return $this->render('qrcode');
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionSuccess(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            $model=Member::find()->where(['username'=>$sess])->asArray()->all();
            return $this->render('success',['model'=>$model]);
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionLogin(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            return  $this->redirect(['/home/success']);
        }else{
            return $this->render('login');
        }
    }

    function actionRole(){
        $request = Yii::$app->request->get('token');
        if($request=='21232f297a57a5a743894a0e4a801fc3'){
            return $this->render('role');
        }else{
            return  $this->redirect(['/home/success']);
        }
    }
    function actionRoles(){
        $request = Yii::$app->request->post('token');
        if($request=='21232f297a57a5a743894a0e4a801fc3'){
            $username=Yii::$app->request->post('username');
            $result = Member::updateAll(['role'=>1],['username'=>$username]);
            if ($result){
                return '<script> alert("验证成功！"); window.location.href="'.SITE_HOME_URL.'/home/success"; </script>';
            }else{
                return '<script> alert("验证失败！"); window.location.href="'.SITE_HOME_URL.'/home/success"; </script>';
            }
        }else{
            return  $this->redirect(['/home/success']);
        }
    }

    function actionRegister(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            return  $this->redirect(['/home/info']);
        }else{
            return $this->render('register');
        }
    }

    function actionForget(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            return $this->render('forget');
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    function actionTreaty(){
        $session=Yii::$app->session;
        $sess=$session->get('MEMBER_User');
        if(isset($sess)){
            return $this->render('treaty');
        }else{
            return  $this->redirect(['/home/login']);
        }
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
?>
