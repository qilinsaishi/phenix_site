<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";
$data = [
    "defaultConfig"=>["keys"=>["iphone","word","app_qrcode","site_desc","ios_url","android_url","aboutus","introduction","aboutus","contact"],"site_id"=>2],
];
$return = curl_post($config['api_get'],json_encode($data),1);print_r($return  );exit;


?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="x5-orientation" content="portrait">
    <meta name="apple-mobile-web-app-title" content="关于我们-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台">
    <meta name="format-detection" content="telphone=no, email=no"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="renderer" content="webkit">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no, viewport-fit=cover"/>
    <title>关于我们-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>是以电竞赛事为主的电子竞技数据平台,<?php echo $config['site_name'];?>涵盖LOL比赛、DOTA2比赛、CSGO赛事、王者荣耀KPL比分等电竞比赛赛程，关注<?php echo $config['site_name'];?>，电竞赛事数据一手掌握。">
    <meta name=”Keywords” Content=”″>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/about_200.css"  media="(min-width:200px) and (max-width:1027px)">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/about_1028.css" media="(min-width:1028px)">
</head>
<body>
<div class="container">
    <?php generateNav($config,"aboutus");?>
    <div class="content clearfix">
         <div class="left">
            <img src="<?php echo $return['defaultConfig']['data']['aboutus']['value'];?>" alt="<?php echo $return['defaultConfig']['data']['aboutus']['name'];?>">
         </div>
         <div class="rig">
            <h6 class="tit"><img src="./assets/img/title1.png" alt=""></h6>
            
               <?php echo html_entity_decode($return['defaultConfig']['data']['aboutus']['remarks']);?>
            
         </div>
         <div class="light"></div>
    </div>
    <div class="content reverse  clearfix">
        <div class="left">
           <h6 class="tit"><img src="./assets/img/title2.png" alt=""></h6>
           <p>
               <?php echo html_entity_decode($return['defaultConfig']['data']['introduction']['remarks']);?>
           </p>
        </div>
        <div class="rig">
           <img src="<?php echo $return['defaultConfig']['data']['introduction']['value'];?>" alt="<?php echo $return['defaultConfig']['data']['introduction']['name'];?>">
        </div>
        <div class="light"></div>
   </div>
    <div class="content  clearfix">
        <div class="left">
           <img src="<?php echo $return['defaultConfig']['data']['contact']['value'];?>" alt="<?php echo $return['defaultConfig']['data']['contact']['name'];?>">
        </div>
        <div class="rig">
           <h6 class="tit"><img src="./assets/img/title3.png" alt=""></h6>
           <?php echo html_entity_decode($return['defaultConfig']['data']['contact']['remarks']);?>
        </div>
        <div class="light"></div>
   </div>
    <?php renderCertification();?>
</div>
</body>
</html>
