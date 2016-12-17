<?php
$this->title=Yii::t('power','changjianwenti');
?>
<section>
    <?php if($total!=false){?>
    <table class="tableb borderb">
        <tr>
            <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','changjianwenti');?></td>
        </tr>
        <!---->
        <tr><td style="border:none; height:10px;"></td></tr>
        <tr>
            <td>
                <?php foreach($model as $key=>$val){?>
                <div class="tdstyleg" style="margin-bottom: 15px;">
                    <h1 style="font-weight: normal;">问：<?=$val['other_title'];?></h1>
                    <p style="line-height: 20px;">答：<?=$val['other_content'];?></p>
                </div>
                <?php } ?>
            </td>
        </tr>
        <!---->
    </table>
        <center class="fenye" style="margin:20px auto 0 auto; width:232px; height:30px;"><?=$page;?></center>
    <?php }else{?>
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','changjianwenti');?></td>
            </tr>
            <!---->
            <tr><td style="border:none; height:10px;"></td></tr>
            <tr>
                <td><font color="red">暂无数据</font></td>
            </tr>
            <!---->
        </table>
    <?php }?>
</section>
<div class="bottomb">
    <p><?=Yii::t('power','hehuoren');?></p>
</div>