<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$cpu = "top -d 0.5 -b -n2 | grep \"Cpu(s)\"|tail -n 1 | awk '{print $2 + $4}'";
$cpu = shell_exec($cpu);
echo "data: $cpu \n\n";
flush();
?>