<?php
include_once('connection.php');
$_SESSION['page'] = 'order-list1';
include('header.php');
 ?>
<!-- Title -->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Orders</h5>
	</div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">List of Orders</h6>
				</div>
				<div class="clearfix"></div>
			</div>


			

			<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
				<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Order Deleted. 
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
										<th>Order Date</th>
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
									$qry = mysqli_query($connection, "select * from order_view");
									while($res = mysqli_fetch_assoc($qry)) { ?>
									<tr>
										<td>ORDER ID <?php echo $res['orderid']; ?></td>
										<td><?php echo $res['orderdate']; ?></td>
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


											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#DeleteModal<?php echo $res['orderid']; ?>"> <i class="fa fa-close text-inverse m-r-10"></i> </a>

											


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
$qry = mysqli_query($connection, "select * from order_view");
while($res = mysqli_fetch_assoc($qry)) { ?>



<div class="modal fade bs-example-modal-sm in" id="DeleteModal<?php echo $res['orderid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">DELETE</h5>
			</div>
			<div class="modal-body">
				<form action="delete.php" method="POST">
				<h4>ARE YOU SURE TO DELETE ORDER ID <?php echo $res['orderid']; ?>?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="orderid" value="<?php echo $res['orderid'] ?>" hidden>
				<input type="text" name="from" value="delete-order-from-admin" hidden="">
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


