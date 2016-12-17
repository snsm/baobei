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
    <div class="r_top_nav">方案列表</div>
    <div class="r_public_con">
        <table width="98%" border="0" cellpadding="1" cellspacing="0" align="center">
            <tr align="center">
                <td>序号</td>
                <td>标题</td>
                <td>状态</td>
                <td>发布时间</td>
                <td>操作</td>
            </tr>
            <?php if($total!=false){?>
            <?php $i=0; foreach($model as $key=>$val){ $i++;?>
            <tr align="center">
                <td><?=$i;?></td>
                <td><?=$val['sc_title'];?></td>
                <td>
                    <?php if($val['sc_status']==0){
                        echo "<font color='red'>显示中</font>";
                    }
                    ?>
                </td>
                <td><?=$val['sc_time'];?></td>
                <td><a href="<?=Url::to(['scheme/update','sc_id'=>$val['sc_id']])?>">修改</a> <a href="<?=Url::to(['scheme/del','sc_id'=>$val['sc_id']])?>" onClick="{if(confirm('你真的要删除吗？')){return true;}return false;}">删除</a></td>
            </tr>
            <?php } ?>
                <tr align="center" height="45">
                    <td colspan="5" class="fenye"><?=$page;?></td>
                </tr>
            <?php }else{ ?>
                <tr align="center">
                    <td colspan="5"><font color="red">暂无数据</font></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>