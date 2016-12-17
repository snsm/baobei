<?php
use yii\helpers\Url;
$this->title=Yii::t('common','title');
?>
<section>
    <div class="loginh" style="margin-top:50px;">
        <label style="border:none; margin-top:10px; height: auto;">请登陆：</label>
        <form action="<?=Url::to(['dispose/login']);?>" method="post" id="jsForm">
            <label>
                <div class="controls">
                    <input type="text" name="username" placeholder="手机号码" required data-msg-required="不能为空"/>
                </div>
            </label>
            <label>
                <div class="controls">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                    <input type="password" name="password" placeholder="请输入密码" required data-msg-required="不能为空" style="background: url('<?=IMG_URL;?>pass.jpg') 10px 3px no-repeat;"/>
                </div>
            </label>
            <label style="border:none; margin-top:10px; height: 30px;"><a href="<?=Url::to(['home/forget'])?>" class="ah">忘记密码？</a></label>
            <label style="border:none; margin-top:5px;"><button class="buttomh" style="font-size: 14px;"><?=Yii::t('common','subimt');?></button></label>
        </form>
        <label style="border:none; margin-top:10px; height: auto;"><a href="<?=Url::to(['home/register'])?>" class="ah" style="text-align: center;">注册报备系统账户</a></label>
        <label style="background: url('<?=IMG_URL;?>or.jpg') center 0 no-repeat; border:none; height:15px;"></label>
        <label style="border:none;"><a href="#" style="display: block;text-align: center;"><img src="<?=IMG_URL;?>weix.jpg"/></a></label>
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