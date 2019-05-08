<?php if (!(isset($_SESSION['customerid']) )) {
  header("Location: logout.php");
	include_once('connection.php');
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>TAM'S BARQUILLOS</title>

	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-4-active pimary-color-red">

        <!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						
				
							<span class="brand-text">TAM'S BARQUILLOS</span>
						
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu" ></i></a>
			
		
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="profile.php"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li>
								<a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		


		<?php if (isset($_SESSION['customerid'])): ?>
					<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Welcome <?php $qry = mysqli_query($connection, "select * from customer_table where customerid = '" . $_SESSION['customerid'] . "'"); $res = mysqli_fetch_assoc($qry); echo $res['firstname'] . " " . $res['middlename'] . " " . $res['lastname'] ?></span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li style="font-size: 20px; padding-bottom: 10px; padding-top: 10px;">
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'menu') { ?> class="active" <?php } ?> href="menu-category.php"><div class="pull-left"><i class="zmdi zmdi-cake mr-20"></i><span class="right-nav-text">Menu</span></div><div class="clearfix"></div></a>
				</li>
				<li style="font-size: 20px; padding-bottom: 10px; padding-top: 10px;">
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'expert-menu') { ?> class="active" <?php } ?> href="expert-menu.php"><div class="pull-left"><i class="zmdi zmdi-cutlery mr-20"></i><span class="right-nav-text">Expert Menu</span></div><div class="clearfix"></div></a>
				</li>
				<li style="font-size: 20px; padding-bottom: 10px; padding-top: 10px;">
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'my-orders') { ?> class="active" <?php } ?> href="my-orders.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">My Orders</span></div><div class="clearfix"></div></a>
				</li>
				<li style="font-size: 20px; padding-bottom: 10px; padding-top: 10px;">
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'profile') { ?> class="active" <?php } ?> href="profile.php"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">Profile</span></div><div class="clearfix"></div></a>
				</li>
				<li style="font-size: 20px; padding-bottom: 10px; padding-top: 10px;">
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'logout') { ?> class="active" <?php } ?> href="logout.php"><div class="pull-left"><i class="zmdi zmdi-long-arrow-left mr-20"></i><span class="right-nav-text">Logout</span></div><div class="clearfix"></div></a>
				</li>
			</ul>

		

		</div>
		<!-- /Left Sidebar Menu -->
		
		<?php endif ?>


		<style type="text/css">
			

.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;


}

.my-float{
	margin-top:22px;
}
		</style>
       
		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

			<a href="cart.php" class="float">
			<i class="fa fa-shopping-cart my-float" style="font-size: 20px;"></i>
			<?php 
			$arraylength =  count($_SESSION["orders"]);
			$menuitemidvalues = array_column($_SESSION["orders"], 'menuitemid');
			$sum = 0;
			for ($u=0; $u < $arraylength; $u++) { 
			$sum = $sum + $_SESSION['orders'][$menuitemidvalues[$u]]['quantity'];
}
			echo $sum;
			 ?>
			
			</a>