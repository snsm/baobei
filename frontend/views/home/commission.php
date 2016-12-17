<?php
use yii\helpers\Url;
$this->title=Yii::t('power','wodeyongjin');
?>
<section>
    <?php if($model!=false){ ?>
    <table class="tableb borderb">
        <tr>
            <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','wodeyongjin');?></td>
        </tr>
        <!---->
        <tr><td colspan="5" style="border:none; height:10px;"></td></tr>
        <tr align="center">
            <td><?=Yii::t('power','date');?></td><td><?=Yii::t('power','kehname');?></td><td><?=Yii::t('power','daikuanzonge');?></td><td><?=Yii::t('power','yongjin');?></td><td><?=Yii::t('power','tixian');?></td>
        </tr>
        <?php foreach($model as $key=>$val){ ?>
        <tr align="center">
            <td><?=$val[0]['m_date'];?></td>
            <td><?=$val[0]['username'];?></td>
            <td><?=$val[0]['money'];?></td>
            <td><?=$val[0]['m_yongjin'];?></td>
            <td>
                <?php if($val[0]['m_status']==0){?>
                    <a href="#" class="buttome" style="font-weight: normal; color:white;">无</a>
                <?php }elseif($val[0]['m_status']==1){ ?>
                    <a href="<?=Url::to(['home/withdraw']);?>" class="buttome" style="font-weight: normal; color:white; background-color:green;"><?=Yii::t('power','tixian');?></a>
                <?php }elseif($val[0]['m_status']==2){?>
                    <a href="#" class="buttome" style="font-weight: normal; color:white;"><?=Yii::t('power','yitixian');?></a>
                <?php }?>
            </td>
        </tr>
        <?php } ?>
        <!---->
    </table>
    <?php }else{ ?>
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','wodeyongjin');?></td>
            </tr>
            <!---->
            <tr>
                <td width="65%" align="center" colspan="2" style="line-height: 20px;"><font color="red">暂无信息</font></td>
            </tr>
            <!---->
        </table>
    <?php } ?>
</section>
<div class="bottomb">
    <p><?=Yii::t('power','hehuoren');?></p>
</div>