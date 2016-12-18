<?php
use yii\helpers\Url;
$this->title=Yii::t('power','wodexinxi');
?>
<section>
    <div class="loginha">
        <label style="border:none;"><button class="buttomh" onclick="javascript:window.location='<?=Url::to(['home/index'])?>'" ><?=Yii::t('common','home');?></button></label>
    </div>
    <form action="<?=Url::to(['dispose/info'])?>" method="post" id="jsForm">
        <table class="tableb borderb">
            <tr>
                <td class="tdright" colspan="5" style="text-align: left;"><?=Yii::t('power','wodexinxi');?></td>
            </tr>
            <!---->
            <tr><td colspan="2" style="border:none;margin-top:10px;"></td></tr>

            <?php if ($model[0]['role']==1){?>
            <tr align="center" height="40">
                <td align="right" colspan="2"><button style="width: 150px; background-color:grey;" class="buttomh" onclick="javascript:window.location='<?=Url::to(['home/yqing','mid'=>$model[0]['mid']])?>'" >点击获取邀请码</button></td>
            </tr>
            <?php } ?>

            <tr align="center" height="40">
                <td align="right"><?=Yii::t('power','baobeiren');?></td><td align="left"><?=$model[0]['baobeiren']?></td>
            </tr>
            <tr align="center" height="40">
                <td align="right"><?=Yii::t('power','shoujiyouxiang');?></td><td align="left"><?=Yii::$app->session->get('MEMBER_User')?></td>
            </tr>
            <tr align="center">
                <td align="right"><?=Yii::t('common','yuanmima');?></td><td align="left">
                    <div class="controls">
                        <input class="inputb" type="password" value="" name="ypassword" required data-msg-required="不能为空">
                    </div>
                </td>
            </tr>
            <tr align="center">
                <td align="right"><?=Yii::t('common','newpassword');?></td><td align="left">
                    <div class="controls">
                        <input class="inputb" type="password" value="" name="password" required id="password">
                    </div>
                </td>
            </tr>
            <tr align="center">
                <td align="right"><?=Yii::t('power','querennewpassword');?></td><td align="left">
                    <div class="controls">
                        <input class="inputb" type="password" value="" name="confirm_password" required equalTo="#password" data-msg-required="请再次输入相同的密码">
                    </div>
                </td>
            </tr>
            <tr align="center">
                <td align="right"></td><td align="left">
                    <input type="hidden" name="username" value="<?=Yii::$app->session->get('MEMBER_User')?>"/>
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken();?>" />
                    <input type="submit" name="dosubmit" value="<?=Yii::t('common','confirm');?>" style="width:60px; height:30px; border:solid 1px #c8c8c8; background:none;">
                </td>
            </tr>
            <!---->
        </table>
    </form>
    <div class="loginh">
        <label style="border:none;"><button class="buttomh" onclick="javascript:window.location='<?=Url::to(['dispose/logout'])?>'" ><?=Yii::t('common','exit');?></button></label>
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