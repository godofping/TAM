<?php
include_once('connection.php');
$_SESSION['page'] = 'customer-list';
include('header.php');
 ?>
<!-- Title -->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Customers</h5>
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
include('footer.php');
 ?>


