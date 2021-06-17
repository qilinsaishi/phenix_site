<?php
$params =
    ["a"=>"","b"=>2,"c"=>"abc"];
$apiKey = "12345678";
$secret = "abcdefghijklmn";
//生成数字签名
function generateSign($params = [],$secret)
{
    $currentTime = time();
    $t = [];
    ksort($params);
    foreach($params as $key => $value)
    {
        $t[] = trim($key).":".trim($value);
    }
    $t[] = $secret;
    $t[] = $currentTime;
    $return = implode("|",$t);
    return ["sign"=>sha1($return),"time"=>$currentTime];
}
$sign = generateSign($params,$secret);
//用于生成request头在curl时使用
$header = [
    'X-Api-Key:'.$apiKey,
    'X-Api-Sign:'.$sign['sign'],
    'time:'.$sign['time'],
];
print_R($header);





?>