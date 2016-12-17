<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>public.css" rel="stylesheet" type="text/css" />
</head>

<body style="border-left:solid 1px #999;">
<div class="headtop">
    尊敬的 <?=Yii::$app->session->get('MM_Username')?>，欢迎您使用广东宝通互联网金融信息服务有限后台管理系统！
   <span>
       <?php
       if(Yii::$app->session->get('Member_name')=='admin' && Yii::$app->session->get('A_class')==3){
           echo "
           <a href=\"".Url::to(['admin/mainright'])."\" target=\"mainFrame\">后台首页</a> |
           <a href=\"".Url::to(['admin/pwd_list'])."\" target=\"mainFrame\">修改密码</a> |
           ";
       }
       ?>
       <a href="<?=Url::to(['admin/logout']);?>" target="_parent">安全退出</a>
   </span>
</div>
</body>
</html>
