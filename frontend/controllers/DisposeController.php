<?php
namespace frontend\controllers;
use common\models\Member;
use yii;
use yii\web\Controller;

class DisposeController extends Controller{
    public $layout='home';

    function is_mobile($mobile) {
        return preg_match("/^1[34578]{1}\d{9}$/",$mobile);
    }
    //注册
    function actionMember(){
        $resquest=Yii::$app->request;
        if($resquest->post('username')==""){
            return  $this->redirect(['/redirect/redirect','public_id'=>1]);
        }else{
            $username=$resquest->post('username');
            if(!$this->is_mobile($username)){
                return  $this->redirect(['/redirect/redirect','public_id'=>4]);
            }
            $sql="SELECT * FROM member WHERE username=:username";
            $data=Member::findBySql($sql,[':username'=>$username])->asArray()->all();
            if($username==$data[0]['username']){
                return  $this->redirect(['/redirect/redirect','public_id'=>5]);
            }else{
                 $member= new Member();
                 $member->baobeiren=$resquest->post('baobeiren');
                 $member->username=$username;
                 $member->password=md5($resquest->post('password'));
                 $res=$member->save();
                 if($res){
                     return  $this->redirect(['/redirect/redirect','public_id'=>2]);
                 }else{
                     return  $this->redirect(['/redirect/redirect','public_id'=>3]);
                 }
            }
        }
    }
    //登陆
    function actionLogin(){
        $resquest=Yii::$app->request;
        if($resquest->post('username')==""){
            return  $this->redirect(['/redirect/redirect','public_id'=>6]);
        }else{
            $username=$resquest->post('username');
            if(!$this->is_mobile($username)){
                return  $this->redirect(['/redirect/redirect','public_id'=>8]);
            }
            $sql="SELECT * FROM member WHERE username=:username";
            $data=Member::findBySql($sql,[':username'=>$username])->asArray()->all();
            if(!$username==$data[0]['username']){
                return  $this->redirect(['/redirect/redirect','public_id'=>12]);
            }
            if($username==$data[0]['username'] && md5($resquest->post('password'))==$data[0]['password']){
                $session=Yii::$app->session;
                $session->set('MEMBER_User',$username);
                $session->set('Baobeiren',$data[0]['baobeiren']);
                return  $this->redirect(['/home/success']);
            }else{
                return  $this->redirect(['/redirect/redirect','public_id'=>7]);
            }
        }
    }
    //退出
    function actionLogout(){
        (new PerController())->Permission();
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setCookie(session_name(),"",time()-3600,"/");
        }
        session_destroy();
        return $this->goHome();
    }

    //信息
    function actionInfo(){
        (new PerController())->Permission();
        $resquest=Yii::$app->request;
        $post=$resquest->post('dosubmit');
        if(isset($post)){
            $username=$resquest->post('username');
            $sql="SELECT * FROM member WHERE username=:username";
            $data=Member::findBySql($sql,[':username'=>$username])->asArray()->all();
            if($username==$data[0]['username'] && md5($resquest->post('ypassword'))==$data[0]['password']){
                $username=$resquest->post('username');
                $member= Member::updateAll(['password'=>md5($resquest->post('password'))],'username ='.$username.'');
                if($member){
                    return  $this->redirect(['/redirect/redirect','public_id'=>10]);
                }else{
                    return  $this->redirect(['/redirect/redirect','public_id'=>11]);
                }
            }else{
                return  $this->redirect(['/redirect/redirect','public_id'=>9]);
            }
        }else{
            return  $this->redirect(['/home/info']);
        }
    }

    //

}

?>