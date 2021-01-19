<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";?>
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
    <title>赛事赛程-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>提供电竞赛程信息，查询热门LOL、DOTA2、CSGO、王者荣耀赛事赛程，关注<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事,电竞赛程,电竞比赛信息″>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/game.css">
</head>
<body>
<div class="container">
    <?php generateNav($config,"game");?>
    <div class="content">
        <img src="./assets/img/fix.jpg" alt="">
    </div>
    <?php renderCertification();?>
</div>
</body>
</html>
