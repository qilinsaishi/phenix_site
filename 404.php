<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="x5-orientation" content="portrait">
    <meta name="apple-mobile-web-app-title" content="弹址签发">
    <meta name="format-detection" content="telphone=no, email=no"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="renderer" content="webkit">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no, viewport-fit=cover"/>
    <title>赛事赛程</title>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/game.css">
</head>
<body>
<div class="container">
    <?php generateNav($config,"404");?>
    <div class="content">
        <img src="http://qilingsaishi-01.oss-cn-hangzhou.aliyuncs.com/7bd8d645d204c724238ec32b477b7b989b76aef8.png" alt="">
    </div>
    <?php renderCertification();?>
</div>
</body>
</html>
