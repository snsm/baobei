<?php
namespace backend\controllers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;
header("Content-Type:text/html;Charset=utf-8");
class RedirectController extends Controller{

    public function link(){
        $arr=[
             'login'          => Url::to(['admin/login']),
             'pwd_list'       => Url::to(['admin/pwd_list']),
             'member_list'    => Url::to(['member/member_list']),
             'customer_list'    => Url::to(['customer/customer_list','page'=>1]),
        ];
        return $arr;
    }

    function actionRedirect()
    {
        $resquest = Yii::$app->request;

        if ($resquest->get('verify') == 1) {
            echo "<script> alert(\"验证码错误！\"); window.location.href='{$this->link()['login']}'; </script>";
            exit();
        } elseif ($resquest->get('user_id') == 2) {
            echo "<script> alert(\"用户名或密码错误！\"); window.location.href='{$this->link()['login']}'; </script>";
            exit();
        }elseif($resquest->get('user_id') == 3){
            echo "<script> alert(\"密码修改成功，请以新密码登录\"); window.location.href='{$this->link()['pwd_list']}'; </script>";
            exit();
        }elseif($resquest->get('user_id') == 4){
            echo '<script> alert("密码修改失败！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 5){
            echo '<script> alert("两次新密输入不对！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 6){
            echo '<script> alert("原密码不对！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 7){

        }elseif($resquest->get('user_id') == 8){
            echo "<script> alert(\"密码修改成功!\"); window.location.href='{$this->link()['member_list']}'; </script>";
            exit();
        }elseif($resquest->get('user_id') == 9){
            echo '<script> alert("删除成功！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 10){
            echo '<script> alert("删除失败！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 11){
            echo '<script> alert("数据处理失败！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 12){
            echo '<script> alert("数据处理成功！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif($resquest->get('user_id') == 13){
            echo "<script> alert(\"未搜索结果！\"); window.location.href='{$this->link()['customer_list']}'; </script>";
            exit();
        }elseif($resquest->get('user_id') == 14){
            echo '<script> alert("未选择分配人！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }else{
            return  $this->redirect(['admin/login']);
        }

    }

}
?>