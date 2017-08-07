<?php

    require __DIR__ . '/config.php';
    session_start();

    if($_SESSION['username'] !== $username){
        Header("Location: ./");
        die();
    }

?>


<?php require __dir__ . '/res/head.php'; ?>
<?php $_SESSION['page'] = "gpio"; ?>
<?php require __dir__ . '/res/nav.php'; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="./actions.php?action=main">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">GPIO</li>
			</ol>
		</div><!--/.row-->
        
        <h1>GPIO Comming Soon</h1>
	</div>
	<!--/.main-->
	
	
<?php require __dir__ . '/res/scripts.php'; ?>		
<?php require __dir__ . '/res/footer.php'; ?>