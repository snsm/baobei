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
    <div class="r_top_nav">密码管理</div>
    <div class="r_public_con">
        <table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr align="center">
                <td>序号</td>
                <td>用户名</td>
                <td>密码</td>
                <td>技术支持</td>
                <td>权限级别</td>
                <td>开通时间</td>
                <td>操作</td>
            </tr>
<?php $i=0; foreach($model as $key=>$val){ $i++; ?>
            <tr align="center">
                <td><?=$i;?></td>
                <td><?=$val['username'];?></td>
                <td>******</td>
                <td>小龙哥</td>
                <td>
                    <?php
                        if($val['a_class']==0){
                            echo "来宾访问";
                        }elseif($val['a_class']==1){
                            echo "普通用户";
                        }elseif($val['a_class']==2){
                            echo "VIP用户";
                        }elseif($val['a_class']==3){
                            echo "超级用户";
                        }
                    ?>
                </td>
                <td><?=$val['time']?></td>
                <td><a href="<?=Url::to(['admin/pwd_update','aid'=>''.$val['aid'].''])?>">修改</a></td>
            </tr>
<?php } ?>
        </table>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>
