<?php
require_once "function/init.php";
$id = $_GET['id']??1;
$data = [
    "information"=>[$id],
    "recentInformationList"=>["dataType"=>"informationList","page"=>1,"site"=>1,"page_size"=>6,"type"=>"1,2,3,5,6,7","fields"=>"*","except_id"=>$id],
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(isset($return["information"]['data']['redirect']) && $return["information"]['data']['redirect']>0)
{
    renderDetail301($config,$return["information"]['data']['redirect']);
}
if(!isset($return["information"]['data']['id'])){
    render404($return['information']['data'],$config);//404跳转
}
$return["information"]['data']['baidu_word_list'] = json_decode($return["information"]['data']['baidu_word_list'],true)??[];
$ids = array_keys($return["information"]['data']['baidu_word_list']);
$ids = count($ids)>0?implode(",",$ids):"0";
$data2 =
    [
            "ConnectInformationList"=>["dataType"=>"baiduInformaitonList","site"=>1,"ids"=>$ids,"page"=>1,"page_size"=>6,"type"=>"1,2,3,5,6,7","fields"=>"id,title,site_time","expect_id"=>$id],
    ];
$return2 = curl_post($config['api_get'],json_encode($data2),1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $return['information']['data']['title'];?>-<?php echo $config['site_name'];?></title>
    <?php renderHeaderJsCss($config,[]);?>
</head>

<body class="newsList_body">
    <header>
        <ul class="head width">
            <?php generateNav($config,"news");?>
        </ul>
    </header>
    <div class="newsDetail">
        <div class="width">
            <div class="newsDetail_top">
                <p><?php echo $return['information']['data']['title'];?></p>
                <span><?php echo date("Y-m-d H:i",strtotime($return['information']['data']['create_time']));?></span>
            </div>
            <div class="newsDetail_content">
                <?php echo html_entity_decode($return['information']['data']['content']);?>
            </div>
            <div class="newsDetail_label">
                <?php $i=0;if(count($return["information"]['data']['baidu_word_list'])>0){ foreach($return["information"]['data']['baidu_word_list'] as $key => $word){?>
                    <span><?php echo $word['tag'];?></span>
                    <?php $i++;if($i==3){break;}}}?>
            </div>
        </div>
    </div>
    <div class="width news_all">
        <?php if(count($return2['ConnectInformationList']['data'])>0){?>
            <div class="relevant_news">
                <div class="news_title">
                    <img src="<?php echo $config['site_url'];?>/images/news_ico.png" alt="">
                    <span>相关文章推荐</span>
                </div>
                <ul class="clearfix">
                    <?php foreach($return2['ConnectInformationList']['data'] as $info){?>
                        <li>
                            <a href="<?php echo $config['site_url'];?>/detail/<?php echo $info['id'];?>">
                                <?php echo $info['title'];?>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        <?php }?>
        <div class="latest_news">
            <div class="news_title">
                <img src="<?php echo $config['site_url'];?>/images/news_ico.png" alt="">
                <span>最新资讯</span>
            </div>
            <ul class="clearfix">
                <?php foreach($return['recentInformationList']['data'] as $info){?>
                    <li>
                        <a href="<?php echo $config['site_url'];?>/detail/<?php echo $info['id'];?>">
                            <?php echo $info['title'];?>
                        </a>
                    </li>
                <?php }?>
            </ul>
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