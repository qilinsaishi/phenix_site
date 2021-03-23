<?php 
require_once "function/init.php";
$cdata=$_POST;
$return = curl_post($config['api_get'],json_encode($data),1);
$return["information"]['data']=$cdata ??[];
$urlList = ["hero"=>"herodetail/",
    "team"=>"teamdetail/",
    "player"=>"playerdetail/",
];

?>
<!DOCTYPE html>
<html lang="en">
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
    <title><?php echo $return['information']['data']['title'];?></title>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/detail.css">
</head>
<body>
<div class="container">
    <?php generateNav($config,"news");?>
    <div class="content">
        <div class="detail">
            <h5><?php echo $return['information']['data']['title'];?></h5>
            <p><?php echo html_entity_decode($return['information']['data']['content']);?></p>
            
        </div>
        
        <div class="extra">
            <h6>最新资讯</h6>
            <div>
                <ul>
                    <?php
                    $i = 1;
					if(isset($return2['infoList']['data']) && $return2['infoList']['data']){
                    foreach($return2['infoList']['data'] as $key => $value) {
                        if($value['id']!=$return['information']['data']['id'] && $i<=3){?>
                            <li><a href="<?php echo $config['site_url'];?>/detail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
					<?php $i++;}}}?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
        <p class="copyright">增值电信业务经营许可证：沪B2-20200299沪ICP备15052255号-1 沪公网安备 31011202012378号</p>
    </div>
</div>
<script src="<?php echo $config['site_url'];?>/assets/js/tongji.js"></script>
</body>
</html>
