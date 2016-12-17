<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>style.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="f8f8f8">
<div class="r_content">
    <div class="r_top_nav">发布问题</div>
    <div class="r_public_con">

        <form id="jsForm" action="<?=Url::to(['other/issue']);?>" method="post">
            <table width="98%" border="0" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <td width="13%" align="right">问：</td>
                    <td>
                        <div class="controls">
                            <input class="r_public_con_input_text" type="text" name="other_title" required data-msg-required="不能为空" style="width:400px; height:20px;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="13%" align="right">答：</td>
                    <td>
                        <div class="controls">
                            <input class="r_public_con_input_text" type="text" name="other_content" required data-msg-required="不能为空" style="width:400px; height:20px;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="13%" align="right"></td>
                    <td>
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                        <input class="r_public_con_input_submit" type="submit" name="dosubmit" value="<?=Yii::t('common','confirm')?>"/> <input class="r_public_con_input_submit" type="button" name="dobutton" value="<?=Yii::t('common','return')?>" onclick="javascript:history.back(1);"/>
                    </td>
                </tr>
            </table>
        </form>
        <script type="text/javascript" src="<?=JS_URL;?>jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?=JS_URL;?>jquery.validate.js"></script>
        <script type="text/javascript" src="<?=JS_URL;?>jquery.ajax.js"></script>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>