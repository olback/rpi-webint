<?php
// eth0 information
$eth0 = array(
    shell_exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*'"), // IP
    shell_exec("ifconfig eth0 | grep inet6 | awk '{print $3}'"), // IPv6
    shell_exec("ifconfig eth0 | grep Mask | awk '{print $4}' | cut -c 6-"), // Subnetmask
    shell_exec("route -n | awk '{print $2}' | grep -v '0.0.0.0' | tail -1"), // Gateway
    shell_exec("ifconfig eth0 | grep Bcast | awk '{print $3}' | cut -c 7-"), // Broadcast
    shell_exec("ifconfig eth0 | grep HWaddr | awk '{print $5}'"), // MAC Address
);

// wlan0 information
$wlan0 = array(
    shell_exec("ifconfig wlan0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*'"), // IP
    shell_exec("ifconfig wlan0 | grep inet6 | awk '{print $3}'"), // IPv6
    shell_exec("ifconfig wlan0 | grep Mask | awk '{print $4}' | cut -c 6-"), // Subnetmask
    shell_exec("route -n | awk '{print $2}' | grep -v '0.0.0.0' | tail -1"), // Gateway
    shell_exec("ifconfig wlan0 | grep Bcast | awk '{print $3}' | cut -c 7-"), // Broadcast
    shell_exec("ifconfig wlan0 | grep HWaddr | awk '{print $5}'"), // MAC Address
);

// Processor information
$processor = array(
    shell_exec("cat /proc/cpuinfo | grep 'model name' | awk '$3 {print $4,$5,$6,$7,$8,$9}' | head -1"), // Processor Model
    shell_exec("cat /proc/cpuinfo | grep processor | awk '{print $3}' | tail -1"), // Processor cores
    shell_exec("cat /sys/devices/system/cpu/cpufreq/policy0/cpuinfo_max_freq"), // Max processor speed
);

// System information
$system = array(
    shell_exec("cat /etc/hostname"), // Hostname
    shell_exec("cat /proc/uptime | awk '{print $1}'"), // Uptime in seconds
    shell_exec("cat /proc/cpuinfo | grep Revision | awk '{print $3}'"), // Get Raspberry revision
    rtrim(str_replace("\n", "&nbsp|&nbsp", shell_exec("cat /etc/resolv.conf | grep nameserver | awk '{print $2}'")), "&nbsp|&nbsp"), // DNS
);

// Convert uptime from seconds to days.
$system[1] = round($system[1] / 60 / 60 / 24, 2);

// If the uptime is exactly one day, print "day" instead of days.
if($system[1] == 1){
    $system[1] = $system[1] . " day";
} else {
    $system[1] = $system[1] . " days";
}

// Convert Max processor speed to GHZ
$processor[2] = $processor[2] / 1000000 . " Ghz";

// First core is 0, therefor we add 1.
$processor[1] = $processor[1] + 1;

// Translate Hardware Revision Code
switch ($system[2]) { 

    case "a01041\n":
        $system[2] = "Pi 2 Model B v1.1";
        break;

    case "a21041\n":
        $system[2] = "Pi 2 Model B v1.1";
        break;

    case "a22042\n":
        $system[2] = "Pi 2 Model B v1.2";
        break;

    case "900092\n":
        $system[2] = "Pi Zero v1.2";
        break;

    case "900093\n":
        $system[2] = "Pi Zero v1.3";
        break;

    case "0x9000C1\n":
        $system[2] = "Pi Zero W";
        break;

    case "a02082\n":
        $system[2] = "Pi 3 Model B";
        break;

    case "a22082\n":
        $system[2] = "Pi 3 Model B";
        break;

    default:
        $system[2] = "Unknown model";
        break;
}

?>