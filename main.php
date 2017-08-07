<?php

    require __DIR__ . '/config.php';
    session_start();

    if($_SESSION['username'] !== $username){
        Header("Location: ./");
        die();
    }
?>
<?php
// Storage:
$storage_pr = shell_exec("df -k | grep /dev/root | awk '{print $5}'");
$storage_used = shell_exec("df -k | grep /dev/root | awk '{print $3}'");
$storage_available = shell_exec("df -k | grep /dev/root | awk '{print $4}'");
settype($storage_used, "integer");
settype($storage_available, "integer");

$storage_total = $storage_used + $storage_available;

$storage_total = $storage_total / 1000000;
$storage_total = round($storage_total, 2);

$storage_used = $storage_used / 1000000;
$storage_used = round($storage_used, 2);

$storage = $storage_used . " / " . $storage_total . " GB";


// Swap:
$swap_total = shell_exec("cat /proc/meminfo | grep SwapTotal | awk '$1 {print $2}'");
$swap_total = settype($swap_total, "integer");

$swap_free = shell_exec("cat /proc/meminfo | grep SwapFree | awk '$1 {print $2}'");
$swap_free = settype($swap_free, "integer");

$swap_used = $swap_total - $swap_free;

$swap_pr = 100 * $swap_used / $swap_total;
$swap_pr = round($swap_pr, 2);

$swap_used = round($swap_used, 2);
$swap_total = round($swap_total, 2);

$swap = $swap_used . " / ". $swap_total . " GB";

// aah! You survived! :D

?>


<?php require __dir__ . '/res/head.php'; ?>
<?php $_SESSION['page'] = "main"; ?>
<?php require __dir__ . '/res/nav.php'; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="./actions.php?action=main">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>CPU</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="0" ><span class="percent"></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>RAM</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="0" ><span class="percent"></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Disk</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $storage_pr; ?>"><span class="percent"><?php echo $storage_pr; ?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Swap</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $swap_pr; ?>" ><span class="percent"><?php echo $swap_pr."%"; ?></span></div>
					</div>
				</div>
			</div>
        </div><!--/.row-->
        <div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><i class="material-icons color-blue">memory</i>
							<div class="large" id="cpu_temp"></div>
							<div class="text-muted">CPU Temperature</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-microchip color-orange"></em>
							<div class="large"><span id="ram_used"></span> / <span id="ram_tot"></span></div>
							<div class="text-muted">RAM Usage</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><i class="material-icons color-teal">sd_storage</i>
							<div class="large"><?php echo $storage ?></div>
							<div class="text-muted">Storage</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-refresh color-red"></em>
							<div class="large"><?php echo $swap; ?></div>
							<div class="text-muted">Swap</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<!--/.main-->

		<script src="js/realtime.js"></script>
	
	
<?php require __dir__ . '/res/scripts.php'; ?>		
<?php require __dir__ . '/res/footer.php'; ?>