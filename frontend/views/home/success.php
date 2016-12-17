<?php
use yii\helpers\Url;
$this->title=Yii::t('power','wodexinxi');
?>
<section>
    <div class="loginha">
        <label style="border:none;"><button class="buttomh" onclick="javascript:window.location='<?=Url::to(['home/index'])?>'" ><?=Yii::t('common','home');?></button></label>
    </div>
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="5" style="text-align: center; color:red; font-size:16px; border: none; padding-top: 30px;">您已登录成功</td>
            </tr>
            <!---->
            <tr><td colspan="2" style="border:none;margin-top:10px;"></td></tr>
            <tr align="center" height="40">
                <td align="right"><?=Yii::t('power','baobeiren');?></td><td align="left"><?=$model[0]['baobeiren']?></td>
            </tr>
            <tr align="center" height="40">
                <td align="right"><?=Yii::t('power','shoujiyouxiang');?></td><td align="left"><?=Yii::$app->session->get('MEMBER_User')?></td>
            </tr>
            <!---->
        </table>
    <div class="loginh">
        <label style="border:none;"><button class="buttomh" onclick="javascript:window.location='<?=Url::to(['dispose/logout'])?>'" ><?=Yii::t('common','exit');?></button></label>
    </div>
</section>

<footer>
    <div class="footext">
        <?=Yii::t('power','hehuoren');?><br/>
        <?=Yii::t('power','banquansuoyon');?><br/>
        <?=Yii::t('power','website');?>
    </div>
</footer>