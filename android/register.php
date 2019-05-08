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

											<h3 class="text-center txt-dark mb-10">Register account</h3>
												<?php if (isset($_GET['status']) and $_GET['status'] == 'username-taken'): ?>
												
												<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="zmdi zmdi-block pr-15 pull-left"></i><p class="pull-left">Username is already taken!</p>
												<div class="clearfix"></div>
											</div>
											<?php endif ?>
											<h6 class="text-center nonecase-font txt-grey">Please complete the form</h6>
										</div>	
										<div class="form-wrap">
											<form action="controller.php" method="POST">
												<div class="form-group">
													<label class="control-label mb-10" for="firstname">First Name</label>
													<input type="text" class="form-control" required="" id="firstname" name = "firstname" placeholder="Enter first name">
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="middlename">Middle Name</label>
													<input type="text" class="form-control" required="" id="middlename" name = "middlename" placeholder="Enter middle name">
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="lastname">Last Name</label>
													<input type="text" class="form-control" required="" id="lastname" name = "lastname" placeholder="Enter last name">
												</div>
												<div class="form-group mt-30 mb-30">
													<label class="control-label mb-10 text-left">Gender</label>
													<select class="form-control" name="gender" required="">
														<option disabled="" selected="">Please Select</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="birthday">birthday</label>
													<input type="date" max="12-12-2010" class="form-control" required="" id="birthday" name = "birthday" placeholder="Enter birthday">
												</div>
												<div class="form-group mt-30 mb-30">
													<label class="control-label mb-10 text-left">Status</label>
													<select class="form-control" name="status" required="">
														<option disabled="" selected="">Please Select</option>
														<option value="Single">Single</option>
														<option value="Female">Married</option>
														<option value="Female">Windowed</option>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="address">Address</label>
													<input type="text" class="form-control" required="" id="address" name = "address" placeholder="Enter address">
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="emailaddress">Email Address</label>
													<input type="email" class="form-control" required="" id="emailaddress" name = "emailaddress" placeholder="Enter email address">
												</div>
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
													<input type="text" name="from" hidden="" value="register">
													<button type="submit" class="btn btn-info btn-rounded">Register</button>
												</div>



												<p class="text-center">No account? Register here</p>

												<div class="clearfix"></div>
												<br>
								


											</form>
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
