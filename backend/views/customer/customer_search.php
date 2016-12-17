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
    <div class="r_top_nav">客户列表</div>
    <div class="r_public_con">
        <table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
            <form action="<?=Url::to(['customer/customer_search']);?>" method="post">
                <tr height="30">
                    <td colspan="15">
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                        &nbsp;
                        客户姓名：<input type="text" name="username" size="10" class="r_public_con_input_text"/>
                        客户手机：<input type="text" name="tel" size="10" class="r_public_con_input_text"/>
                        报备人：<input type="text" name="baobeiren" size="10" class="r_public_con_input_text"/>
                        报备人手机：<input type="text" name="tuijianren" size="10" class="r_public_con_input_text"/>
                        <?php if(Yii::$app->session->get('A_class')==3){?>
                            分配给谁：<input type="text" name="fenpeiren" size="10" class="r_public_con_input_text"/>
                        <?php } ?>
                        <input type="submit" name="dosubmit" value="搜索" class="r_public_con_input_submit"/>
                        <input type="button" value="全都信息" class="r_public_con_input_submit" onclick="javascript:window.location='<?=Url::to(['customer/customer_list','page'=>1])?>'"/>
                    </td>
                </tr>
            </form>
            <tr><td colspan="15" style="height:10px; border-bottom: none; border-left: none; border-right: none;"></td></tr>

            <tr align="center">
                <td>序号</td>
                <td>客户姓名及电话</td>
                <td>贷款额度</td>
                <td>是否告知客户</td>
                <td>状态</td>
                <td>报备日期</td>
                <td>报备人及电话</td>
                <?php if(Yii::$app->session->get('A_class')==3){?>
                    <td>分配给谁管理</td>
                <?php } ?>
                <td>详情</td>
                <?php if(Yii::$app->session->get('A_class')==3){?>
                    <td>删除</td>
                <?php } ?>
            </tr>
            <?php if($total>0){ ?>
            <?php $i=0; foreach($model as $key=>$val){ $i++; ?>
                <tr align="center">
                    <td><?php echo $i?></td>
                    <td><a href="#" title="<?=$val['tel'];?>"><?=$val['username'];?> | <?=$val['tel'];?></a></td>
                    <td><?=$val['money'];?> 元</td>
                    <td>
                        <?php if($val['gaozhi']==1){
                            echo "<font color='red'>是</font>";
                        }else{
                            echo "<font color='green'>否</font>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if($val['status']==0){
                            echo "<font color='red'>申办中</font>";
                        }elseif($val['status']==1){
                            echo "<font color='green'>办理完成</font>";
                        }elseif($val['status']==2){
                            echo "<font color='red'>继续申办中</font>";
                        }elseif($val['status']==3){
                            echo "<font color='green'>办理完成</font>";
                        }
                        ?>
                    </td>
                    <td><?=$val['time'];?></td>
                    <td><a href="#" title="<?=$val['tuijianren'];?>"><?=$val['baobeiren'];?> | <?=$val['tuijianren'];?></a></td>
                    <?php if(Yii::$app->session->get('A_class')==3){?>
                        <td>
                            已分配给：<font color="red"><?=$val['fenpeiren']?></font>
                            <form action="<?=Url::to(['customer/customer_cl'])?>" method="post">
                                <select name="clusername" style="border: dashed 1px #CCCCCC; height: 20px;">
                                    <option value="0">选择分配人</option>
                                    <?php foreach($member as $key=>$vel){?>
                                        <?php if($vel['feipen_id']>0){?>
                                        <option value="<?=$vel['username']?>"><?=$vel['baobeiren']?></option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="c_idd" value="<?=$val['cid'];?>"/>
                                <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                                <input type="submit" name="dosubmit" class="r_public_con_input_submit" value="分配"/>
                            </form>
                        </td>
                    <?php } ?>
                    <td><a href="<?=Url::to(['customer/customer_details','cid'=>''.$val['cid'].''])?>" style="width:50px; height:20px; line-height:20px; color:white; background:orangered; display: block;">详情</a></td>
                    <?php if(Yii::$app->session->get('A_class')==3){?>
                        <td><a href="<?=Url::to(['customer/customer_del','cid'=>''.$val['cid'].'']);?>" onClick="{if(confirm('你真的要删除吗?')){return true;}return false;}" style="width:50px; height:20px; line-height:20px; color:white; background:orangered; display: block;">删除</a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
                <tr align="center" height="45">
                    <td colspan="15" class="fenye"><?=$page;?></td>
                </tr>
            <?php }else{ ?>
                <tr align="center">
                    <td colspan="15"><font color="red">没有数据</font></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>