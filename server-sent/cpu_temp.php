<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$cpu_temp = "sudo /opt/vc/bin/vcgencmd measure_temp | cut -c 6- | cut -c -4";
$cpu_temp = shell_exec($cpu_temp);
echo "data: $cpu_temp \n\n";
flush();
?>