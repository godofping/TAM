<?php 
session_start(); 
if (isset($_SESSION['adminid'])) {
  header("Location: admin-dashboard.php");
}
elseif (isset($_SESSION['employeeid'])) {
  header("Location: employee-dashboard.php");
}
else
{
  session_destroy();
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
		
		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.php">
						<span class="brand-text">TAM'S BARQUILLOS</span>
					</a>
				</div>
			
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">

								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">

											<h3 class="text-center txt-dark mb-10">TAM'S BARQUILLOS</h3>
												<?php if (isset($_GET['status']) and $_GET['status'] == 'failed'): ?>
												
												<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="zmdi zmdi-block pr-15 pull-left"></i><p class="pull-left">Login Failed!</p>
												<div class="clearfix"></div>
											</div>
											<?php endif ?>
												<?php if (isset($_GET['status']) and $_GET['status'] == 'success'): ?>
												
												<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">Registration Success!</p>
												<div class="clearfix"></div>
											</div>
											<?php endif ?>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form action="controller.php" method="POST">
												<div class="form-group">
													<label class="control-label mb-10" for="username">Username</label>
													<input type="text" class="form-control" required="" id="username" name = "username" placeholder="Enter username">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="password">Password</label>
									
													<div class="clearfix"></div>
													<input type="password" class="form-control" required="" id="password" name="password" placeholder="Enter password">
												</div>
												
												<div class="clearfix"></div>

												<br>
												<div class="clearfix"></div>

												<div class="form-group text-center">
													<input type="submit"  class="btn btn-info btn-rounded" name="from" hidden="" value="login">
												
												</div>



												<p class="text-center">No account? Register here</p>

												<div class="clearfix"></div>
												<br>




											</form>

											<div class="form-group text-center">
													
													<a href="register.php"><button class="btn btn-info btn-rounded">register here</button></a>

											
												</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
