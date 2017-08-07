<?php

    require __DIR__ . '/config.php';
    session_start();

    if($_SESSION['username'] !== $username){
        Header("Location: ./");
        die();
    }

?>

<?php require __dir__ . '/res/about_arrays.php'; ?>
<?php require __dir__ . '/res/head.php'; ?>
<?php $_SESSION['page'] = "about"; ?>
<?php require __dir__ . '/res/nav.php'; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="./actions.php?action=main">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">About</li>
			</ol>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">About</h1>
			</div>
		</div><!--/.row-->

        <h2>Networking</h2>

        <!-- eth0 -->
        <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						eth0
					</div>

					<div class="panel-body">
						<table class="table">
                            <tbody>
                                <tr>
                                <th scope="row" style="border-top: none !important;">IP</th>
                                <td style="border-top: none !important;"><?php echo $eth0[0];?></td>
                                </tr>

                                <tr>
                                <th scope="row">IPv6</th>
                                <td><?php echo $eth0[1];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Mask</th>
                                <td><?php echo $eth0[2];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Gateway</th>
                                <td><?php echo $eth0[3];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Broadcast</th>
                                <td><?php echo $eth0[4];?></td>
                                </tr>

                                <tr>
                                <th scope="row">DNS</th>
                                <td><?php echo $eth0[5];?></td>
                                </tr>

                                <tr>
                                <th scope="row">MAC Address</th>
                                <td><?php echo $eth0[6];?></td>
                                </tr>
                            </tbody>
                        </table>
					</div>
				</div>
        </div><!--End .eth0-->

        <!-- wlan0 -->
        <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						wlan0
					</div>

					<div class="panel-body">
						<table class="table">
                            <tbody>
                                <tr>
                                <th scope="row" style="border-top: none !important;">IP</th>
                                <td style="border-top: none !important;"><?php echo $wlan0[0];?></td>
                                </tr>

                                <tr>
                                <th scope="row">IPv6</th>
                                <td><?php echo $wlan0[1];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Mask</th>
                                <td><?php echo $wlan0[2];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Gateway</th>
                                <td><?php echo $wlan0[3];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Broadcast</th>
                                <td><?php echo $wlan0[4];?></td>
                                </tr>

                                <tr>
                                <th scope="row">DNS</th>
                                <td><?php echo $wlan0[5];?></td>
                                </tr>

                                <tr>
                                <th scope="row">MAC Address</th>
                                <td><?php echo $wlan0[6];?></td>
                                </tr>
                            </tbody>
                        </table>
					</div>
				</div>
        </div><!--End .wlan0-->

        <h2>System info</h2>

        <!-- Processor -->
        <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Processor
					</div>

					<div class="panel-body">
						<table class="table">
                            <tbody>
                                <tr>
                                <th scope="row" style="border-top: none !important;">Hostname</th>
                                <td style="border-top: none !important;"><?php echo $processor[0];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Cores</th>
                                <td><?php echo $processor[1]; ?></td>
                                </tr>

                                <tr>
                                <th scope="row">Max speed</th>
                                <td><?php echo $processor[2];?></td>
                                </tr>
                            </tbody>
                        </table>
					</div>
				</div>
        </div><!--End .processor-->

        <!-- System -->
        <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						System
					</div>

					<div class="panel-body">
						<table class="table">
                            <tbody>
                                <tr>
                                <th scope="row" style="border-top: none !important;">Hostname</th>
                                <td style="border-top: none !important;"><?php echo $system[0];?></td>
                                </tr>

                                <tr>
                                <th scope="row">Uptime</th>
                                <td><?php echo $system[1]; ?></td>
                                </tr
                                
                                <tr>
                                <th scope="row">Model</th>
                                <td><?php echo $system[2]; ?></td>
                                </tr>
                            </tbody>
                        </table>
					</div>
				</div>
        </div><!--End .system-->

	</div>
	<!--/.main-->
	
	
<?php require __dir__ . '/res/scripts.php'; ?>		
<?php require __dir__ . '/res/footer.php'; ?>