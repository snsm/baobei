<?php
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="maximum-scale-1.0,minimum-scale-1.0,user-scalable=0,width-device-width,initial-scale=1.0">
    <link href="<?=STYLE_URL;?>style.css" rel="stylesheet" type="text/css" />
    <link href="<?=STYLE_URL;?>fenyepage.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header>
    <figure>
        <img src="<?=IMG_URL;?>photo.jpg" width="100%" alt="">
    </figure>
</header>
<?= $content ?>
</body>
</html>
