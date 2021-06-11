<!DOCTYPE html>
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
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php renderHeaderJsCss($config,[]);?>
    <title>热门资讯-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>提供热门电竞行业赛事资讯，电子竞技比赛新闻，了解电竞赛事资讯新闻，关注<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事资讯,电竞比赛资讯″>
</head>

<body class="newsList_body">
    <header>
        <ul class="head width">
            <?php generateNav($config,"news");?>
        </ul>
    </header>
    <div class="newsList">
        <div class="width">
            <ul class="news_list">
                <?php   foreach($return['informationList']['data'] as $key => $value) {?>
                    <li>
                        <a href="<?php echo $config['site_url']; ?>/detail/<?php echo $value['id'];?>">
                            <div class="news_list_img">
                                <img src="<?php echo $value['logo'];?>" alt="<?php echo $value['title'];?>" class="imgauto">
                            </div>
                            <div class="news_list_content">
                                <p><?php echo $value['title'];?></p>
                                <span><?php echo substr($value['create_time'],0,10);?></span>
                                <div>
                                    <?php echo mb_str_split(html_entity_decode($value['content']),100);?>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <div class="paging">
        <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/newslist"); ?>
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
    <script src="./js/jquery.js"></script>
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