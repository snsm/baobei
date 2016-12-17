<?php
use yii\helpers\Url;
$this->title=Yii::t('power','remenfangan');
?>
<section>
    <?php if($total!=false){?>
    <table class="tableb borderb">
        <tr>
            <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','remenfangan');?></td>
        </tr>
        <!---->
        <?php $i=0; foreach($model as $key=>$val){?>
        <tr><td style="border:none; height:10px;"></td></tr>
        <tr align="left">
            <td>
                <div class="tdstylef">
                    <h1><?=$val['sc_title']?></h1>
                    <p>适合人群：<?=$val['sc_renqun']?></p>
                    <p>特点：<?=$val['sc_tedian']?></p>
                    <a href="<?=Url::to(['home/scheme_details','sc_id'=>$val['sc_id']]);?>" style="font-weight: normal;color:white;"><?=Yii::t('power','fanganxiangqing');?></a>
                </div>
            </td>
        </tr>
        <?php } ?>
        <!---->
    </table>
        <center class="fenye" style="margin:20px auto 0 auto; width:232px; height:30px;"><?=$page;?></center>
    <?php }else{ ?>
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','remenfangan');?></td>
            </tr>
            <!---->
                <tr><td style="border:none; height:10px;"></td></tr>
                <tr align="left">
                    <td align="center"><font color="red">暂无数据</font></td>
                </tr>
            <!---->
        </table>
    <?php }?>
</section>
<div class="bottomb">
    <p><?=Yii::t('power','hehuoren');?></p>
</div>