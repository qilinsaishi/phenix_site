<?php

$base_config = [
    'site_name'=>"麒麟赛事",
    'api_url'=>'http://lol_api.querylist.cn',//api站点URL
    'site_url'=>'http://info.lol_info.com',//本站URl
    'game_name'=>"英雄联盟",
    'game'=>"lol",
];

$additional_config = [
    'site_description'=> $base_config['site_name'].'致力于服务广大'.$base_config['game_name'].'玩家，为'.$base_config['game_name'].'玩家提供丰富的'.$base_config['game_name'].'游戏攻略、'.$base_config['game_name'].'电子竞技赛事资讯、数据分析及内容解读。',
    'api_get' => $base_config['api_url']."/lol/get"
];
return array_merge($base_config,$additional_config);