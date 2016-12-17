<?php
use yii\helpers\Url;
$this->title=Yii::t('common','title');
?>
<section>
    <div class="loginh" style="margin-top: 50px;">
        <label style="border:none; margin-top:10px; height: auto;">请注册：</label>
        <form action="<?=Url::to(['dispose/member']);?>" method="post" id="jsForm">
            <label>
                <div class="controls">
                    <input type="text" name="baobeiren" placeholder="报备人姓名" required data-msg-required="不能为空"/>
                </div>
            </label>
            <label>
                <div class="controls">
                    <input type="text" name="username" placeholder="手机号码" required data-msg-required="不能为空"/>
                </div>
            </label>
            <label>
                <div class="controls">
                    <input type="password" name="password" placeholder="请输入密码" required id="password" style="background: url('<?=IMG_URL;?>pass.jpg') 10px 3px no-repeat;"/>
                </div>
            </label>
            <label>
                <div class="controls">
                    <input type="password" name="confirm_password" placeholder="请输入确认密码" required equalTo="#password" style="background: url('<?=IMG_URL;?>pass.jpg') 10px 3px no-repeat;"/>
                </div>
            </label>
            <label style="width:200px; border:none; height:25px; text-align: center; position: relative;">
                <div class="controls">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                    <input type="checkbox" name="queren" value="1" required style="margin: 0px; padding: 0px; width:auto; height:auto; float:left;">我已阅读并且同意
                    <a href="<?=Url::to(['home/treaty'])?>" style="text-decoration: none; color:#008ae1;">报备系统协议</a>
                    <span for="queren" class="error" style=" width:30px; position: absolute; top:-3px; left:198px;"></span>
                </div>
            </label>
            <label style="border:none; margin-top:5px;"><button class="buttomh" style="font-size: 14px;"><?=Yii::t('common','register');?></button></label>
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