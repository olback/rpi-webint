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
			<li class="<?php if($_SESSION['page'] == 'main'){echo "active";}?>"><a href="actions.php?action=main"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?php if($_SESSION['page'] == 'gpio'){echo "active";}?>"><a href="actions.php?action=gpio"><em class="fa fa-toggle-off">&nbsp;</em> GPIO<span class="soon"> (Comming soon)</span></a></li>
			<li class="<?php if($_SESSION['page'] == 'about'){echo "active";}?>"><a href="actions.php?action=about"><em class="fa fa-info-circle">&nbsp;</em> About</a></li>
			<li><a href="actions.php?action=logoff"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->