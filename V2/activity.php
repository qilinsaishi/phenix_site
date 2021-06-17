<?php
require_once "function/init.php";
$data = [
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "defaultConfig"=>["keys"=>["wechat_qr_code","QQ","site_desc","introduction","aboutus","contact","weibo"],"site_id"=>$config['site_id']],
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
            <a href="##">
                <div class="activity_img">
                    <img src="<?php echo $config['site_url'];?>/images/activity.png" alt="">
                </div>
                <div class="activity_mid">
                    <p class="activity_title">充值大放送！新版首发·巨额回馈</p>
                    <p class="activity_time">活动时间：6.16—6.18</p>
                </div>
                <div class="activity_description">
                    夏季赛常规赛上海主场售票将于6月2日 14 ：00点正式开启6月7日-6月13日门票的售卖 ，此后每周周一固定开启下一周的门票售卖。除上海LPL主场外，深圳、苏州、杭州的俱乐部主场也将在赛季期间陆续开放售票，召唤师们可通过官方售票渠道进行购票。<br>
                    同时，上海主场将开放冠军战队VIP Pass试运营，并将于6月1日 14 ：00点开启售卖。购买战队季票的观众可观看本赛季常规赛（6月7日-8月8日）上海主场啊夏季赛常规赛上海主场售票将于6月2日 14 ：00点正式开启6月7日-6月13日门票的售卖 ，此后每周周一固定开启下一周的门票售卖。除上海LPL主场外，深圳、苏州、杭州的俱乐部主场也将在赛季期间陆续开放售票，召唤师们可通过官方售票渠道进行购票。
                    同时，上海主场将开放冠军战队VIP Pass试运营，并将于6月1日 14 ：00点开启售卖。购买战队季票的观众可观看本赛季常规赛（6月7日-8月8日）上海主场啊...
                </div>
            </a>
        </div>
        <div class="activity">
            <a href="##">
                <div class="activity_img">
                    <img src="<?php echo $config['site_url'];?>/images/activity1.png" alt="">
                </div>
                <div class="activity_mid">
                    <p class="activity_title">充值大放送！新版首发·巨额回馈</p>
                    <p class="activity_time">活动时间：6.16—6.18</p>
                </div>
                <div class="activity_description">
                    夏季赛常规赛上海主场售票将于6月2日 14 ：00点正式开启6月7日-6月13日门票的售卖 ，此后每周周一固定开启下一周的门票售卖。除上海LPL主场外，深圳、苏州、杭州的俱乐部主场也将在赛季期间陆续开放售票，召唤师们可通过官方售票渠道进行购票。<br>
                    同时，上海主场将开放冠军战队VIP Pass试运营，并将于6月1日 14 ：00点开启售卖。购买战队季票的观众可观看本赛季常规赛（6月7日-8月8日）上海主场啊夏季赛常规赛上海主场售票将于6月2日 14 ：00点正式开启6月7日-6月13日门票的售卖 ，此后每周周一固定开启下一周的门票售卖。除上海LPL主场外，深圳、苏州、杭州的俱乐部主场也将在赛季期间陆续开放售票，召唤师们可通过官方售票渠道进行购票。
                    同时，上海主场将开放冠军战队VIP Pass试运营，并将于6月1日 14 ：00点开启售卖。购买战队季票的观众可观看本赛季常规赛（6月7日-8月8日）上海主场啊...
                </div>
            </a>
        </div>
        <div class="activity">
            <a href="##">
                <div class="activity_img">
                    <img src="<?php echo $config['site_url'];?>/images/activity1.png" alt="">
                </div>
                <div class="activity_mid">
                    <p class="activity_title">充值大放送！新版首发·巨额回馈</p>
                    <p class="activity_time">活动时间：6.16—6.18</p>
                </div>
                <div class="activity_description">
                    夏季赛常规赛上海主场售票将于6月2日 14 ：00点正式开启6月7日-6月13日门票的售卖 ，此后每周周一固定开启下一周的门票售卖。除上海LPL主场外，深圳、苏州、杭州的俱乐部主场也将在赛季期间陆续开放售票，召唤师们可通过官方售票渠道进行购票。<br>
                    同时，上海主场将开放冠军战队VIP Pass试运营，并将于6月1日 14 ：00点开启售卖。购买战队季票的观众可观看本赛季常规赛（6月7日-8月8日）上海主场啊夏季赛常规赛上海主场售票将于6月2日 14 ：00点正式开启6月7日-6月13日门票的售卖 ，此后每周周一固定开启下一周的门票售卖。除上海LPL主场外，深圳、苏州、杭州的俱乐部主场也将在赛季期间陆续开放售票，召唤师们可通过官方售票渠道进行购票。
                    同时，上海主场将开放冠军战队VIP Pass试运营，并将于6月1日 14 ：00点开启售卖。购买战队季票的观众可观看本赛季常规赛（6月7日-8月8日）上海主场啊...
                </div>
            </a>
        </div>
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