<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";
$data = [
    "slideImage"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"index_slider","page_size"=>20],
    "defaultConfig"=>["keys"=>["iphone","word","app_qrcode","site_desc","ios_url","android_url"],"site_id"=>2],
    "newCustomer"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"ceremony","page_size"=>20],
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="x5-orientation" content="portrait">
    <meta name="apple-mobile-web-app-title" content="<?php echo $config['site_name'];?>-专业电竞赛事比分分析大数据平台">
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
                <img src="<?php echo $return['defaultConfig']['data']['iphone']['value'];?>" alt="<?php echo $return['defaultConfig']['data']['iphone']['name'];?>">
            </div>
            <div class="rig">
                <p><img src="<?php echo $return['defaultConfig']['data']['word']['value'];?>" alt="<?php echo $return['defaultConfig']['data']['word']['name'];?>"></p>
                <p class="btns">
                    <a href="<?php echo $return['defaultConfig']['data']['android_url']['value'];?>" target="_blank"><?php echo $return['defaultConfig']['data']['android_url']['name'];?></a>
                    <a href="<?php echo $return['defaultConfig']['data']['ios_url']['value'];?>" target="_blank"><?php echo $return['defaultConfig']['data']['ios_url']['name'];?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="platform">
        <h6 class="tit"><img src="<?php echo $config['site_url'];?>/assets/img/title_1.png" alt=""></h6>
        <div id="certify">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
					if(isset($return["slideImage"]['data']) && $return["slideImage"]['data']){
                    foreach($return["slideImage"]['data'] as $type => $pic)
                    {?>

                        <div class="swiper-slide">
                            <a href="<?php echo $pic['url'];?>"><img alt="<?php echo $pic['name'];?>" title="<?php echo $pic['name'];?>" src="<?php echo $pic['logo'];?>" /></a>
                        </div>
                    <?php }}?>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
            
    </div>
    <div class="des">
        <h6 class="tit"><img src="<?php echo $config['site_url'];?>/assets/img/title_2.png" alt=""></h6>
        <div class="content">
            <?php echo $return['defaultConfig']['data']['site_desc']['value'];?>
        </div>
    </div>
    <div class="gift">
        <h6 class="tit"><img src="<?php echo $config['site_url'];?>/assets/img/title_3.png" alt=""></h6>
        <div class="content">
            <?php if(isset($return['newCustomer']['data']) && $return['newCustomer']['data']){ foreach ($return['newCustomer']['data'] as $key => $image) {?>
                <a href="<?php echo $image['url'];?>"><img src="<?php echo $image['logo'];?>" alt="<?php echo $image['name'];?>"></a>
            <?php }}?>
        </div>
    </div>
    <!-- <div class="code">
        <p><img src="./assets/img/qrcode.jpg" alt=""></p>
        <p class="code">扫一扫这个二维码，参与竞猜赢大礼</p>
    </div> -->
    <div class="footer">
        <?php renderCertification(0);?>
    </div>
</div>
<script src="<?php echo $config['site_url'];?>/assets/lib/jquery.min.js"></script>
<script src="<?php echo $config['site_url'];?>/assets/lib/swiper.min.js"></script>
<script src="<?php echo $config['site_url'];?>/assets/js/index.js"></script>
</body>
</html>
