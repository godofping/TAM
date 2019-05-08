<?php if (!(isset($_SESSION['adminid']) or isset($_SESSION['employeeid']))) {
  header("Location: logout.php");
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
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
			
		
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
		
		<?php if (isset($_SESSION['adminid'])): ?>
					<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'main') { ?> class="active" <?php } ?> href="admin-dashboard.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
				</li>
			
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>accounts</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'admin-accounts') { ?> class="active" <?php } ?> href="list-of-administrator-accounts.php"><div class="pull-left"><i class="zmdi zmdi-account-box mr-20"></i><span class="right-nav-text">administrator accounts</span></div><div class="clearfix"></div></a>
				</li>

				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'employee-accounts') { ?> class="active" <?php } ?> href="list-of-employee-accounts.php"><div class="pull-left"><i class="zmdi zmdi-account-circle mr-20"></i><span class="right-nav-text">employee accounts</span></div><div class="clearfix"></div></a>
				</li>

				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'customer-accounts') { ?> class="active" <?php } ?> href="list-of-customer-accounts.php"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">customer accounts</span></div><div class="clearfix"></div></a>
				</li>



				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>menu</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'menu-categories') { ?> class="active" <?php } ?> href="list-of-menu-category.php"><div class="pull-left"><i class="zmdi zmdi-local-cafe mr-20"></i><span class="right-nav-text">menu categories</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'menu-items') { ?> class="active" <?php } ?> href="list-of-menu.php"><div class="pull-left"><i class="zmdi zmdi-local-bar mr-20"></i><span class="right-nav-text">menu items</span></div><div class="clearfix"></div></a>
				</li>


				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Orders</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'order-list1') { ?> class="active" <?php } ?> href="list-of-orders1.php"><div class="pull-left"><i class="zmdi zmdi-cake mr-20"></i><span class="right-nav-text">order list</span></div><div class="clearfix"></div></a>
				</li>
			


				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Reports</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'customer-list') { ?> class="active" <?php } ?> href="list-of-customers.php"><div class="pull-left"><i class="zmdi zmdi-local-cafe mr-20"></i><span class="right-nav-text">customer list</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'order-list') { ?> class="active" <?php } ?> href="list-of-orders.php"><div class="pull-left"><i class="zmdi zmdi-cake mr-20"></i><span class="right-nav-text">order list</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'collection-list') { ?> class="active" <?php } ?> href="list-of-collections.php"><div class="pull-left"><i class="zmdi zmdi-collection-text mr-20"></i><span class="right-nav-text">collection list</span></div><div class="clearfix"></div></a>
				</li>


			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		<?php endif ?>


		<!-- cashier -->
		<?php if (isset($_SESSION['employeeid'])): ?>
					<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'main') { ?> class="active" <?php } ?> href="admin-dashboard.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
				</li>

				<li class="navigation-header">
					<span>Orders</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a <?php if (isset($_SESSION['page']) and $_SESSION['page'] == 'orders') { ?> class="active" <?php } ?> href="list-of-order-employee.php"><div class="pull-left"><i class="zmdi zmdi-cake mr-20"></i><span class="right-nav-text">Order List</span></div><div class="clearfix"></div></a>
				</li>


			</ul>

		

		</div>
		<!-- /Left Sidebar Menu -->
		
		<?php endif ?>


       
		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">