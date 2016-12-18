<?php
namespace backend\controllers;

use common\models\Member;
use yii;
use yii\web\Controller;
use backend\models\Admin;
use yii\helpers\Url;
use dosamigos\qrcode\QrCode;

class AdminController extends Controller{
    public $layout=false;
    function actionLogin(){
        $resquest= Yii::$app->request;
        $session = Yii::$app->session;
        if(!$resquest->post('username')=="" || !$resquest->post('password')=="" || !$resquest->post('verification')==""){
            if(strtoupper($session->get('code')) == strtoupper($resquest->post('verification'))){
                $session->set('MM_Username',$resquest->post('username'));
            }else{
             return  $this->redirect(['/redirect/redirect','verify'=>1]);
            }
            if(Yii::$app->request->post('username')=='admin' ) {
                foreach (Admin::find()->where(['username' => Yii::$app->session['MM_Username']])->asArray()->batch(100) as $admin) {
                    $data[] = $admin;
                }
            }else{
                foreach (Member::find()->where(['baobeiren' => Yii::$app->session['MM_Username']])->asArray()->batch(100) as $admin) {
                    $data[] = $admin;
                }
            }

            if(md5($resquest->post('password'))==$data[0][0]['password']){
                $session->set('A_class',$data[0][0]['a_class']);
                $session->set('Member_name',$data[0][0]['username']);
                return  $this->redirect(['/admin/index']);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>2]);
            }

        }else{
            return $this->render('login');
        }
    }

    function actionIndex(){
        (new PerController())->Permission();
        return  $this->render('index');
    }

    function actionHeadtop(){
        (new PerController())->Permission();
        $model=Member::find()->where(['username'=>Yii::$app->session->get('Member_name')])->asArray()->all();
        return  $this->render('headtop',['model'=>$model]);
    }

    function actionMainleft(){
        (new PerController())->Permission();
        if(Yii::$app->session->get('A_class')==0 or Yii::$app->session->get('A_class')==1 or Yii::$app->session->get('A_class')==2) {
            $menu1 = [
                ['menul_id' => 1, 'menu_name' => '网站管理', 'url' => 'javascript:void(0)'],
                ['menul_id' => 3, 'menu_name' => '客户管理', 'url' => 'javascript:void(0)'],
            ];

            $menu2 = [
                ['menu2_id' => 1, 'menul_id' => 1, 'menu_name' => '网站首页', 'target' => '_blank', 'url' => SITE_HOME_URL],
                ['menu2_id' => 3, 'menul_id' => 3, 'menu_name' => '客户列表', 'target' => 'mainFrame', 'url' => Url::to(['customer/customer_list', 'page' => '1'])],
            ];
        }elseif(Yii::$app->session->get('A_class')==3){
            $menu1 = [
                ['menul_id' => 1, 'menu_name' => '网站管理', 'url' => 'javascript:void(0)'],
                ['menul_id' => 2, 'menu_name' => '会员管理', 'url' => 'javascript:void(0)'],
                ['menul_id' => 3, 'menu_name' => '客户管理', 'url' => 'javascript:void(0)'],
                ['menul_id' => 4, 'menu_name' => '方案管理', 'url' => 'javascript:void(0)'],
                ['menul_id' => 5, 'menu_name' => '其它管理', 'url' => 'javascript:void(0)'],
            ];

            $menu2 = [
                ['menu2_id' => 1, 'menul_id' => 1, 'menu_name' => '网站首页', 'target' => '_blank', 'url' => SITE_HOME_URL],
                ['menu2_id' => 2, 'menul_id' => 2, 'menu_name' => '会员列表', 'target' => 'mainFrame', 'url' => Url::to(['member/member_list', 'page' => '1'])],
                ['menu2_id' => 3, 'menul_id' => 3, 'menu_name' => '客户列表', 'target' => 'mainFrame', 'url' => Url::to(['customer/customer_list', 'page' => '1'])],
                ['menu2_id' => 4, 'menul_id' => 4, 'menu_name' => '方案列表', 'target' => 'mainFrame', 'url' => Url::to(['scheme/index', 'page' => '1'])],
                ['menu2_id' => 5, 'menul_id' => 4, 'menu_name' => '上传方案', 'target' => 'mainFrame', 'url' => Url::to(['scheme/upload'])],
                ['menu2_id' => 6, 'menul_id' => 5, 'menu_name' => '常见问题', 'target' => 'mainFrame', 'url' => Url::to(['scheme/upload'])],
                ['menu2_id' => 7, 'menul_id' => 5, 'menu_name' => '发布问题', 'target' => 'mainFrame', 'url' => Url::to(['other/issue'])],
            ];
        }
        return  $this->render('mainleft',['menu1'=>$menu1,'menu2'=>$menu2]);
    }

    function actionQrcodes(){
        return QrCode::png(''.SITE_HOME_URL.'/home/role?token=21232f297a57a5a743894a0e4a801fc3');
    }
    function actionMainright(){
        (new PerController())->Permission();
        return  $this->render('mainright');
    }

    function actionPwd_list(){
        (new PerController())->Permission();
        if(Yii::$app->session->get('A_class')==0 or Yii::$app->session->get('A_class')==1 or Yii::$app->session->get('A_class')==2) {
            $data = Admin::find()->where(['a_class'=>Yii::$app->session->get('A_class')])->asArray()->all();
        }elseif(Yii::$app->session->get('A_class')==3){
            $data = Admin::find()->asArray()->all();
        }
        return  $this->render('pwd_list',['model'=>$data]);
    }

    function actionPwd_update(){
        (new PerController())->Permission();
        $resquest= Yii::$app->request;
        if(!$resquest->post('aid')==""){
            $aid=$resquest->post('aid');
            $sql="SELECT * FROM admin WHERE aid=:aid";
            $data=Admin::findBySql($sql,[':aid'=>$aid])->asArray()->all();
           if(md5($resquest->post('ypassword'))===$data[0]['password']){
                $aid=$resquest->post('aid');
                $admin=Admin::findOne($aid);
                $admin->password=md5($resquest->post('xpassword'));
                $res=$admin->save();
                if($res){
                    return  $this->redirect(['/redirect/redirect','user_id'=>3]);
                }else{
                    return  $this->redirect(['/redirect/redirect','user_id'=>4]);
                }
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>6]);
            }

        }else{
            $aid=$resquest->get('aid');
            $sql="SELECT * FROM admin WHERE aid=:aid";
            $data=Admin::findBySql($sql,[':aid'=>$aid])->asArray()->all();
            return  $this->render('pwd_update',['model'=>$data]);
        }
    }


    function actionLogout(){
        (new PerController())->Permission();
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setCookie(session_name(),"",time()-3600,"/");
        }
        session_destroy();
        return $this->goHome();
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