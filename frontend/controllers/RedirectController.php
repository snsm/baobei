<?php
namespace frontend\controllers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;
header("Content-Type:text/html;Charset=utf-8");
class RedirectController extends Controller{

    public function link(){
        $arr=[
             'login'       => Url::to(['home/login']),
             'register'    => Url::to(['home/register']),
             'customer'    => Url::to(['home/customer']),
             'customer_list'    => Url::to(['home/customer_list']),
        ];
        return $arr;
    }

    function actionRedirect()
    {
        $resquest = Yii::$app->request;

        if ($resquest->get('public_id') == 1) {
            echo "<script> alert(\"用户名不能为空！\"); window.location.href='{$this->link()['register']}'; </script>";
            exit();
        } elseif ($resquest->get('public_id') == 2) {
            echo "<script> alert(\"注册成功！\"); window.location.href='{$this->link()['login']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 3) {
            echo "<script> alert(\"注册失败！\"); window.location.href='{$this->link()['register']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 4) {
            echo "<script> alert(\"手机号格式不正确！\"); window.location.href='{$this->link()['register']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 5) {
            echo "<script> alert(\"用户名已经存在！\"); window.location.href='{$this->link()['register']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 6) {
            echo "<script> alert(\"用户名不能为空！\"); window.location.href='{$this->link()['login']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 7) {
            echo "<script> alert(\"用户名或密码错误！\"); window.location.href='{$this->link()['login']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 8) {
            echo "<script> alert(\"手机号格式不正确！\"); window.location.href='{$this->link()['login']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 9) {
            echo '<script> alert("原密码不对！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif ($resquest->get('public_id') == 10) {
            echo '<script> alert("修改成功！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif ($resquest->get('public_id') == 11) {
            echo '<script> alert("修改失败！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif ($resquest->get('public_id') == 12) {
            echo "<script> alert(\"用户名不存在,请注册在登陆！\"); window.location.href='{$this->link()['register']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 13) {
            echo '<script> alert("不能推荐自己！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif ($resquest->get('public_id') == 14) {
            echo '<script> alert("推荐客户已经存在,不能推荐！"); window.location.href="javascript:history.back(1);"; </script>';
            exit();
        }elseif ($resquest->get('public_id') == 15) {
            echo "<script> alert(\"客户推荐成功！\"); window.location.href='{$this->link()['customer_list']}'; </script>";
            exit();
        }elseif ($resquest->get('public_id') == 16) {
            echo "<script> alert(\"客户推荐失败！\"); window.location.href='{$this->link()['customer']}'; </script>";
            exit();
        }else{
            return  $this->redirect(['home/login']);
        }

    }

}
?>