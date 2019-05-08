<?php
include_once('connection.php');
$_SESSION['page'] = 'orders';
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
					<h6 class="panel-title txt-dark">List of Orders (<?php echo date('Y-m-d'); ?>)</h6>
				</div>
				<div class="clearfix"></div>
			</div>


			<?php if (isset($_GET['status']) and $_GET['status'] == 'Paid'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Order Paid. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'confirmed'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Order Confirmed. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Order Status Updated. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'cancelled'): ?>
				<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Order Cancelled. 
			</div>
			<?php endif ?>



			



			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Order ID</th>
										<th>Customer</th>
										<th>Orders</th>
										<th>Total Payment</th>
										<th>Status</th>
										<th>Status By</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$qry = mysqli_query($connection, "select * from order_view where orderdate = '" . date('Y-m-d') . "'");
									while($res = mysqli_fetch_assoc($qry)) { ?>
									<tr>
										<td>ORDER ID <?php echo $res['orderid']; ?></td>
										<td><?php echo $res['fullname']; ?></td>
										<td>
											<ul class="list-group">
											<?php
											$qry1 = mysqli_query($connection, "select * from cart_item_view where orderid = '" . $res['orderid'] . "'");
											while($res1 = mysqli_fetch_assoc($qry1)) { ?>
											  <li class="list-group-item"><?php echo $res1['menuname']; ?> - QTY: <?php echo $res1['quantity']; ?>  Price: ₱ <?php echo number_format($res1['totalprice'], 2); ?></li>
											  <?php } ?>
											</ul>

										</td>
										<td>₱ <?php echo number_format($res['totalpayment'], 2); ?></td>
										<td style="text-transform: uppercase;"><?php echo $res['status']; ?></td>
										<td>
											<?php
											$qry1 = mysqli_query($connection, "select * from employee_view where employeeid = '" . $res['employeeid'] . "'");
											$res1 = mysqli_fetch_assoc($qry1);
											echo $res1['fullname'] . "<br>" . $res1['jobposition'];
											?>
											
										</td>
										<td class="text-nowrap">

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#ConfirmModal<?php echo $res['orderid']; ?>"> <i class="fa fa-check text-inverse m-r-10"></i> </a>

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#CancelModal<?php echo $res['orderid']; ?>"> <i class="fa fa-close text-inverse m-r-10"></i> </a>

											<?php if ($res['status'] == 'confirmed' and $_SESSION['jobposition'] == 'Cashier'): ?>
												<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#PaidModal<?php echo $res['orderid']; ?>"> <i class="fa fa-money text-inverse m-r-10"></i> </a>
											<?php endif ?>

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#EditModal<?php echo $res['orderid']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

											


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
$qry = mysqli_query($connection, "select * from order_view where orderdate = '" . date('Y-m-d') . "'");
while($res = mysqli_fetch_assoc($qry)) { ?>

<div class="modal fade" id="EditModal<?php echo $res['orderid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">UPDATE</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">
				
					<div class="form-group mt-30 mb-30">
						<label class="control-label mb-10 text-left">Status</label>
						<select class="form-control" name="status" required="">
							<option selected="" value="<?php echo $res['status'] ?>"><?php echo $res['status'] ?></option>
							<option value="pending">pending</option>
							<option value="cancelled">cancelled</option>
							<?php if ($res['status'] == 'confirmed' and $_SESSION['jobposition'] == 'Cashier'): ?>
							<option value="paid">paid</option>
							<?php endif ?>
						</select>
					</div>
				

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="orderid" value="<?php echo $res['orderid'] ?>" hidden>
				<input type="text" name="from" value="update-order-status" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bs-example-modal-sm in" id="ConfirmModal<?php echo $res['orderid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">CONFIRM</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">
				<h4>ARE YOU SURE TO CONFIRM ORDER ID <?php echo $res['orderid']; ?>?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="orderid" value="<?php echo $res['orderid'] ?>" hidden>
				<input type="text" name="from" value="confirm-order-status" hidden="">
				<button type="submit" class="btn btn-danger">CONFIRM</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-sm in" id="CancelModal<?php echo $res['orderid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">CANCEL</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">
				<h4>ARE YOU SURE TO CANCEL ORDER ID <?php echo $res['orderid']; ?>?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="orderid" value="<?php echo $res['orderid'] ?>" hidden>
				<input type="text" name="from" value="cancel-order-status" hidden="">
				<button type="submit" class="btn btn-danger">CONFIRM</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-sm in" id="PaidModal<?php echo $res['orderid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">Paid</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">
				<h4>CONFIRM PAYMENT IN ORDER ID <?php echo $res['orderid']; ?>?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="orderid" value="<?php echo $res['orderid'] ?>" hidden>
				<input type="text" name="from" value="paid-order-status" hidden="">
				<button type="submit" class="btn btn-danger">CONFIRM</button>
				</form>
			</div>
		</div>
	</div>
</div>





<?php } ?>


<?php 
include('footer.php');
 ?>


