<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>style.css" rel="stylesheet" type="text/css" />
    <script charset="utf-8" src="<?=EDITOR_URL;?>/kindeditor.js"></script>
    <script charset="utf-8" src="<?=EDITOR_URL;?>/lang/zh_CN.js"></script>
</head>

<body bgcolor="f8f8f8">
<div class="r_content">
    <div class="r_top_nav">更新方案</div>
    <div class="r_public_con">

        <form id="jsForm" action="<?=Url::to(['scheme/update']);?>" method="post">
            <table width="98%" border="0" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <td width="13%" align="right">方案标题：</td>
                    <td>
                        <div class="controls">
                            <input class="r_public_con_input_text" type="text" name="sc_title" value="<?=$model[0]['sc_title']?>" required data-msg-required="不能为空" style="width:400px; height:20px;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="13%" align="right">适合人群：</td>
                    <td>
                        <div class="controls">
                            <input class="r_public_con_input_text" type="text" name="sc_renqun" value="<?=$model[0]['sc_renqun']?>" required data-msg-required="不能为空" style="width:400px; height:20px;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="13%" align="right">特点：</td>
                    <td>
                        <div class="controls">
                            <input class="r_public_con_input_text" type="text" name="sc_tedian" value="<?=$model[0]['sc_tedian']?>" required data-msg-required="不能为空" style="width:400px; height:20px;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="13%" align="right">详情：</td>
                    <td>
                        <textarea id="sc_content" name="sc_content" style="width:670px;height:300px;"><?=$model[0]['sc_content']?></textarea>
                        <script>
                            KindEditor.ready(function(K) {
                                window.editor = K.create('#sc_content');
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="13%" align="right"></td>
                    <td>
                        <input type="hidden" name="sc_id" value="<?=$model[0]['sc_id'];?>" />
                        <input type="hidden" name="sc_time" value="<?php date_default_timezone_set("PRC"); echo date("Y-m-d H:i:s"); ?>" />
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