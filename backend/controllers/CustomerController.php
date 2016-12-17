<?php
namespace backend\controllers;
use common\models\Customer;
use common\models\Customer_status;
use common\models\Member;
use common\models\Money;
use common\models\Status_notes;
use yii;
use yii\web\Controller;

class CustomerController extends Controller{
    public $layout=false;
    function actionCustomer_list(){
        (new PerController())->Permission();
        $customer=new Customer();
        $model=$customer->Database()['model'];
        $total=$customer->Database()['total'];
        $page=$customer->Database()['page'];
        $member=Member::find()->asArray()->all();
        /*$sql="SELECT * FROM ".Member::tableName()." WHERE mid IN (2,3,5,15,25,51,58,59,60,61,71)";
        $member=Member::findBySql($sql)->asArray()->all();*/
     return $this->render('customer_list',['model'=>$model,'total'=>$total,'page'=>$page,'member'=>$member]);
    }

    function actionCustomer_cl(){
        (new PerController())->Permission();
        if(!Yii::$app->request->post('clusername')==0){
            $member=Member::find()->where(['username'=>Yii::$app->request->post('clusername')])->asArray()->all();
            $id=Yii::$app->request->post('c_idd');
            $customer=Customer::findOne($id);
            $customer->fenpei=Yii::$app->request->post('clusername');
            $customer->fenpeiren=$member[0]['baobeiren'];
            $res=$customer->save();
            if($res){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>14]);
        }
    }

    function actionCustomer_search(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if($post){
            $username=Yii::$app->request->post('username');
            $tel=Yii::$app->request->post('tel');
            $baobeiren=Yii::$app->request->post('baobeiren');
            $tuijianren=Yii::$app->request->post('tuijianren');
            $fenpeiren=Yii::$app->request->post('fenpeiren');
            $search=array();
            if(!empty($username)){
                $search[]="username like '%{$username}%'";
            }
            if(!empty($tel)){
                $search[]="tel like '%{$tel}%'";
            }
            if(!empty($baobeiren)){
                $search[]="baobeiren like '%{$baobeiren}%'";
            }
            if(!empty($tuijianren)){
                $search[]="tuijianren like '%{$tuijianren}%'";
            }
            if(!empty($fenpeiren)){
                $search[]="fenpeiren like '%{$fenpeiren}%'";
            }
            if(count($search)>0){
                $where=" WHERE ".implode(" AND ",$search);
            }
            if(empty($where)){
                return  $this->redirect(['/redirect/redirect','user_id'=>13]);
            }
            $Customer=new Customer();
            $total=Customer::find()->count();
            $sql="SELECT * FROM ".Customer::tableName()." {$where} ";
            $model=$Customer->findBySql($sql)->asArray()->all();

            $member=Member::find()->asArray()->all();
            /*$sql="SELECT * FROM ".Member::tableName()." WHERE mid IN (2,3,5,15,25,51,58,59,60,61)";
            $member=Member::findBySql($sql)->asArray()->all();*/

            return $this->render('customer_search',['model'=>$model,'total'=>$total,'member'=>$member]);
        }else{
            return  $this->redirect(['/customer/customer_search','page'=>1]);
        }
    }

    function actionCustomer_details(){
        (new PerController())->Permission();
        $money_cid=Money::find()->where(['cid'=>Yii::$app->request->get('cid')])->asArray()->all();
        $sql="SELECT * FROM  customer INNER JOIN customer_status INNER JOIN money ON customer_status.cid=customer.cid AND customer_status.m_mid=money.m_mid  WHERE customer.cid=".Yii::$app->request->get('cid')." AND money.m_mid=".$money_cid[0]['m_mid']."";
        $model=Customer::findBySql($sql)->asArray()->all();
        $status_notes=Status_notes::find()->where(['cid'=>Yii::$app->request->get('cid')])->asArray()->all();
        return $this->render('customer_details',['model'=>$model,'notes'=>$status_notes]);
    }

    //********************************

    function actionMoney(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            $model=Yii::$app->db->createCommand("UPDATE money SET m_yongjin=".Yii::$app->request->post('m_yongjin').",m_status=1 WHERE cid=".Yii::$app->request->post('cid')."")->execute();
            if($model){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

    function actionMoney_tx(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            $model=Yii::$app->db->createCommand("UPDATE money SET m_status=".Yii::$app->request->post('m_status')." WHERE cid=".Yii::$app->request->post('cid')."")->execute();
            if($model){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

    function actionStatus_hf(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
           $status_notes=new Status_notes();
            $status_notes->cid=Yii::$app->request->post('cid');
            $status_notes->sn_content=Yii::$app->request->post('sn_content');
            $status_notes->sn_date=date('Y')."年".date('m')."月".date('d')."日";
            $status_notes->sn_sf=Yii::$app->request->post('sn_sf');
            $status_notes->genjinren=Yii::$app->session->get('MM_Username');
            $res=$status_notes->save();
            if($res){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

    function actionStatus_sh(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            Yii::$app->db->createCommand("UPDATE customer SET status=".Yii::$app->request->post('sn_status')." WHERE cid=".Yii::$app->request->post('cid')."")->execute();
            $model=Yii::$app->db->createCommand("UPDATE status_notes SET sn_status=".Yii::$app->request->post('sn_status')." WHERE cid=".Yii::$app->request->post('cid')."")->execute();
            if($model){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

    function actionCustomer_del(){
        (new PerController())->Permission();
        $cid=Yii::$app->request->get('cid');
        $model=Customer::findOne($cid);
        $model->delete();
        Yii::$app->db->createCommand("DELETE FROM ".Customer_status::tableName()." WHERE cid=$cid")->execute();
        Yii::$app->db->createCommand("DELETE FROM ".Money::tableName()." WHERE cid=$cid")->execute();
        $modelc=Yii::$app->db->createCommand("DELETE FROM ".Status_notes::tableName()." WHERE cid=$cid")->execute();
        $res=$modelc;
        if($res){
            return  $this->redirect(['/redirect/redirect','user_id'=>9]);
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>10]);
        }
    }
}
?>