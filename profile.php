<?php
include_once('connection.php');
include('header.php');
 ?>
<!-- Title -->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Profile</h5>
	</div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Update Profile</h6>
				</div>
				<div class="clearfix"></div>
			</div>

	

			<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Profile Updated. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'updated-password'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password Updated. 
			</div>
			<?php endif ?>

			
			<?php if (isset($_SESSION['adminid'])): ?>

			<?php 
			$qry = mysqli_query($connection, "select * from admin_table where adminid = '" . $_SESSION['adminid'] . "'");
			$res = mysqli_fetch_assoc($qry);
			 ?>
			<form action="update.php" method="POST">
				<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-group">
						<label class="control-label mb-10 text-left">First Name</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $res['firstname'] ?>">
					</div>

					<div class="form-group">
						<label class="control-label mb-10 text-left">Middle Name</label>
						<input type="text" class="form-control" name="middlename" value="<?php echo $res['middlename'] ?>">
					</div>

					<div class="form-group">
						<label class="control-label mb-10 text-left">Last Name</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $res['lastname'] ?>">
					</div>

					<div class="pull-right">
						<input type="text" name="from" value="profile-admin" hidden>
					<button type="submit" class="btn btn-primary">Update Profile</button>
				</div>

				</div>
			</div>
			</form>


			<form action="update.php" method="POST">
				<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-group">
						<label class="control-label mb-10 text-left">Change Password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="pull-right">
						<input type="text" name="from" value="password-admin" hidden>
					<button type="submit" class="btn btn-primary">Update Password</button>
				</div>

				</div>
			</div>
			</form>




			<?php endif ?>


			<?php if (isset($_SESSION['employeeid'])): ?>

			<?php 
			$qry = mysqli_query($connection, "select * from employee_table where employeeid = '" . $_SESSION['employeeid'] . "'");
			$res = mysqli_fetch_assoc($qry);
			 ?>
			<form action="update.php" method="POST">
				<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-group">
						<label class="control-label mb-10 text-left">First Name</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $res['firstname'] ?>">
					</div>

					<div class="form-group">
						<label class="control-label mb-10 text-left">Middle Name</label>
						<input type="text" class="form-control" name="middlename" value="<?php echo $res['middlename'] ?>">
					</div>

					<div class="form-group">
						<label class="control-label mb-10 text-left">Last Name</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $res['lastname'] ?>">
					</div>

					<div class="pull-right">
						<input type="text" name="from" value="profile-employee" hidden>
					<button type="submit" class="btn btn-primary">Update Profile</button>
				</div>

				</div>
			</div>
			</form>


			<form action="update.php" method="POST">
				<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-group">
						<label class="control-label mb-10 text-left">Change Password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="pull-right">
						<input type="text" name="from" value="password-employee" hidden>
					<button type="submit" class="btn btn-primary">Update Password</button>
				</div>

				</div>
			</div>
			</form>




			<?php endif ?>


		</div>	
	</div>
</div>
<!-- /Row -->

<?php 
include('footer.php');
 ?>


