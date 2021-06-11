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

function render_page_pagination($total_count,$page_size,$current_page,$url)
{
    $domain='http://'.$_SERVER['SERVER_NAME'];
    $p = 5;
    $p2 = 2;
    $totalPage = ceil($total_count/$page_size);
    if($current_page>1)
    {
        echo '<a href="'.$url."/".($current_page-1).'" class="paging_pre"> <img src="'.$domain.'/images/right.png" alt="" class="active img_transform"></a>';
    }
    if($totalPage<=$p+$p2)
    {
        for($i=1;$i<=$totalPage;$i++)
        {
            echo '<a '.(($i-$current_page)==0?'class="paging_num active"  ':'class="paging_num " ').'href="'.$url."/".$i.'">'.$i.'</a>';
        }
    }
    else
    {
        if($current_page<=($p-$p2))
        {
            for($i=1;$i<=$p;$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="paging_num active"   ':'class="paging_num " ').' href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page+$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$p2;$i>0;$i--)
            {
                echo '<a class="paging_num" href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
        elseif($current_page<=($p))
        {
            for($i=1;$i<=($p+$p2);$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="paging_num active"  ':'class="paging_num " ').' href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page+$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$p2;$i>0;$i--)
            {
                echo '<a class="paging_num" href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
        elseif($current_page>$p && $current_page<($totalPage-$p))
        {
            for($i=1;$i<=1;$i++)
            {
                echo '<a class="paging_num" href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page-$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$current_page-2;$i<=$current_page+2;$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="paging_num active"  ':'class="paging_num "').' href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page+$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$p2;$i>0;$i--)
            {
                echo '<a class="paging_num" href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
        elseif($current_page>=($totalPage-$p))
        {
            for($i=1;$i<=1;$i++)
            {
                echo '<a class="paging_num" href="'.$url."/".$i.'">'.$i.'</a>';
            }
            if($totalPage-$p != 1)
            {
                echo '<a class="paging_num" href="'.$url."/".($current_page-$p).'">...</a>';
            }
            for($i=$p;$i>0;$i--)
            {
                echo '<a '.(($totalPage-$i-$current_page)==0?'class="paging_num active"  ':'class="paging_num "').' href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
    }
    if($current_page<$totalPage)
    {
        echo '<a href="'.$url."/".($current_page+1).'" class="paging_next"><img src="'.$domain.'/images/right.png" alt="" class="active "></a>';
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
    echo '            <li>
                <h1>
                    <a href="'.$config['site_url'].'">'.$config['site_name'].'</a>
                </h1>
            </li>';

    $navList = $config['navList'];
    foreach ($navList as $key => $value) {
        if ($key == $current) {
            echo '<li class="active"><a href="' . $config['site_url'] . '/' . $value['url'] . '">' . $value['name'] . '</a></li>';
        } else {
            echo '<li><a href="' . $config['site_url'] . '/' . $value['url'] . '">' . $value['name'] . '</a></li>';
        }
    }
    echo '</ul></div></div>';
    return;
}

function renderFooterJsCss($config)
{
    echo '<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>';
    echo '<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
}

function renderCertification($config)
{
    $siteUrl = $config['site_url'];
    $siteUrl = str_replace("https://","",$siteUrl);
    $siteUrl = str_replace("http://","",$siteUrl);
    echo '<div class="copyright">
        <p><a style="color:white;padding:1em;" href="https://beian.miit.gov.cn/#/Integrated/index">琼ICP备19001306号-5</a></p>
                <p>Copyright © 2021 '.$siteUrl.'</p>
                <p>网站内容来源于网络，如果侵犯您的权益请联系删除</p>
          </div>';
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
function render404($data,$config){
	if(!isset($data) || (isset($data) && count($data)<=0)){
		if(!isset($return['informationList']['data'])){
			return header('location:'.$config['site_url'] . '/' . '404');exit;
		}
	}
	return true;
}
function renderDetail301($config,$redirect)
{
	header('location:'.$config['site_url'] . '/detail/' . $redirect);
	exit;
	return true;
}
function renderHeaderJsCss($config,$customCss = [])
{
    echo '<link rel="shortcut icon" href="'.$config['site_url'].'/images/favicon.ico">';
    $version=time();
    echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/reset.css" type="text/css" />';
    echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/animate.min.css" type="text/css" />';
    echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/style.css" type="text/css" />';
    foreach($customCss as $file)
    {
        if(trim($file)!="")
        {
            echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/'.$file.'.css?v='.$version.'" type="text/css" />';
        }
    }
    echo '<script src="'.$config['site_url'].'/js/rem.js" type="text/javascript"></script>';
    echo '<script src="'.$config['site_url'].'/js/jquery.js" type="text/javascript"></script>';

}

?>
