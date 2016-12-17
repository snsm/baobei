<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title');?></title>
</head>

<frameset rows="47,*" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="<?=Url::to(['admin/headtop']);?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
    <frameset cols="240,*" frameborder="no" border="0" framespacing="0">
        <frame src="<?=Url::to(['admin/mainleft']);?>" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" />
        <?php if(Yii::$app->session->get('MM_Username')==admin){?>
        <frame src="<?=Url::to(['admin/mainright']);?>" name="mainFrame" id="mainFrame" />
        <?php }else{ ?>
            <frame src="<?=Url::to(['customer/customer_list','page'=>1]);?>" name="mainFrame" id="mainFrame" />
        <?php } ?>
    </frameset>
</frameset>
<noframes>
    <body>
    </body>
</noframes>
</html>