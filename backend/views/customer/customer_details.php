<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>style.css" rel="stylesheet" type="text/css" />
    <!--<script language="JavaScript">
        function myrefresh(){
            window.location.reload();
        }
        setTimeout('myrefresh()',3000); //指定1秒刷新一次
    </script>-->
</head>

<body bgcolor="f8f8f8">
<div class="r_content">
    <div class="r_top_nav">客户状态详情</div>
    <div class="r_public_con">
        <table width="98%" border="0" cellpadding="5" cellspacing="0" align="center">
            <tr align="left">
                <td colspan="7" style=" font-size: 16px; font-weight: bold; height:15px;"><font color="green">客户：</font><font color="red"><?=$model[0]['username']?></font></td>
            </tr>
            <tr align="center" bgcolor="#cccccc">
                <td>报备人及电话</td>
                <td>客户姓名及电话</td>
                <td>贷款额度</td>
                <td>来源</td>
                <td>是否告知客户</td>
                <td>报备日期</td>
                <td>客户状态</td>
            </tr>
            <tr align="center">
                <td><?=$model[0]['baobeiren']?> | <?=$model[0]['tuijianren']?></td>
                <td><?=$model[0]['username']?> | <?=$model[0]['tel']?></td>
                <td><?=$model[0]['money']?> 元</td>
                <td><?=$model[0]['laiyuan'];?></td>
                <td>
                    <?php
                        if($model[0]['gaozhi']==0){
                            echo "已致电客户";
                        }else{
                            echo "已致电客户";
                        }
                    ?>
                </td>
                <td><?=$model[0]['time']?></td>
                <td>
                    <?php if($model[0]['status']==0){
                        echo "<font color='red'>申办中</font>";
                    }elseif($model[0]['status']==1){
                        echo "<font color='green'>办理完成</font>";
                    }elseif($model[0]['status']==2){
                        echo "<font color='red'>继续申办中</font>";
                    }elseif($model[0]['status']==3){
                        echo "<font color='green'>办理完成</font>";
                    }
                    ?>
                </td>
            </tr>
            <tr align="left">
                <td colspan="7">&nbsp;备注：&nbsp;<?=$model[0]['beizhu']?></td>
            </tr>

                <!------------>
            <tr align="left">
                <td colspan="7" style="color:red; font-size: 16px; font-weight: bold; height:15px; border: none;"></td>
            </tr>
            <tr align="center" bgcolor="#cccccc">
                <td>日期</td>
                <td>贷款总额</td>
                <td>我的佣金</td>
                <td colspan="3">提现状态</td>
            </tr>
            <tr align="center">
                <td><?=$model[0]['m_date']?></td>
                <td><?=$model[0]['money']?> 元</td>
                <td>
                    <form action="<?=Url::to(['customer/money'])?>" method="post">
                        请输入佣金：<input class="r_public_con_input_text" style="width:60px; height:20px; text-align: center;" type="text" name="m_yongjin" value="<?=$model[0]['m_yongjin']?>"/>
                            <input type="hidden" name="cid" value="<?= Yii::$app->request->get('cid')?>" />
                            <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                            <input class="r_public_con_input_submit" type="submit" name="dosubmit" value="确定支付佣金" onClick="{if(confirm('你真的要向他（她）支付佣金吗?')){return true;}return false;}"/>
                    </form>
                </td>
                <td colspan="3">
                    <form action="<?=Url::to(['customer/money_tx'])?>" method="post">
                        <?php
                        if($model[0]['m_status']==0){
                            echo "无&nbsp;";
                        }elseif($model[0]['m_status']==1){
                            echo "<font color='red'>未提现</font>&nbsp;";
                        }elseif($model[0]['m_status']==2){
                            echo "<font color='green'>已提现</font> 金额：".$model[0]['m_yongjin']."元";
                        }
                        ?>&nbsp;&nbsp;
                        <input type="hidden" name="m_status" value="2"/>
                        <input type="hidden" name="cid" value="<?= Yii::$app->request->get('cid')?>" />
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                        <?php if($model[0]['m_yongjin']>0){ ?>
                        <input class="r_public_con_input_submit" type="submit" name="dosubmit" value="确定提现" onClick="{if(confirm('你真的要向他（她）支付汇款吗?')){return true;}return false;}"/>
                        <?php }else{ ?>
                            <input class="r_public_con_input_submit" type="button" value="确定提现" onClick="{if(confirm('余额为零，无法提现')){return true;}return false;}"/>
                        <?php } ?>
                    </form>
                </td>
            </tr>

            <!------------>
            <tr align="left">
                <td colspan="7" valign="bottom" style=" font-size: 14px; font-weight: bold; height:50px; border: none;">回复客户状态流程</td>
            </tr>
            <tr align="center">
                <td colspan="7" align="left">
                    <p>1. <?=$model[0]['st_date']?> <?=$model[0]['st_content'];?></p>
                    <?php $i=1; foreach($notes as $key=>$val){ $i++;?>
                    <p>
                        <?=$i;?>. <?=$val['sn_date'];?> <?=$val['sn_content'];?>
                        &nbsp;&nbsp;&nbsp;&nbsp;跟进人：<?php if($val['genjinren']=='admin'){echo "<font color='red'>管理员</font>";}else{ echo "<font color='red'>".$val['genjinren']."</font>";}?>
                    </p>
                    <?php } ?>
                    <p>
                        办理结果：
                        <?php if($val['sn_status']==0){
                            echo "<font color='red'>申办中...</font>";
                        }elseif($val['sn_status']==1){
                            echo "<font color='green'>办理完成</font>";
                        }elseif($val['sn_status']==2){
                            echo "<font color='red'>继续申办中...</font>";
                        }elseif($val['sn_status']==3){
                            echo "<font color='green'>办理完成</font>";
                        }
                        ?>
                    </p>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" align="left">
                    <form action="<?=Url::to(['customer/status_hf'])?>" method="post">
                        &nbsp;回复流程：<input class="r_public_con_input_text" type="text" name="sn_content" style="width:400px; height:20px;"/>
                        <input class="r_public_con_input_text" type="text" name="sn_sf" value="0" style="width:20px; height:20px;text-align: center;"/>
                        <input type="hidden" name="cid" value="<?= Yii::$app->request->get('cid')?>" />
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                        <input class="r_public_con_input_submit" type="submit" name="dosubmit" value="确定回复" onClick="{if(confirm('你真的要回复吗?')){return true;}return false;}"/>
                    </form>
                </td>
                <td colspan="4" align="left">
                    <form action="<?=Url::to(['customer/status_sh'])?>" method="post">
                    是否办理完成：
                    <select name="sn_status" style="color:red; border: dashed 1px #CCCCCC; height: 20px;">
                        <?php if($val['sn_status']==0){?>
                        <option value="0" selected="selected">申办中</option>
                        <option value="1" style="color:green;">办理完成</option>
                        <option value="2">继续申办中</option>
                        <option value="3" style="color:green;">办理完成</option>
                        <?php }elseif($val['sn_status']==1){ ?>
                            <option value="0">申办中</option>
                            <option value="1" style="color:green;" selected="selected">办理完成</option>
                            <option value="2">继续申办中</option>
                            <option value="3" style="color:green;">办理完成</option>
                        <?php }elseif($val['sn_status']==2){ ?>
                            <option value="0">申办中</option>
                            <option value="1" style="color:green;">办理完成</option>
                            <option value="2" selected="selected">继续申办中</option>
                            <option value="3" style="color:green;">办理完成</option>
                        <?php }elseif($val['sn_status']==3){?>
                            <option value="0">申办中</option>
                            <option value="1" style="color:green;">办理完成</option>
                            <option value="2">继续申办中</option>
                            <option value="3" style="color:green;" selected="selected">办理完成</option>
                        <?php }?>
                    </select>
                        <input type="hidden" name="cid" value="<?= Yii::$app->request->get('cid')?>" />
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                        <input class="r_public_con_input_submit" type="submit" name="dosubmit" value="确定" onClick="{if(confirm('你真的办理完成了吗?')){return true;}return false;}"/>
                    </form>
                </td>
            </tr>

        </table>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>