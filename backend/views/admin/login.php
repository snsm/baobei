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

<body>

<div class="top"><?=Yii::t('common','title')?></div>

<div class="myuser">
    <div class="myusera"><?=Yii::t('common','managers')?></div>

    <form id="jsForm" action="<?=Url::to(['admin/login'])?>" method="post">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="33%" align="right"><?=Yii::t('common','username')?></td>
                <td width="66%" align="left">
                    <div class="controls">
                    <input class="userinput" type="text" name="username" required data-msg-required="不能为空" />
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right"><?=Yii::t('common','password')?></td>
                <td align="left">
                    <div class="controls">
                    <input class="userinput" type="password" name="password" required data-msg-required="不能为空" />
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right"><?=Yii::t('common','verify')?></td>
                <td align="left">
                    <div class="controls">
                    <input class="passinput" type="text" name="verification" maxlength="4" required data-msg-required="不能为空" onkeyup="if(this.value!=this.value.toUpperCase()) this.value=this.value.toUpperCase()"/>
                    <img src="<?=SITE_ADMIN_URL;?>/plugins/code/code.php" align="absmiddle" style="margin-top:-7px;" onclick="this.src='<?=SITE_ADMIN_URL;?>/plugins/code/code.php?'+Math.random()"/>
                    <span for="verification" class="error"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right"></td>
                <td align="left">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                    <input class="login" type="submit" name="dosubmit" value="<?=Yii::t('common','login')?>"/>
                </td>
            </tr>
        </table>
    </form>
    <script type="text/javascript" src="<?=JS_URL;?>jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?=JS_URL;?>jquery.validate.js"></script>
    <script type="text/javascript" src="<?=JS_URL;?>jquery.ajax.js"></script>
</div>
<div class="bottom">
    <a href="#"><?=Yii::t('common','company name')?></a> <?=Yii::t('common','copyright')?>
</div>

</body>
</html>
