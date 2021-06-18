<!DOCTYPE html>
<?php require_once "function/init.php";
$data = [
    //"slideImage"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"index_slider","page_size"=>20],
    "defaultConfig"=>["keys"=>["iphone","word","app_qrcode","site_desc","ios_url","android_url"],"site_id"=>2],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "newCustomer"=>["dataType"=>"imageList","site_id"=>2,"flag"=>"ceremony","page_size"=>20],
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php renderHeaderJsCss($config,[],['rem']);?>
    <!-- 本页面新增 -->
    <title><?php echo $config['site_name'];?>-专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>，专注于电竞比分、电竞赛事数据，平台囊括英雄联盟(LOL)赛事、DOTA2比赛、CSGO赛事、王者荣耀比赛等电子竞技赛程、比分、结果等数据，了解电竞赛事数据，尽在<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事,电竞比分,电竞数据分析″>
</head>

<body>
    <header>
        <ul class="head width">
            <?php generateNav($config,"index");?>
        </ul>
    </header>
    <div class="banner">
        <div class="width banner_w">
            <div class="theme">
                <img src="<?php echo $config['site_url'];?>/images/logo_write.png" alt="" class="logo_whole">
                <span>一站式电竞游戏平台</span>
                <div class="download">
                    <a href="<?php echo $return['defaultConfig']['data']['ios_url']['value'];?>" class="download_ios">
                        <img src="<?php echo $config['site_url'];?>/images/download_ios.png" alt="" class="img">
                        <div class="download_hover">
                            <img src="<?php echo $config['site_url'];?>/images/download_bg.png" alt="" class="download_hover_bg">
                            <div class="ecode_bg">
                                <img src="<?php echo $config['site_url'];?>/images/ecode.png" alt="" class="ecode">
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo $return['defaultConfig']['data']['android_url']['value'];?>" class="download_android">
                        <img src="<?php echo $config['site_url'];?>/images/download_android.png" alt="" class="img">
                        <div class="download_hover">
                            <img src="<?php echo $config['site_url'];?>/images/download_bg.png" alt="" class="download_hover_bg">
                            <div class="ecode_bg">
                                <img src="<?php echo $config['site_url'];?>/images/ecode.png" alt="" class="ecode">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            
        </div>
    </div>
    <div class="advantage">
        <div class="width">
            <img class="advantage_img" src="<?php echo $config['site_url'];?>/images/advantage.png" alt="">
        </div>
        <div class="animation width">
            <img class='left3' src="<?php echo $config['site_url'];?>/images/animate_left3.png" alt="">
            <img class='left2' src="<?php echo $config['site_url'];?>/images/animate_left2.png" alt="">
            <img class='left1' src="<?php echo $config['site_url'];?>/images/animate_left1.png" alt="">
            <img class='center' src="<?php echo $config['site_url'];?>/images/animate_center.png" alt="">
            <img class='right1' src="<?php echo $config['site_url'];?>/images/animate_right1.png" alt="">
            <img class='right2' src="<?php echo $config['site_url'];?>/images/animate_right2.png" alt="">
            <img class='right3' src="<?php echo $config['site_url'];?>/images/animate_right3.png" alt="">
        </div>
        <div class="animation_bg">
            <img src="<?php echo $config['site_url'];?>/images/animation_bg2.png" alt="" class="">
        </div>
    </div>
    <div class="platform">
        <img class="platform_top" src="<?php echo $config['site_url'];?>/images/platform_top.png" alt="">
        <img class="platform_logo" src="<?php echo $config['site_url'];?>/images/platform_logo.png" alt="">
        <p class="mess1">获得海南政府批复，以赛事游戏系统为基础，为广大用户发布赛事信息</p>
        <div class="mess2">
            <img src="<?php echo $config['site_url'];?>/images/platform_bardius.png" alt="">
            <p>提供有奖游戏的赛事服务平台</p>
            <img src="<?php echo $config['site_url'];?>/images/platform_bardius.png" alt="" class="platform_transfrom">
        </div>
        <img src="<?php echo $config['site_url'];?>/images/platform_classify.png" alt="" class="platform_classify">
        <p class="mess3">平台覆盖全球数万场赛事的综合电子竞技服务：涵盖英雄联盟（LOL）、DOTA2、CSGO、王者荣耀等热门游戏联赛</p>
        <p class="mess3 mb40">包括S赛、LPL、Major、KPL等主流联事，地区性的乙级联赛均有收录</p>
        <div class="mess2">
            <img src="<?php echo $config['site_url'];?>/images/platform_bardius.png" alt="">
            <p>只有没见过，没有找不到的电竞联赛</p>
            <img src="<?php echo $config['site_url'];?>/images/platform_bardius.png" alt="" class="platform_transfrom">
        </div>
    </div>
    <div class="welfare">
        <img src="<?php echo $config['site_url'];?>/images/welfare.png" alt="" class="welfare_top">
        <div class="welfare_list width">
            <?php if(isset($return['newCustomer']['data']) && $return['newCustomer']['data']){ foreach ($return['newCustomer']['data'] as $key => $image) {?>
                <a href="<?php echo $image['url'];?>"><img src="<?php echo $image['logo'];?>" alt="<?php echo $image['name'];?>"></a>
            <?php }}?>
        </div>
    </div>
    <div class="foot">
        <div class="width">
            <?php if(isset($return['links']['data']) && count($return['links']['data'])>0){?>
                <p class="link_title">友情链接</p>
                <ul class="foot_ul">
                    <?php
                    foreach($return['links']['data'] as $linksInfo)
                    {   ?>
                        <li><a href="<?php echo $linksInfo['url'];?>"><?php echo $linksInfo['name'];?></a></li>
                    <?php }?>
                </ul>
            <?php }?>
                <?php renderCertification($config);?>
        </div>
    </div>
    <script>
        $(function () {
            var top = $(".banner").outerHeight()
            var advantage = $(".advantage").outerHeight()
            var platform1 = top + advantage;
            var platform = top + advantage - 260 - $(window).height();
            //头部header
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 88) {
                    $('body').addClass('scrolled')
                } else {
                    $('body').removeClass('scrolled');
                }

                if ($(this).scrollTop() > 200) {
                    console.log($(this).scrollTop())
                    $(".animation .left3").addClass("animated delay-3s fadeInLeftBig");
                    $(".animation .left2").addClass("animated delay-2s fadeInLeftBig");
                    $(".animation .left1").addClass("animated delay-1s fadeInLeftBig");
                    $(".animation .center").addClass("animated zoomIn");
                    $(".animation .right3").addClass("animated delay-3s fadeInRightBig");
                    $(".animation .right2").addClass("animated delay-2s fadeInRightBig");
                    $(".animation .right1").addClass("animated delay-1s fadeInRightBig");
                    $(".animation_bg img").addClass("animated delay-3s zoomIn")
                } else {
                    $(".animation .left3").removeClass("animated delay-3s fadeInLeftBig");
                    $(".animation .left2").removeClass("animated delay-2s fadeInLeftBig");
                    $(".animation .left1").removeClass("animated delay-1s fadeInLeftBig");
                    $(".animation .center").removeClass("animated zoomIn");
                    $(".animation .right3").removeClass("animated delay-3s fadeInRightBig");
                    $(".animation .right2").removeClass("animated delay-2s fadeInRightBig");
                    $(".animation .right1").removeClass("animated delay-1s fadeInRightBig");
                    $(".animation_bg img").removeClass("animated delay-3s zoomIn")
                }

                if ($(this).scrollTop() > platform) {
                    $(".platform").addClass("animated fadeInUp")
                } else {
                    // $(".platform").removeClass("animated fadeInUp")
                }
            })
        })
        // banner移入移出
        $(".download").on("mouseenter",'.download_ios',function(){
            $('.download_ios .img').css("display","none")
            $(".download_ios .download_hover").css("display","block")
            $(".download_ios .ecode").addClass("animated slideInDown")
        })
        $(".download").on("mouseleave",'.download_ios',function(){
            $('.download_ios .img').css("display","block")
            $(".download_ios .download_hover").css("display","none")
        })

        $(".download").on("mouseenter",'.download_android',function(){
            $('.download_android .img').css("display","none")
            $(".download_android .download_hover").css("display","block")
            $(".download_android .ecode").addClass("animated slideInDown")
        })
        $(".download").on("mouseleave",'.download_android',function(){
            $('.download_android .img').css("display","block")
            $(".download_android .download_hover").css("display","none")
        })
    </script>
</body>

</html>