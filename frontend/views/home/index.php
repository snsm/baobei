<?php
use yii\helpers\Url;

$this->title=Yii::t('common','title');
?>
<section>
    <!--<img src="<?/*= Url::to(['qrcode'])*/?>" />-->
    <?php
    $baobeiren = Yii::$app->session->get('Baobeiren');
    if(isset($baobeiren)){
    ?>
    <table class="tableb borderb" style="width: 100%;">
        <tr>
            <td class="tdright" colspan="5" style="text-align: left; border-bottom-width: 0px;">报备人：<?=Yii::$app->session->get('Baobeiren')?></td>
        </tr>
    </table>
    <?php }?>
    <table class="tablea bordera">

        <tr>
            <td><a href="<?=Url::to(['home/customer'])?>">
                    <img src="<?=IMG_URL;?>cha.jpg"/>
                    <p><?=Yii::t('power','tuijiankehu')?></p>
                </a></td>
            <td><a href="<?=Url::to(['home/customer_list','mid'=>1,'id'=>2,'page'=>1])?>">
                    <img src="<?=IMG_URL;?>wo.jpg"/>
                    <p><?=Yii::t('power','wodekehuzhuangtai')?></p>
                </a></td>
            <td><a href="<?=Url::to(['home/commission'])?>">
                    <img src="<?=IMG_URL;?>yong.jpg"/>
                    <p><?=Yii::t('power','wodeyongjin')?></p>
                </a></td>
        </tr>
        <tr>
            <td><a href="<?=Url::to(['home/scheme'])?>">
                    <img src="<?=IMG_URL;?>cha.jpg"/>
                    <p><?=Yii::t('power','tuijianfangan')?></p>
                </a></td>
            <td><a href="<?=Url::to(['home/faq'])?>">
                    <img src="<?=IMG_URL;?>da.jpg"/>
                    <p><?=Yii::t('power','chanjianwenti')?></p>
                </a></td>
            <td><a href="<?=Url::to(['home/info'])?>">
                    <img src="<?=IMG_URL;?>xin.jpg"/>
                    <p><?=Yii::t('power','wodexinxi')?></p>
                </a></td>
        </tr>
    </table>
</section>
<footer>
    <div class="submit">
        <button onclick="javascript:window.location='<?=Url::to(['home/login'])?>'"><?=Yii::t('common','login');?></button>
        &nbsp;
        <button onclick="javascript:window.location='<?=Url::to(['home/register'])?>'"><?=Yii::t('common','register');?></button>
    </div>
    <div class="footext">
        <?=Yii::t('power','hehuoren');?><br/>
        <?=Yii::t('power','banquansuoyon');?><br/>
        <?=Yii::t('power','website');?>
    </div>
</footer>