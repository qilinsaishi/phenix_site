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
            <img src="https://dummyimage.com/480x274/ff6600/fff" alt="">
         </div>
         <div class="rig">
            <h6 class="tit"><img src="./assets/img/title1.png" alt=""></h6>
            <p>
                企业简介是对企业综合实力进行的全面、概括的介绍，内容涉及企业的经营范围，固定资产规模、主要的经济技术指标（产品年销售量、年利润、市场占有率等） 、技术工艺和技术装备水平、经营管理运作模式。 企业发展现状及取得的成绩，在所属行业领域里的地位和影响力及企业文化的核心内容等。
            </p>
         </div>
         <div class="light"></div>
    </div>
    <div class="content reverse  clearfix">
        <div class="left">
           <h6 class="tit"><img src="./assets/img/title2.png" alt=""></h6>
           <p>
                中国电竞从燃起希望之火到遭到冷漠，再到现在的飞速发展已经历十多个年头。路漫漫其修远兮，中国电竞还需上下求索。真正热爱的电竞的人们不妨从自己做起，用自己的行动改善电竞的环境，让更多的人能接受电子竞技。正如WCG一直以来的主题曲“beyond the game”所表达的概念：超越游戏、超越自我。
           </p>
        </div>
        <div class="rig">
           <img src="https://dummyimage.com/480x274/380f7e/fff" alt="">
        </div>
        <div class="light"></div>
   </div>
    <div class="content  clearfix">
        <div class="left">
           <img src="https://dummyimage.com/480x274/be5086/fff" alt="">
        </div>
        <div class="rig">
           <h6 class="tit"><img src="./assets/img/title3.png" alt=""></h6>
           <p>
               企业简介是对企业综合实力进行的全面、概括的介绍，内容涉及企业的经营范围，固定资产规模、主要的经济技术指标（产品年销售量、年利润、市场占有率等） 、技术工艺和技术装备水平、经营管理运作模式。 企业发展现状及取得的成绩，在所属行业领域里的地位和影响力及企业文化的核心内容等。
           </p>
        </div>
        <div class="light"></div>
   </div>
    <?php renderCertification();?>
</div>
</body>
</html>
