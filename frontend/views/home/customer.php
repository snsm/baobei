<?php
use yii\helpers\Url;
$this->title=Yii::t('power','tuijiankehu');
?>
<section>
    <form id="jsForm" action="<?=Url::to(['customer/customer'])?>" method="post">
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="2" style="text-align: left;"><?=Yii::t('power','tuijiankehu')?></td>
            </tr>
            <tr>
                <td class="tdright"><?=Yii::t('power','kehuname');?></td><td>
                    <div class="controls">
                        <input class="inputb" type="text" name="username" required data-msg-required="不能为空" />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdright"><?=Yii::t('power','edudaikuan');?></td><td>
                    <div class="controls">
                        <input class="inputb" type="text" name="money" required data-msg-required="不能为空" data-rule-gt="true" data-gt="0" />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdright"><?=Yii::t('power','kehutel');?></td><td>
                    <div class="controls">
                        <input class="inputb" type="text" name="tel" required data-rule-mobile="true" data-msg-required="请输入手机号" data-msg-mobile="请输入正确格式" />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdright"><?=Yii::t('power','beizhu');?><input class="inputb" type="hidden" name="laiyuan" value="东莞贷款网"/></td><td>
                    <div class="controls">
                        <input class="inputb" type="text" name="beizhu"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdright" colspan="2" style="text-align: left; padding: 20px; border:none; position:relative;">
                    <?=Yii::t('power','other');?>
                    <div class="controls" style=" width:25%; position: absolute; top:33px; left:160px;">
                        <input type="radio" class="inputba" name="whether" value="1" required> 是
                        <input type="radio" class="inputba" name="whether" value="0"> 否
                        <span for="whether" class="error" style=" width:30px; position: absolute; top:-1px; left:83px;"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdright" colspan="2" style="text-align: center; padding-top:20px; border:none;">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                    <input class="buttomb" type="submit" name="dosubmit" value="<?=Yii::t('power','mashangtijiao');?>">
                </td>
            </tr>
        </table>
    </form>
</section>
<!---->
<script src="<?=JS_URL;?>jquery-1.10.2.min.js"></script>
<script src="<?=JS_URL;?>jquery.validate.js"></script>
<script src="<?=JS_URL;?>jquery.ajax.js"></script>
<!---->
<div class="bottomb">
    <p style="text-align: left;"><?=Yii::t('power','bottomother');?></p>
    <p><?=Yii::t('power','hehuoren');?></p>
</div>