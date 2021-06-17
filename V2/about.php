<?php
require_once "function/init.php";
$data = [
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "defaultConfig"=>["keys"=>["iphone","word","app_qrcode","site_desc","ios_url","android_url","aboutus","introduction","aboutus","contact"],"site_id"=>2],
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>关于我们</title>
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
                        <img src="<?php echo $config['site_url'];?>/images/weix1.png" alt="">
                    </a>
                </div>
                <span>微信公众号</span>
                <p>多层次，全方位,高精准的剖析各类赛事公众号：凤凰电竞赛事</p>
            </li>
            <li>
                <div class="contact_img">
                    <img src="<?php echo $config['site_url'];?>/images/qq.png" alt="" class="active">
                    <a href="tencent://message/?uin=1507064182&Site=&Menu=yes" target="_blank" href="http://v=3&amp;uin=2463964705&amp;site=qq&amp;menu=yes" class="contact_img">
                        <img src="<?php echo $config['site_url'];?>/images/qq1.png" alt="">
                    </a>
                </div>
                <span>官方QQ</span>
                <p>在线对话，为您解决遇到的问题官方QQ：1507064182</p>
            </li>
            <li>
                <div class="contact_img">
                    <img src="<?php echo $config['site_url'];?>/images/weibo.png" alt="" class="active">
                    <a href="https://weibo.com/u/7557889206" target="_blank" class="contact_img">
                        <img src="<?php echo $config['site_url'];?>/images/weibo1.png" alt="">
                    </a>
                </div>
                <span>官方微博</span>
                <p>了解最全面的电竞赛事资讯、分析微博：凤凰电竞</p>
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
    <script src="<?php echo $config['site_url'];?>/js/jquery.js"></script>
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