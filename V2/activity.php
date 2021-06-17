<?php
require_once "function/init.php";
$data = [
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "defaultConfig"=>["keys"=>["wechat_qr_code","QQ","site_desc","introduction","aboutus","contact","weibo"],"site_id"=>$config['site_id']],
    "activityList"=>["page"=>1,"page_size"=>20,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最新活动-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="">
    <meta name=”Keywords” Content=”<?php echo $config['site_name'];?>最新活动,<?php echo $config['site_name'];?>优惠活动″>
    <!-- <script src="<?php echo $config['site_url'];?>/js/rem.js"></script> -->
    <?php renderHeaderJsCss($config,[]);?>
</head>

<body class="newsList_body event_body">
    <header>
        <ul class="head width">
            <?php generateNav($config,"activity");?>
        </ul>
    </header>
    <div class="activity_all width">
        <div class="activity">
            <?php foreach($return['activityList']['data'] as $activeInfo){?>
                <a href="<?php echo $activeInfo['url'];?>" target = "_blank">
                    <div class="activity_img">
                        <img src="<?php echo $activeInfo['logo'];?>" alt="<?php echo $activeInfo['title'];?>">
                    </div>
                    <div class="activity_mid">
                        <p class="activity_title"><?php echo $activeInfo['title'];?></p>
                        <p class="activity_time">活动时间：<?php echo date("m.d",$activeInfo['start_time']);?>—<?php echo date("m.d",$activeInfo['end_time']);?></p>
                    </div>
                    <div class="activity_description">
                        <?php echo html_entity_decode($activeInfo['description']);?>
                    </div>
                </a>
        </div>
            <?php }?>
    </div>
    <div class="foot">
        <div class="width">
            <p class="link_title">友情链接</p>
            <ul class="foot_ul">
                <?php
                foreach($return['links']['data'] as $linksInfo)
                {   ?>
                    <li><a href="<?php echo $linksInfo['url'];?>"><?php echo $linksInfo['name'];?></a></li>
                <?php }?>
            </ul>
            <?php renderCertification($config);?>
        </div>
    </div>
    <script>
        $(function () {
            //头部header
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 88) {
                    $('body').addClass('scrolled')
                } else {
                    $('body').removeClass('scrolled');
                }


            })
        })
    </script>
</body>

</html>