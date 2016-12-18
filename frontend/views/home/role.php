<?php
use yii\helpers\Url;
$this->title=Yii::t('common','title');
?>
<section>
    <div class="loginh" style="margin-top:50px;">
        <label style="border:none; margin-top:10px; height: auto;">输入登录手机号：</label>
        <form action="<?=Url::to(['home/roles']);?>" method="post" id="jsForm">
            <label>
                <div class="controls">
                    <input type="text" name="username" placeholder="手机号码" required data-msg-required="不能为空"/>
                    <input type="hidden" name="token" value="<?php echo Yii::$app->request->get('token')?>"/>
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                </div>
            </label>
            <label style="border:none; margin-top:30px;"><button class="buttomh" style="font-size: 14px;">确 定</button></label>
        </form>
    </div>
</section>
<!---->
<script src="<?=JS_URL;?>jquery-1.10.2.min.js"></script>
<script src="<?=JS_URL;?>jquery.validate.js"></script>
<script src="<?=JS_URL;?>jquery.ajax.js"></script>
<!---->
<footer>
    <div class="footext">
        <?=Yii::t('power','hehuoren');?><br/>
        <?=Yii::t('power','banquansuoyon');?><br/>
        <?=Yii::t('power','website');?>
    </div>
</footer>