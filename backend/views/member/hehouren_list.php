<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>style.css" rel="stylesheet" type="text/css" />
    <link href="<?=STYLE_URL;?>fenyepage.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="f8f8f8">
<div class="r_content">
    <div class="r_top_nav">合伙人列表-扫码成为合伙人</div>
    <div class="r_public_con">
        <table width="98%" border="0" cellpadding="5" cellspacing="0" align="center">

            <tr><td colspan="15" style="height:10px; border-bottom: none; border-left: none; border-right: none;"></td></tr>

            <tr align="center">
                <td>序号</td>
                <td>合伙人姓名</td>
                <td>合伙人电话</td>
                <td>属于级别</td>
            </tr>

            <?php foreach ($model as $line){?>
            <?php if($line['role']==1){?>
                <tr align="center">
                    <td><?=$line['user_id']?></td>
                    <td><?=$line['baobeiren']?> 名下有 <font color="red" size="4"><?=$line['count']?></font> 位 报备客户</td>
                    <td><?=$line['user_mobile']?></td>
                    <td><?=$line['user_id']==$line['user_id']? "超级管理员":$line['baobeiren'] ?></td>
                </tr>
            <?php } ?>
            <?php } ?>

        </table>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>