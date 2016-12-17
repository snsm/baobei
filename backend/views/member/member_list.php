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
    <div class="r_top_nav">会员列表</div>
    <div class="r_public_con">
        <table width="98%" border="0" cellpadding="3" cellspacing="0" align="center">
            <tr align="center">
                <td>序号</td>
                <td>报备人</td>
                <td>手机号</td>
                <td>密码</td>
                <td>分配管理</td>
                <td>注册时间</td>
                <td>操作</td>
            </tr>
            <?php if($total>0){ ?>
            <?php $i=0; foreach($model as $key=>$val){ $i++; ?>
                <tr align="center">
                    <td><?php echo $i?></td>
                    <td><?=$val['baobeiren'];?></td>
                    <td><?=$val['username'];?></td>
                    <td><?=$val['password'];?></td>
                    <td>
                        <?php if($val['feipen_id']==0){?>
                        <form action="<?=Url::to(['member/member_upfeipen'])?>" method="post">
                            <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                            <input type="hidden" name="feipen_id" value="<?=$val['mid']?>"/>
                            <input type="submit" name="dosubmit" value="开启分配" class="r_public_con_input_submit"/>
                        </form>
                    <?php }else{?>
                            <form action="<?=Url::to(['member/member_ycfeipen'])?>" method="post">
                                <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                                <input type="hidden" name="feipen_id" value="<?=$val['mid']?>"/>
                                <input type="submit" name="dosubmit" value="移除分配" class="r_public_con_input_submit" style="background-color:#880000; color: white; border: none;"/>
                            </form>
                    <?php }?>
                    </td>
                    <td><?=$val['time'];?></td>
                    <td>
                        <a href="<?=Url::to(['member/member_update','mid'=>''.$val['mid'].''])?>">修改</a>
                        <a href="<?=Url::to(['member/member_del','mid'=>''.$val['mid'].''])?>" onClick="{if(confirm('你真的要删除吗?')){return true;}return false;}" >删除</a>
                    </td>
                </tr>
            <?php } ?>
                <tr align="center" height="45">
                    <td colspan="7" class="fenye"><?=$page;?></td>
                </tr>
            <?php }else{ ?>
                <tr align="center">
                    <td colspan="7"><font color="red">没有数据</font></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>
