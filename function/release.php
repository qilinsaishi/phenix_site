<?php
$command = "git checkout master && git pull";
(exec($command,$return));
echo implode("\n",$return)."\n";
unset($return);
$command = "cp config_master.php config.php";
(exec($command,$return));
echo implode("\n",$return)."\n";