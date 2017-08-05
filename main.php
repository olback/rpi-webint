<?php

    require __DIR__ . '/config.php';
    session_start();

    if($_SESSION['username'] !== $username){
        Header("Location: ./");
        die();
    }

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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RPi - Webint</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>RPi</span> Web Interface</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-gear"></em>
						</a>
						<ul class="dropdown-menu dropdown-alerts" style="background-color: white;">
							
							<li>
							  <a href="actions.php?action=shutdown">
								<div><em class="fa fa-power-off"></em>Shut down</div>
							  </a>
							</li>

							<li class="divider"></li>
							
							<li>
							  <a href="actions.php?action=reboot">
								<div><em class="fa fa-repeat"></em>Reboot</div>
							  </a>
							</li>

						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="img/user.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $username; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>PI Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="#"><em class="fa fa-toggle-off">&nbsp;</em> GPIO<span class="soon"> (Comming soon)</span></a></li>
			<li><a href="#"><em class="fa fa-info-circle">&nbsp;</em> About<span class="soon"> (Comming soon)</span></a></li>
			<li><a href="logout.php"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
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
	
	<!--<script src="js/jquery-1.11.1.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--<script src="js/chart.min.js"></script>-->
	<!--<script src="js/chart-data.js"></script>-->
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/realtime.js"></script>
		
</body>
</html>