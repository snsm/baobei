<?php
use yii\helpers\Url;
$this->title=Yii::t('power','kehulist');
?>
<section>
    <?php if($model!=false){ ?>
    <table class="tableb borderb">
        <tr>
            <td class="tdright" colspan="2" style="text-align: left;"><?=Yii::t('power','kehulist');?></td>
        </tr>
        <!---->
        <?php foreach($model as $key=>$val){ ?>
        <tr>
            <td width="65%" style="line-height: 20px;">
                <?=Yii::t('power','kehuname');?>：<?=$val['username'];?>
                <br/>
                <?=Yii::t('power','kehuzhuangtai');?>：
                <?php if($val['status']==0){
                    echo "<font color='red'>申办中...</font>";
                }elseif($val['status']==1){
                    echo "<font color='green'>办理完成</font>";
                }elseif($val['status']==2){
                    echo "<font color='red'>继续申办中...</font>";
                }elseif($val['status']==3){
                    echo "<font color='green'>办理完成</font>";
                }
                ?>
            </td>
            <td style="text-align: center"><a href="<?=Url::to(['home/customer_status','cid'=>$val['cid']]);?>" style="font-weight: normal; color:green;">查看详情</a></td>
        </tr>
        <?php } ?>
        <!---->
    </table>
    <center class="fenye" style="margin:20px auto 0 auto; width:232px; height:30px;"><?=$page;?></center>
    <?php }else{ ?>
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="2" style="text-align: left;"><?=Yii::t('power','kehulist');?></td>
            </tr>
            <!---->
                <tr>
                    <td width="65%" align="center" colspan="2" style="line-height: 20px;"><font color="red">暂无客户信息</font></td>
                </tr>
            <!---->
        </table>
    <?php } ?>
</section>
<div class="bottomb">
    <p><?=Yii::t('power','hehuoren');?></p>
</div>