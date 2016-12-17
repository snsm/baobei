<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>public.css" rel="stylesheet" type="text/css" />
    <script src="<?=JS_URL;?>prototype.lite.js" type="text/javascript"></script>
    <script src="<?=JS_URL;?>moo.fx.js" type="text/javascript"></script>
    <script src="<?=JS_URL;?>moo.fx.pack.js" type="text/javascript"></script>
</head>

<body style="background-color:#404040; border-left:solid 1px #999;">
<table width="240" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="182" valign="top">
            <div id="container">
                <?php foreach($menu1 as $key1=>$val1){ ?>
                <h1 class="type" id="H1"><a href="javascript:void(0)"><?=$val1['menu_name']?></a></h1>
                <div class="content">
                    <?php foreach($menu2 as $key2=>$val2){ ?>
                    <ul class="MM">
                        <?php if($val2['menul_id']==$val1['menul_id']){ ?>
                        <li><a href="<?=$val2['url'];?>" target="<?=$val2['target'];?>"><?=$val2['menu_name']?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <script type="text/javascript">
                var contents = document.getElementsByClassName('content');
                var toggles = document.getElementsByClassName('type');

                var myAccordion = new fx.Accordion(
                    toggles, contents, {opacity: true, duration: 400});
                myAccordion.showThisHideOpen(contents[0]);
            </script>
        </td>
    </tr>
</table>
</body>
</html>