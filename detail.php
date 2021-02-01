<!DOCTYPE html>
<html lang="en">
<?php require_once "function/init.php";
$id = $_GET['id']??1;
$data = [
    "information"=>[$id],
];
$return = curl_post($config['api_get'],json_encode($data),1);
$urlList = ["hero"=>"herodetail/",
    "team"=>"teamdetail/",
    "player"=>"playerdetail/",
];
$return["information"]['data']['scws_list'] = json_decode($return["information"]['data']['scws_list'],true);
$ids = array_column($return["information"]['data']['scws_list'],"keyword_id");
$ids = count($ids)>0?implode(",",$ids):"0";
$data2 = [
    "ConnectInformationList"=>["dataType"=>"scwsInformaitonList","ids"=>$ids,"game"=>$config['game'],"page"=>1,"page_size"=>3,/*"type"=>$info['type']=="info"?"1,2,3,5":"4",*/"fields"=>"*","expect_id"=>$id],
    "infoList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>3,
        "type"=>$return['information']['data']['type']==4?"4":"1,2,3,5","fields"=>"id,title","expect_id"=>$id],
];
$return2 = curl_post($config['api_get'],json_encode($data2),1);
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
            <p>
                <img src="<?php echo $return['information']['data']['logo'];?>" alt="<?php echo $return['information']['data']['title'];?>">
            </p>
            <p><?php echo $return['information']['data']['content'];?></p>
            <div class="tips clearfix">
                <span class="left">
                        <?php
                        $i = 1;
                        foreach($return["information"]['data']['scws_list'] as $info)
                        {
                            if($i<=3)
                            {
                                echo '<a href="'.$config['site_url'].'/scws/'.urlencode($info['keyword_id']).'/1">'.$info['word'].'</a>';
                            }
                            $i++;
                        }?>
                </span>
                <span class="rig">
                        <?php echo ($return['information']['data']['type']==2)?$return['information']['data']['site_time']:$return['information']['data']['create_time'];?>
                </span>
            </div>
        </div>
        <div class="extra">
            <h6>相关文章推荐</h6>
            <div>
                <ul>
                    <?php
                    $i = 1;
                    foreach($return2['ConnectInformationList']['data'] as $key => $value) {
                        if($value['content']['id']!=$id && $i<=3){?>
                            <li><a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $value['content']['id'];?>"><?php echo $value['content']['title'];?></a></li>
                            <?php $i++;}}?>
                </ul>
            </div>
        </div>
        <div class="extra">
            <h6>最新资讯</h6>
            <div>
                <ul>
                    <?php
                    $i = 1;
                    foreach($return2['infoList']['data'] as $key => $value) {
                        if($value['id']!=$return['information']['data']['id'] && $i<=3){?>
                            <li><a href="<?php echo $config['site_url'];?>newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
                            <?php $i++;}}?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
        <p class="copyright">增值电信业务经营许可证：沪B2-20200299沪ICP备15052255号-1 沪公网安备 31011202012378号</p>
    </div>
</div>
</body>
</html>
