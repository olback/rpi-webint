<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$var = "cat /proc/meminfo | grep MemFree | awk '$1 {print $2}'";
$var = shell_exec($var);
echo "data: $var \n\n";
flush();
?>