<?php
use yii\helpers\Url;
$this->title=Yii::t('power','wodexinxi');
?>
<section>
    <div style="width: 100%; text-align:center; margin: 0 auto;">
        <img src="<?= Url::to(['qrcode'])?>" width="260" />
    </div>
</section>
<script src="<?=JS_URL;?>jquery-1.10.2.min.js"></script>
<script src="<?=JS_URL;?>jquery.validate.js"></script>
<script src="<?=JS_URL;?>jquery.ajax.js"></script>
<footer>
    <div class="footext">
        <?=Yii::t('power','hehuoren');?><br/>
        <?=Yii::t('power','banquansuoyon');?><br/>
        <?=Yii::t('power','website');?>
    </div>
</footer>