<?php
require_once "web.php";
require_once "common.php";
$config = require_once ("config.php");
$is_mobile = is_mobile();
if($is_mobile)
{
    $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $url = str_replace($config['site_url'],$config['site_m_url'],$url);
    //Header("HTTP/1.1 303 See Other");
    Header("Location: ".$url);
    exit;
}
