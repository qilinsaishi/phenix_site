<!DOCTYPE html>
<?php
require_once "function/init.php";
$reset = $_GET['reset']??0;
$info['page']['page_size'] = 10;
$page = $_GET['page']??1;
$currentGame = $_GET['game']??"all";
if($page==''){
    $page=1;
}
$data = [
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
];
//依次加入所有游戏
foreach ($config['game'] as $game => $gameName)
{
    $data[$game."matchList"] =
            ["dataType"=>"matchList","source"=>$config['game_source'][$game]??$config['default_source'],"page"=>$currentGame==$game?$page:1,"page_size"=>$info['page']['page_size'],"game"=>$game,"start"=>-1,"cache_time"=>3600,"order"=>[["start_time","asc"]]];
}
$data['allmatchList'] = ["dataType"=>"matchList","source"=>$config['default_source'],"page"=>$currentGame=="all"?$page:1,"page_size"=>$info['page']['page_size'],"start"=>-1,"cache_time"=>3600,"order"=>[["start_time","asc"]]];
$allGameList = array_keys($config['game']);
array_unshift($allGameList,"all");
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最新电竞赛事赛程-<?php if($currentGame!="all"){echo $config['game'][$currentGame]."-";}?>凤凰电竞</title>
    <meta name="Keywords" content="电竞赛事赛程,电竞比赛,电竞赛事安排">
    <meta name="description" content="凤凰电竞，更快更全的电竞资讯网站和数据服务平台，涵盖各大主流游戏，赛事分析，大数据等电竞综合性服务。">
    <?php renderHeaderJsCss($config,[]);?>
</head>

<body class="newsList_body">
    <header>
        <ul class="head width">
            <?php generateNav($config,"game");?>
        </ul>
    </header>
    <div class="events width">
        <ul class="events_ul">
            <?php foreach($allGameList as $game){?>
                <li <?php if($game==$currentGame){?> class="active"<?php }?>><?php echo $config['game'][$game]??"综合"?></li>
            <?php }?>
        </ul>
        <div class="events_list">
            <?php foreach($allGameList as $game){?>
            <div class="events_item <?php if($game==$currentGame){?> active<?php }?>">
                <?php $matchList = $return[$game."matchList"];
                    if(count($matchList['data'])>0){?>
                    <?php foreach ($matchList['data'] as $matchInfo){?>
                            <div class="battle">
                                <a href="##">
                                    <div class="game_classify">
                                        <img src="<?php echo $config['site_url'];?>/images/<?php echo $matchInfo['game'];?>.png" alt="">
                                    </div>
                                    <div class="game_time">
                                        <span class="ymd"><?php echo date("Y-m-d",strtotime($matchInfo['start_time']));?></span>
                                        <span class="hm"><?php echo date("H:i",strtotime($matchInfo['start_time']));?></span>
                                    </div>
                                    <span class="battle_line"></span>
                                    <div class="match_name">
                                        <span><?php echo $matchInfo['tournament_info']['tournament_name']?></span>
                                        <span>BO<?php echo $matchInfo['game_count']??6;?></span>
                                    </div>
                                    <span class="battle_line"></span>
                                    <div class="battle_team">
                                        <span class="battle_team_name text_l"><?php echo $matchInfo['home_team_info']['team_name'];?></span>
                                        <div class="battle_team_img">
                                            <img src="<?php echo $matchInfo['home_team_info']['logo'].$config['default_oss_img_size']['teamList'];?>" alt="">
                                        </div>
                                        <span class="battle_vs">VS</span>
                                        <div class="battle_team_img1">
                                            <img src="<?php echo $matchInfo['away_team_info']['logo'].$config['default_oss_img_size']['teamList'];?>" alt="">
                                        </div>
                                        <span class="battle_team_name"><?php echo $matchInfo['away_team_info']['team_name'];?></span>
                                    </div>
                                </a>
                            </div>
                        <?php }?>
                        <div class="paging">
                            <?php render_page_pagination($matchList['count'],$info['page']['page_size'],$currentGame==$game?$page:1,$config['site_url']."/game/".$game); ?>
                        </div>
                    <?php }else{?>
                        <div class="empty">
                            <img src="<?php echo $config['site_url'];?>/images/empty.png" alt="">
                            <p>敬请期待</p>
                        </div>
                    <?php }?>

            </div>
            <?php }?>
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
        //events tab切换
        // $(".events").on("click",".events_ul li",function(){
        //     $(".events_ul li").removeClass("active");
        //     $(this).addClass("active");
        //     $(this).parents(".events").find(".events_list").find(".events_item").removeClass("active").eq($(this).index()).addClass("active");
        // })
        $(".events").on("click",".events_ul li",function(){
            $(".events_ul li").removeClass("active");
            $(this).addClass("active");
            $(this).parents(".events").find(".events_list").find(".events_item").fadeOut().eq($(this).index()).fadeIn()
        })
    </script>
</body>

</html>