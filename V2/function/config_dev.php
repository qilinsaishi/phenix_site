<?php

$base_config = [
    'site_name'=>"凤凰电竞",
    'api_url'=>'http://api.qilindianjing.com',//api站点URL
    'site_url'=>'http://dev.phenix.com',//本站URl
    'site_m_url'=>'http://m.phenix.com/',//本站移动端URl
    'game_name'=>"英雄联盟",
    'game'=>"lol",
    'site_id'=>2,
    'baidu_token'=>'WGi6okVpl9ij8Gc3',
	'author'=>["凤凰电竞"],
];

$additional_config = [
    'site_description'=> $base_config['site_name'].'致力于服务广大'.$base_config['game_name'].'玩家，为'.$base_config['game_name'].'玩家提供丰富的'.$base_config['game_name'].'游戏攻略、'.$base_config['game_name'].'电子竞技赛事资讯、数据分析及内容解读。',
    'api_get' => $base_config['api_url']."/get",
    'api_sitemap' => $base_config['api_url']."/sitemap",
    'navList' => [
        'news' => ['url' => 'newslist/', "name" => "热门资讯"],
        'game' => ['url' => 'game', "name" => "赛事赛程"],
        'activity' => ['url' => 'activity', "name" => "最新活动"],
        'aboutus' => ['url' => 'aboutus', "name" => "关于我们"],
    ]
];
return array_merge($base_config,$additional_config);