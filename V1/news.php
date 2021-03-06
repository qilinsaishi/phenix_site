<?php
require_once "function/init.php";
$reset = $_GET['reset']??0;
$info['page']['page_size'] = 5;
$page = $_GET['page']??1;
if($page==''){
    $page=1;
}
$data = [
    "informationList"=>["page"=>$page,"site"=>1,"page_size"=>$info['page']['page_size'],"type"=>"1,2,3,5","fields"=>"*","reset"=>intval($reset)],
];
$return = curl_post($config['api_get'],json_encode($data),1);

$info['page']['total_count'] = $return['informationList']['count'];
$info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
if($reset>0)
{
    print_r(array_column($return["informationList"]['data'],"id"));
    echo "refreshed";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="x5-orientation" content="portrait">
    <meta name="apple-mobile-web-app-title" content="热门资讯-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台">
    <meta name="format-detection" content="telphone=no, email=no"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="renderer" content="webkit">

    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no, viewport-fit=cover"/>
    <title>热门资讯-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>提供热门电竞行业赛事资讯，电子竞技比赛新闻，了解电竞赛事资讯新闻，关注<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事资讯,电竞比赛资讯″>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/assets/css/news2.css">
</head>
<body>
<div class="container">
    <?php generateNav($config,"news");?>
    <div class="content">
        <ul class="list">
            <?php   foreach($return['informationList']['data'] as $key => $value) {?>
                <li>
                    <div class="left">
                        <a href="<?php echo $config['site_url']; ?>/detail/<?php echo $value['id'];?>">
                            <img src="<?php echo $value['logo'];?>" alt="<?php echo $value['title'];?>">
                        </a>
                    </div>
                    <div class="rig">
                        <h6>
                            <a href="<?php echo $config['site_url']; ?>/detail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
                        </h6>
                        <p>
                            <?php echo mb_str_split(html_entity_decode($value['content']),100);?>
                        </p>
                        <div class="clearfix">
                            <a class="more" href="<?php echo $config['site_url']; ?>/detail/<?php echo $value['id'];?>">More</a>
                            <span><?php echo substr($value['create_time'],0,10);?></span>
                        </div>
                    </div>
                </li>
            <?php }?>
            
        </ul>
        <div class="pagination-wrapper">
            <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/newslist"); ?>
        </div>
    </div>
    <?php renderCertification();?>
</div>
<script src="<?php echo $config['site_url'];?>/assets/js/tongji.js"></script>
</body>
</html>
