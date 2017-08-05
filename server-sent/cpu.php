<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$cpu = "grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage \"\"}'";
$cpu = shell_exec($cpu);
echo "data: $cpu \n\n";
flush();
?>