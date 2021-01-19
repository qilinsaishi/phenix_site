<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";
$data = [
    "slideImage"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"index_slider","page_size"=>20],
];
$return = curl_post($config['api_get'],json_encode($data),1);
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
    <title><?php echo $config['site_name'];?>-专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>，专注于电竞比分、电竞赛事数据，平台囊括英雄联盟(LOL)赛事、DOTA2比赛、CSGO赛事、王者荣耀比赛等电子竞技赛程、比分、结果等数据，了解电竞赛事数据，尽在<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事,电竞比分,电竞数据分析″>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/lib/swiper.min.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/index_200.css"  media="(min-width:200px) and (max-width:1027px)">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/index_1028.css" media="(min-width:1028px)">

</head>
<body>
<div class="container">
    <?php generateNav($config,"index");?>
    <div class="banner">
        <div class="light"></div>
        <div class="banner-body clearfix">
            <div class="left">
                <img src="./assets/img/iphone.png" alt="">
            </div>
            <div class="rig">
                <p><img src="./assets/img/word.png" alt=""></p>
                <p class="btns">
                    <a href="" target="_blank">安卓版下载</a>
                    <a href="" target="_blank">苹果版下载</a>
                </p>
            </div>
        </div>
    </div>
    <div class="platform">
        <h6 class="tit"><img src="./assets/img/title_1.png" alt=""></h6>
        <div id="certify">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach($return["slideImage"]['data'] as $type => $pic)
                        {?>

                    <div class="swiper-slide">
                        <a href="<?php echo $pic['url'];?>"><img alt="<?php echo $pic['name'];?>" title="<?php echo $pic['name'];?>" src="<?php echo $pic['logo'];?>" /></a>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
            
    </div>
    <div class="des">
        <h6 class="tit"><img src="./assets/img/title_2.png" alt=""></h6>
        <div class="content">
            <p>麒麟赛事是获得海南政府批复，以赛事竞猜系统为基础，为广大用户发布赛事信息，提供有奖竞猜的赛事服务平台。<br>平台覆盖全球数万场赛事的综合电子竞技服务。</p>
            <p>平台涵盖英雄联盟（LOL）、DOTA2、CSGO、王者荣耀等热门游戏联赛，包括S赛、LPL、Major、KPL等主流联事，地区性的乙级联赛均有收录。只有没见过，没有找不到的电竞联赛。</p>
            <p>赛前还有独特对局前瞻分析，通过双方近期的战绩和交手纪录回顾，以及胜率等表现对比，可科学合理地作出比赛预测。</p>
        </div>
    </div>
    <div class="gift">
        <h6 class="tit"><img src="./assets/img/title_3.png" alt=""></h6>
        <div class="content">
            <a href=""><img src="https://dummyimage.com/350x238/ff6600/fff" alt=""></a>
            <a href=""><img src="https://dummyimage.com/350x238/380f7e/fff" alt=""></a>
            <a href=""><img src="https://dummyimage.com/350x238/be5086/fff" alt=""></a>
        </div>
    </div>
    <div class="footer">
        <p><img src="./assets/img/qrcode.jpg" alt=""></p>
        <p class="code">扫一扫这个二维码，参与竞猜赢大礼</p>
        <?php renderCertification(0);?>    </div>
</div>
<script src="./assets/lib/jquery.min.js"></script>
<script src="./assets/lib/swiper.min.js"></script>
<script src="./assets/js/index.js"></script>
</body>
</html>
