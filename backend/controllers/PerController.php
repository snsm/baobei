<?php
namespace backend\controllers;
header("Content-Type:text/html;Charset=utf-8");

use yii;
use yii\helpers\Url;

class PerController{

    public function login(){
        return Url::to(['admin/login']);
    }

    function Permission(){
        $session = Yii::$app->session;
        $sess=$session->get('MM_Username');
        if (!isset($sess)){
            echo "<script> alert(\"抱歉你没有权限访问，请登录！\"); window.location.href='{$this->login()}'; </script>";
            exit();
        }
    }

}
?>