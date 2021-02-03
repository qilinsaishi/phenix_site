<?php
function mb_str_split($str, $split_length = 1, $charset = "UTF-8")
{
    if (func_num_args() == 1) {
        return preg_split('/(?<!^)(?!$)/u', $str);
    }
    if ($split_length < 1) return false;
    $len = mb_strlen($str, $charset);
    $arr = array();
    for ($i = 0; $i < $len; $i += $split_length) {
        $s = mb_substr($str, $i, $split_length, $charset);
        $arr[] = $s;
    }
    return implode("", $arr);
}

function render_page_pagination($total_count, $page_size, $current_page, $url)
{

    $p = 5;
    $p2 = 2;
    $totalPage = ceil($total_count / $page_size);
    if ($current_page > 1) {
        echo '<a href="' . $url . "/" . ($current_page - 1) . '" class="prev"><<</a>';
    }
    if ($totalPage <= $p + $p2) {
        for ($i = 1; $i <= $totalPage; $i++) {
            echo '<a ' . (($i - $current_page) == 0 ? 'class="active"' : '') . 'href="' . $url . "/" . $i . '">' . $i . '</a>';
        }
    } else {
        if ($current_page <= ($p - $p2)) {
            for ($i = 1; $i <= $p; $i++) {
                echo '<a ' . (($i - $current_page) == 0 ? 'class="active"' : '') . ' href="' . $url . "/" . $i . '">' . $i . '</a>';
            }
            echo '<a href="' . $url . "/" . ($current_page + $p) . '">...</a>';
            for ($i = $p2; $i > 0; $i--) {
                echo '<a href="' . $url . "/" . ($totalPage - $i) . '">' . ($totalPage - $i) . '</a>';
            }
        } elseif ($current_page <= ($p)) {
            for ($i = 1; $i <= ($p + $p2); $i++) {
                echo '<a ' . (($i - $current_page) == 0 ? 'class="active"' : '') . ' href="' . $url . "/" . $i . '">' . $i . '</a>';
            }
            echo '<a  href="' . $url . "/" . ($current_page + $p) . '">...</a>';
            for ($i = $p2; $i > 0; $i--) {
                echo '<a href="' . $url . "/" . ($totalPage - $i) . '">' . ($totalPage - $i) . '</a>';
            }
        } elseif ($current_page > $p && $current_page < ($totalPage - $p)) {
            for ($i = 1; $i <= 1; $i++) {
                echo '<a href="' . $url . "/" . $i . '">' . $i . '</a>';
            }
            echo '<a href="' . $url . "/" . ($current_page - $p) . '">...</a>';
            for ($i = $current_page - 2; $i <= $current_page + 2; $i++) {
                echo '<a ' . (($i - $current_page) == 0 ? 'class="active"' : '') . ' href="' . $url . "/" . $i . '">' . $i . '</a>';
            }
            echo '<a href="' . $url . "/" . ($current_page + $p) . '">...</a>';
            for ($i = $p2; $i > 0; $i--) {
                echo '<a href="' . $url . "/" . ($totalPage - $i) . '">' . ($totalPage - $i) . '</a>';
            }
        } elseif ($current_page >= ($totalPage - $p)) {
            for ($i = 1; $i <= 1; $i++) {
                echo '<a href="' . $url . "/" . $i . '">' . $i . '</a>';
            }
            if ($totalPage - $p != 1) {
                echo '<a href="' . $url . "/" . ($current_page - $p) . '">...</a>';
            }
            for ($i = $p; $i > 0; $i--) {
                echo '<a ' . (($totalPage - $i - $current_page) == 0 ? 'class="active"' : '') . ' href="' . $url . "/" . ($totalPage - $i) . '">' . ($totalPage - $i) . '</a>';
            }
        }
    }
    if ($current_page < $totalPage) {
        echo '<a href="' . $url . "/" . ($current_page + 1) . '" class="next">>></a>';
    }
}

function processCache($cacheConfig, $dataType, $params = [])
{
    print_R($cacheConfig);
    die();
}

function sensitive($list, $string)
{
    $count = 0; //违规词的个数
    $sensitiveWord = '';  //违规词
    $stringAfter = $string;  //替换后的内容
    $pattern = "/" . implode("|", $list) . "/i"; //定义正则表达式
    if (preg_match_all($pattern, $string, $matches)) { //匹配到了结果
        $patternList = $matches[0];  //匹配到的数组
        $count = count($patternList);
        $sensitiveWord = implode(',', $patternList); //敏感词数组转字符串
        $replaceArray = array_combine($patternList, array_fill(0, count($patternList), '*')); //把匹配到的数组进行合并，替换使用
        $stringAfter = strtr($string, $replaceArray); //结果替换
    }
    $log = "原句为 [ {$string} ]<br/>";
    if ($count == 0) {
        $log .= "暂未匹配到敏感词！";
    } else {
        $log .= "匹配到 [ {$count} ]个敏感词：[ {$sensitiveWord} ]<br/>" .
            "替换后为：[ {$stringAfter} ]";
    }
    return $log;
}

function generateNav($config, $current = "index")
{
    echo '<div class="head">
                <a href="' . $config['site_url'] . '"><img src="' . $config['site_url'] . '/assets/img/logo.png" alt=""></a>
                <div class="head-body">
                    <ul class="clearfix">';
    $navList = [
        'news' => ['url' => 'newslist/', "name" => "热门资讯"],
        'game' => ['url' => 'game', "name" => "赛事赛程"],
        'activity' => ['url' => 'activity', "name" => "最新活动"],
        'aboutus' => ['url' => 'aboutus', "name" => "关于我们"],
    ];
    foreach ($navList as $key => $value) {
        if ($key == $current) {
            echo '<li class="sel"><a href="' . $config['site_url'] . '/' . $value['url'] . '">' . $value['name'] . '</a></li>';
        } else {
            echo '<li><a href="' . $config['site_url'] . '/' . $value['url'] . '">' . $value['name'] . '</a></li>';
        }
    }
    echo '</ul></div></div>';
    return;
}

function renderHeaderJsCss($config)
{
    echo '<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link rel="stylesheet" href="' . $config['site_url'] . '/css/font-awesome-4.7.0/css/font-awesome.min.css">';
    echo '<link rel="stylesheet" href="' . $config['site_url'] . '/css/reset.css" />';
    echo '<link rel="stylesheet" href="' . $config['site_url'] . '/css/style.css" />';
}

function renderFooterJsCss($config)
{
    echo '<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>';
    echo '<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
}

function renderCertification($withHead = 1)
{
    if ($withHead == 1) {
        echo '    <div class="footer">';
    }
    echo '<p class="copyright">网络文化经营许可证：琼网文〔2015〕2197-011号     琼ICP备19001306号-5</p>';
    if ($withHead == 1) {
        echo '</div>';
    }
}

function is_mobile()
{

    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备

    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {

        return true;

    }


    //此条摘自TPM智能切换模板引擎，适合TPM开发

    if (isset($_SERVER['HTTP_CLIENT']) && 'PhoneClient' == $_SERVER['HTTP_CLIENT']) {

        return true;

    }


    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息

    if (isset($_SERVER['HTTP_VIA'])) //找不到为flase,否则为true

    {

        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;

    }


    //判断手机发送的客户端标志,兼容性有待提高

    if (isset($_SERVER['HTTP_USER_AGENT'])) {

        $clientkeywords = array(

            'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile',

        );

        //从HTTP_USER_AGENT中查找手机浏览器的关键字

        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {

            return true;

        }

    }

    //协议法，因为有可能不准确，放到最后判断

    if (isset($_SERVER['HTTP_ACCEPT'])) {

        // 如果只支持wml并且不支持html那一定是移动设备

        // 如果支持wml和html但是wml在html之前则是移动设备

        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {

            return true;

        }

    }

    return false;

}
// 发送Http状态信息
function send_http_status($code) {
    static $_status = array(
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        // Success 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Moved Temporarily ',  // 1.1
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        // 306 is deprecated but reserved
        307 => 'Temporary Redirect',
        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        509 => 'Bandwidth Limit Exceeded'
    );
    if(isset($_status[$code])) {
        header('HTTP/1.1 '.$code.' '.$_status[$code]);
    }
}


?>
