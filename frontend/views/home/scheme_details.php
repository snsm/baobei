<?php
use yii\helpers\Url;
$this->title=Yii::t('power','fanganxiangqing');
?>
<section>
    <table class="tableb borderb">
        <tr>
            <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','fanganxiangqing');?></td>
        </tr>
        <!---->
        <tr><td colspan="1" style="border:none; height:10px;"></td></tr>
        <tr>
            <td style="text-align: center; border:none;">
                <!--con-->
                <?=$model[0]['sc_title']?>
                <!--con-->
            </td>
        </tr>
        <tr>
            <td style="line-height: 30px; border:none; padding: 0 10px 0 10px;">
                <!--con-->
                <?=$model[0]['sc_content']?>
                <!--con-->
            </td>
        </tr>
        <!---->
    </table>
</section>
<div class="bottomb">
    <p><?=Yii::t('power','hehuoren');?></p>
</div>