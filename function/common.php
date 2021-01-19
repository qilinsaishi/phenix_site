<?php
    function mb_str_split($str,$split_length=1,$charset="UTF-8")
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
        return implode("",$arr);
    }
    function render_page_pagination($total_count,$page_size,$current_page,$url)
    {

        $p = 5;
        $p2 = 2;
        $totalPage = ceil($total_count/$page_size);
        if($current_page>1)
        {
            echo '<a href="'.$url."/".($current_page-1).'" class="prev"><<</a>';
        }
        if($totalPage<=$p+$p2)
        {
            for($i=1;$i<=$totalPage;$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="active"':'').'href="'.$url."/".$i.'">'.$i.'</a>';
            }
        }
        else
        {
            if($current_page<=($p-$p2))
            {
                for($i=1;$i<=$p;$i++)
                {
                    echo '<a '.(($i-$current_page)==0?'class="active"':'').' href="'.$url."/".$i.'">'.$i.'</a>';
                }
                echo '<a href="'.$url."/".($current_page+$p).'">...</a>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
                }
            }
            elseif($current_page<=($p))
            {
                for($i=1;$i<=($p+$p2);$i++)
                {
                    echo '<a '.(($i-$current_page)==0?'class="active"':'').' href="'.$url."/".$i.'">'.$i.'</a>';
                }
                echo '<a  href="'.$url."/".($current_page+$p).'">...</a>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
                }
            }
            elseif($current_page>$p && $current_page<($totalPage-$p))
            {
                for($i=1;$i<=1;$i++)
                {
                    echo '<a href="'.$url."/".$i.'">'.$i.'</a>';
                }
                echo '<a href="'.$url."/".($current_page-$p).'">...</a>';
                for($i=$current_page-2;$i<=$current_page+2;$i++)
                {
                    echo '<a '.(($i-$current_page)==0?'class="active"':'').' href="'.$url."/".$i.'">'.$i.'</a>';
                }
                echo '<a href="'.$url."/".($current_page+$p).'">...</a>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
                }
            }
            elseif($current_page>=($totalPage-$p))
            {
                for($i=1;$i<=1;$i++)
                {
                    echo '<a href="'.$url."/".$i.'">'.$i.'</a>';
                }
                if($totalPage-$p != 1)
                {
                    echo '<a href="'.$url."/".($current_page-$p).'">...</a>';
                }
                for($i=$p;$i>0;$i--)
                {
                    echo '<a '.(($totalPage-$i-$current_page)==0?'class="active"':'').' href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
                }
            }
        }
        if($current_page<$totalPage)
        {
            echo '<a href="'.$url."/".($current_page+1).'" class="next">>></a>';
        }
    }
    function processCache($cacheConfig,$dataType,$params=[])
    {
        print_R($cacheConfig);
        die();
    }
    function sensitive($list, $string){
        $count = 0; //违规词的个数
        $sensitiveWord = '';  //违规词
        $stringAfter = $string;  //替换后的内容
        $pattern = "/".implode("|",$list)."/i"; //定义正则表达式
        if(preg_match_all($pattern, $string, $matches)){ //匹配到了结果
            $patternList = $matches[0];  //匹配到的数组
            $count = count($patternList);
            $sensitiveWord = implode(',', $patternList); //敏感词数组转字符串
            $replaceArray = array_combine($patternList,array_fill(0,count($patternList),'*')); //把匹配到的数组进行合并，替换使用
            $stringAfter = strtr($string, $replaceArray); //结果替换
        }
        $log = "原句为 [ {$string} ]<br/>";
        if($count==0){
            $log .= "暂未匹配到敏感词！";
        }else{
            $log .= "匹配到 [ {$count} ]个敏感词：[ {$sensitiveWord} ]<br/>".
                "替换后为：[ {$stringAfter} ]";
        }
        return $log;
    }
    function generateNav($config,$current = "index")
    {
        echo '<div class="head">
                <a href="'.$config['site_url'].'"><img src="'.$config['site_url'].'/assets/img/logo.png" alt=""></a>
                <div class="head-body">
                    <ul class="clearfix">';
        $navList = [
            'news'=>['url'=>'newslist/',"name"=>"热门资讯"],
            'game'=>['url'=>'game',"name"=>"赛事赛程"],
            'activity'=>['url'=>'activity',"name"=>"最新活动"],
            'aboutus'=>['url'=>'aboutus',"name"=>"关于我们"],
        ];
        foreach($navList as $key => $value)
        {
            if($key == $current)
            {
                echo '<li class="sel"><a href="'.$config['site_url'].'/'.$value['url'].'">'.$value['name'].'</a></li>';
            }
            else
            {
                echo '<li><a href="'.$config['site_url'].'/'.$value['url'].'">'.$value['name'].'</a></li>';
            }
        }
        echo '</ul></div></div>';
        return;
    }
    function renderHeaderJsCss($config)
    {
        echo '<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">';
        echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/font-awesome-4.7.0/css/font-awesome.min.css">';
        echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/reset.css" />';
        echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/style.css" />';
    }
    function renderFooterJsCss($config)
    {
        echo '<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>';
        echo '<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    }
    function renderCertification($withHead = 1)
    {
        if($withHead == 1)
        {
            echo '    <div class="footer">';
        }
        echo '<p class="copyright">增值电信业务经营许可证：沪B2-20200299沪ICP备15052255号-1 沪公网安备 31011202012378号</p>';
        if($withHead == 1)
        {
            echo '</div>';
        }
    }
    ?>
