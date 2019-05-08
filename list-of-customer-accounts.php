<?php
include_once('connection.php');
$_SESSION['page'] = 'customer-accounts';
include('header.php');
 ?>
<!-- Title -->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Accounts</h5>
	</div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">List of Customers</h6>
				</div>
				<div class="clearfix"></div>
			
				<div class="clearfix"></div>
			</div>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'username-taken'): ?>
				<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Sorry, username is already taken. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'added'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Account Added. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Account updated. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Account deleted. 
			</div>
			<?php endif ?>


			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Customer ID</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Gender</th>
										<th>Birthday</th>
										<th>Status</th>
										<th>Address</th>
										<th>Email Address</th>
										<th>Username</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$qry = mysqli_query($connection, "select * from customer_view");
									while($res = mysqli_fetch_assoc($qry)) { ?>
									<tr>
										<td><?php echo $res['customerid']; ?></td>
										<td><?php echo $res['firstname']; ?></td>
										<td><?php echo $res['middlename']; ?></td>
										<td><?php echo $res['lastname']; ?></td>
										<td><?php echo $res['gender']; ?></td>
										<td><?php echo $res['birthday']; ?></td>
										<td><?php echo $res['status']; ?></td>
										<td><?php echo $res['address']; ?></td>
										<td><?php echo $res['emailaddress']; ?></td>
										<td><?php echo $res['username']; ?></td>
										<td class="text-nowrap">

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#EditModal<?php echo $res['customerid']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#DeleteModal<?php echo $res['customerid']; ?>"> <i class="fa fa-close text-danger m-r-10"></i> </a>

										</td>

									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Row -->



<?php
$qry = mysqli_query($connection, "select * from customer_view");
while($res = mysqli_fetch_assoc($qry)) { ?>

<div class="modal fade" id="EditModal<?php echo $res['customerid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">UPDATE</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">First Name</label>
						<input type="text" class="form-control" id="firstname" name="firstname" required="" value="<?php echo $res['firstname']; ?>">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Middle Name</label>
						<input type="text" class="form-control" id="middlename" name="middlename" required="" value="<?php echo $res['middlename']; ?>">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" required="" value="<?php echo $res['lastname']; ?>">
					</div>
					<div class="form-group mt-30 mb-30">
						<label class="control-label mb-10 text-left">Gender</label>
						<select class="form-control" name="gender" required="">
							<option selected="" value="<?php echo $res['gender']; ?>"><?php echo $res['gender']; ?></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Birthday</label>
						<input type="date" class="form-control" id="birthday" name="birthday" required="" value="<?php echo $res['birthday']; ?>">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Address</label>
						<input type="text" class="form-control" id="address" name="address" required="" value="<?php echo $res['address']; ?>">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Email Addresss</label>
						<input type="text" class="form-control" id="emailaddress" name="emailaddress" required="" value="<?php echo $res['emailaddress']; ?>">
					</div>
				

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="customerid" value="<?php echo $res['customerid'] ?>" hidden>
				<input type="text" name="from" value="update-customer-account" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>



<div class="modal fade bs-example-modal-sm in" id="DeleteModal<?php echo $res['customerid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">DELETE</h5>
			</div>
			<div class="modal-body">
				<form action="delete.php" method="POST">
				<h4>ARE YOU SURE TO DELETE <?php echo $res['firstname'] . " " . $res['middlename'] . " " . $res['lastname']; ?> ACCOUNT?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="customerid" value="<?php echo $res['customerid'] ?>" hidden>
				<input type="text" name="from" value="delete-customer-account" hidden="">
				<button type="submit" class="btn btn-danger">DELETE</button>
				</form>
			</div>
		</div>
	</div>
</div>




<?php } ?>


<?php 
include('footer.php');
 ?>


