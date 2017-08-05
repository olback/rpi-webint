<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$cpu = "top -bn1 | grep \"Cpu(s)\" | \sed \"s/.*, *\([0-9.]*\)%* id.*/\\1/\" | \awk '{print 100 - $1}'";
$cpu = shell_exec($cpu);
echo "data: $cpu \n\n";
flush();
?>