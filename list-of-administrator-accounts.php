<?php
include_once('connection.php');
$_SESSION['page'] = 'admin-accounts';
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
					<h6 class="panel-title txt-dark">List of Administrators</h6>
				</div>
				<div class="clearfix"></div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddModal">Add Administrator Account</button>
				</div>
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
										<th>Admin ID</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Username</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$qry = mysqli_query($connection, "select * from admin_table");
									while($res = mysqli_fetch_assoc($qry)) { ?>
									<tr>
										<td><?php echo $res['adminid']; ?></td>
										<td><?php echo $res['firstname']; ?></td>
										<td><?php echo $res['middlename']; ?></td>
										<td><?php echo $res['lastname']; ?></td>
										<td><?php echo $res['username']; ?></td>
										<td class="text-nowrap">

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#EditModal<?php echo $res['adminid']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#DeleteModal<?php echo $res['adminid']; ?>"> <i class="fa fa-close text-danger m-r-10"></i> </a>

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


<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">ADD</h5>
			</div>
			<div class="modal-body">
				<form action="add.php" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">First Name</label>
						<input type="text" class="form-control" id="firstname" name="firstname" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Middle Name</label>
						<input type="text" class="form-control" id="middlename" name="middlename" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Username</label>
						<input type="text" class="form-control" id="username" name="username" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Password</label>
						<input type="password" class="form-control" id="password" name="password" required="">
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="from" value="add-admin-account" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
$qry = mysqli_query($connection, "select * from admin_table");
while($res = mysqli_fetch_assoc($qry)) { ?>

<div class="modal fade" id="EditModal<?php echo $res['adminid']; ?>" tabindex="-1" role="dialog">
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
				

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="adminid" value="<?php echo $res['adminid'] ?>" hidden>
				<input type="text" name="from" value="update-admin-account" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>



<div class="modal fade bs-example-modal-sm in" id="DeleteModal<?php echo $res['adminid']; ?>" tabindex="-1" role="dialog">
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
				<input type="text" name="adminid" value="<?php echo $res['adminid'] ?>" hidden>
				<input type="text" name="from" value="delete-admin-account" hidden="">
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


