<?php
$base_config = [
    'site_name' => "凤凰电竞",
    'api_url'=>'http://api.qilindianjing.com',//api站点URL
    'site_url'=>'https://www.kiringames.cn',//本站URl
    'site_m_url'=>'http://m.kiringames.cn/',//本站移动端URl
    'game' => ["kpl" => "王者荣耀", "lol" => "英雄联盟"],
    'game_source' => ['dota2' => 'shangniu'],
    'default_game' => "lol",
    'default_source' => "scoregg",
    'site_id' => 2,
    'baidu_token' => 'WGi6okVpl9ij8Gc3',
	'author'=>["凤凰电竞"],
    'default_oss_img_size' => [
        "teamList" => '?x-oss-process=image/resize,m_lfit,h_40,w_40',
        "playerList" => '?x-oss-process=image/resize,m_lfit,h_100,w_100',
        "tournamentList" => '?x-oss-process=image/resize,m_lfit,h_130,w_130',
        "heroList" => '?x-oss-process=image/resize,m_lfit,h_100,w_100',
        "informationList" => '?x-oss-process=image/resize,m_lfit,h_74,w_120',
        "qr_code" => '?x-oss-process=image/resize,m_lfit,h_200,h_200',
    ],
];

$additional_config = [
    // 'site_description'=> $base_config['site_name'].'致力于服务广大'.$base_config['game_name'].'玩家，为'.$base_config['game_name'].'玩家提供丰富的'.$base_config['game_name'].'游戏攻略、'.$base_config['game_name'].'电子竞技赛事资讯、数据分析及内容解读。',
    'api_get' => $base_config['api_url'] . "/get",
    'api_sitemap' => $base_config['api_url'] . "/sitemap",
    'navList' => [
        'index' => ['url' => '', "name" => "首页"],
        'news' => ['url' => 'newslist/', "name" => "热门资讯"],
        'game' => ['url' => 'game', "name" => "赛事赛程"],
        'activity' => ['url' => 'activity', "name" => "最新活动"],
        'aboutus' => ['url' => 'aboutus', "name" => "关于我们"],
    ]
];
return array_merge($base_config, $additional_config);