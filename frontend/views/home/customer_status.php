<?php
use yii\helpers\Url;
$this->title=Yii::t('power','wodekehuzhuangtai');
?>
<section>
    <div class="contentd" style="height:30px; line-height:30px;">
        <?=Yii::t('power','wodekehuzhuangtai');?>
    </div>
    <div class="contentd" style="border:none;padding-top:30px; height:20px;">
        <?=Yii::t('power','kehuname');?>：<?=$model[0]['username']?>
    </div>
    <div class="contentd" style="border: none;">
        <ul>
            <li><?=$model[0]['st_date']?> <?=$model[0]['st_content']?></li>
            <?php foreach($notes as $key=>$val){ ?>
            <li>
                <?=$val['sn_date'];?> <?=$val['sn_content'];?>
                <?php if($val['sn_sf']==1){?>
                <span>佣金:<?=$model[0]['m_yongjin'];?>元<br/>已到账</span>
                <?php } ?>
            </li>
            <?php } ?>
            <li style="background: url('<?=IMG_URL;?>tub2.jpg') 0 0 no-repeat;)">
                <?php if($model[0]['status']==0){
                    echo "<font color='red'>申办中...</font>";
                }elseif($model[0]['status']==1){
                    echo "<font color='green'>办理完成</font>";
                }elseif($model[0]['status']==2){
                    echo "<font color='red'>继续申办中...</font>";
                }elseif($model[0]['status']==3){
                    echo "<font color='green'>办理完成</font>";
                }
                ?>
            </li>
        </ul>
    </div>
</section>
<div class="bottomb">
    <p><?=Yii::t('power','hehuoren');?></p>
</div>