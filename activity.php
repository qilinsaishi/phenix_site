<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";
$data = [
    "slideImage"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"activity_slide_pic","page_size"=>20],
    "defaultConfig"=>["keys"=>["iphone","word","app_qrcode","site_desc","ios_url","android_url"],"site_id"=>2],
    "newCustomer"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"ceremony","page_size"=>20],
];
$return = curl_post($config['api_get'],json_encode($data),1);

//render404($return['slideImage']['data']);//404跳转
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="x5-orientation" content="portrait">
    <meta name="apple-mobile-web-app-title" content="最新活动-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台">
    <meta name="format-detection" content="telphone=no, email=no"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="renderer" content="webkit">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no, viewport-fit=cover"/>
    <title>最新活动-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="">
    <meta name=”Keywords” Content=”<?php echo $config['site_name'];?>最新活动,<?php echo $config['site_name'];?>优惠活动″>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/lib/swiper.min.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/activity.css">
</head>
<body>
<div class="container">
    <?php generateNav($config,"activity");?>
    <div class="content">
        <div class="swiper-box">
            <div class="swiper-container">
                <div class="swiper-wrapper">
					<?php
					if(isset($return["slideImage"]['data']) && $return["slideImage"]['data']){
                    foreach($return["slideImage"]['data'] as $type => $pic)
                    {?>
						<div class="swiper-slide">
                        <h6><?php echo $pic['name'];?></h6>
                        <p>
                            <a href="<?php echo $pic['url'];?>"><img src="<?php echo $pic['logo'];?>" alt="<?php echo $pic['name'];?>" title="<?php echo $pic['name'];?>"></a>
                        </p>
                        <p class="txt">
                            
							 <?php echo html_entity_decode($pic['content']);?>
                        </p>
                    </div>

                        
                    <?php }}?>
                    
                    
                </div>
                <div class="swiper-pagination"></div>
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <?php renderCertification();?>

</div>
<script src="<?php echo $config['site_url'];?>/assets/lib/jquery.min.js"></script>
<script src="<?php echo $config['site_url'];?>/assets/lib/swiper.min.js"></script>
<script src="<?php echo $config['site_url'];?>/assets/js/activity.js"></script>
<script src="<?php echo $config['site_url'];?>/assets/js/tongji.js"></script>
</body>
</html>
