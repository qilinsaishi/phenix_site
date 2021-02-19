<?php
require_once "web.php";
require_once "common.php";
$config = require_once ("config.php");
$is_mobile = is_mobile();
if($is_mobile)
{
    //Header("HTTP/1.1 303 See Other");
    Header("Location: ".$config['site_m_url']);
    exit;
}
