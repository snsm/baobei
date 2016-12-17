<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('common','title')?></title>
    <link href="<?=STYLE_URL;?>style.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="f8f8f8">
<div class="r_content">
    <div class="r_top_nav"><?=Yii::t('common','title')?></div>
    <div class="r_text_tit">尊敬的管理员：<font color="#FF6600"> <?=Yii::$app->session->get('MM_Username')?> </font>，感谢您使用<font color="#FF6600"><?=Yii::t('common','company name')?></font>标准网站管理系统</div>
    <div class="r_text_con">
        <h1>提示：</h1>
        <p>您现在使用的是<?=Yii::t('common','company name')?>最新开发的标准企业网站管理系统v3.0，如果您有疑问，均可通过本页下方的联系方式，直接与我们取得联系。</p>
        <h1>注意：</h1>
        <p>1.请尽量避免错误的删除信息，公共数据库每月备份一次；</p>
        <p>2.有任何问题建议您与联系<?=Yii::t('common','company name')?>获取技术支持；</p>
        <p>3.使用完后台后，请点击右上角的<font color="#FF6600">安全退出</font>按钮退出系统。</p>
        <h1>联系方式：</h1>
        <p>手机：13480731740</p>
        <p>邮箱：</p>
        <p>网站：<?=Yii::$app->session->get('Member_name')?></p>
    </div>
    <div class="r_bottom"></div>
</div>
</body>
</html>