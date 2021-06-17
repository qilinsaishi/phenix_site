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
    <title>关于我们-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>是以电竞赛事为主的电子竞技数据平台,<?php echo $config['site_name'];?>涵盖LOL比赛、DOTA2比赛、CSGO赛事、王者荣耀KPL比分等电竞比赛赛程，关注<?php echo $config['site_name'];?>，电竞赛事数据一手掌握。">
    <meta name=”Keywords” Content=”″>
    <?php renderHeaderJsCss($config,[]);?>
</head>

<body class="newsList_body event_body">
    <header>
        <ul class="head width">
            <?php generateNav($config,"about");?>
        </ul>
    </header>
    <div class="about width">
        <div class="about_logo">
            <img src="<?php echo $config['site_url'];?>/images/about_logo.png" alt="">
        </div>
        <div class="about_c">
            <img src="<?php echo $config['site_url'];?>/images/about_description.png" alt="">
        </div>
        <div class="about_description">
            <img src="<?php echo $config['site_url'];?>/images/yinhao.png" alt="">
            <div class="about_descr">
                <?php echo html_entity_decode($return['defaultConfig']['data']['aboutus']['remarks']);?>

            </div>
            <img src="<?php echo $config['site_url'];?>/images/yinhao.png" alt="" class="transfrom">
        </div>
        <ul class="contact">
            <li>
                <div class="contact_img">
                    <img src="<?php echo $config['site_url'];?>/images/weix.png" alt="" class="active">
                    <a href="##">
                        <img src="<?php echo $return['defaultConfig']['data']['wechat_qr_code']['value'];?>" alt="<?php echo $return['defaultConfig']['data']['wechat_qr_code']['name'];?>">
                    </a>
                </div>
                <span>微信公众号</span>
                <p>多层次，全方位,高精准的剖析各类赛事公众号：<?php echo $return['defaultConfig']['data']['wechat_qr_code']['remarks'];?>
                </p>
            </li>
            <li>
                <div class="contact_img">
                    <img src="<?php echo $config['site_url'];?>/images/qq.png" alt="" class="active">
                    <a href="tencent://message/?uin=<?php echo $return['defaultConfig']['data']['QQ']['value'];?>&Site=&Menu=yes" target="_blank"  class="contact_img">
                        <img src="<?php echo $config['site_url'];?>/images/qq1.png" alt="">
                    </a>
                </div>
                <span>官方QQ</span>
                <p>在线对话，为您解决遇到的问题官方QQ：<a href="tencent://message/?uin=<?php echo $return['defaultConfig']['data']['QQ']['value'];?></p>
            </li>
            <li>
                <div class="contact_img">
                    <img src="<?php echo $config['site_url'];?>/images/weibo.png" alt="" class="active">
                    <a href="https://weibo.com/u/7557889206" target="_blank" class="contact_img">
                        <img src="<?php echo $config['site_url'];?>/images/weibo1.png" alt="">
                    </a>
                </div>
                <span>官方微博</span>
                <p>了解最全面的电竞赛事资讯、分析微博：<?php echo $return['defaultConfig']['data']['weibo']['value'];?></p>
            </li>
        </ul>
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