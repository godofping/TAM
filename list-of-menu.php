<?php
include_once('connection.php');
$_SESSION['page'] = 'menu-items';
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
					<h6 class="panel-title txt-dark">List of Menu Items</h6>
				</div>
				<div class="clearfix"></div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddModal">Add Menu Item</button>
				</div>
				<div class="clearfix"></div>
			</div>



			<?php if (isset($_GET['status']) and $_GET['status'] == 'added'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menu Item Added. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menu Item updated. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menu Item deleted. 
			</div>
			<?php endif ?>


			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Menu ID</th>
										<th>Menu Name</th>
										<th>Menu Category</th>
										<th>Price</th>
										<th>Units</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$qry = mysqli_query($connection, "select * from menu_item_view");
									while($res = mysqli_fetch_assoc($qry)) { ?>
									<tr>
										<td><?php echo $res['menuitemid']; ?></td>
										<td><?php echo $res['menuname']; ?></td>
										<td><?php echo $res['menucategoryname']; ?></td>
										<td>&#8369; <?php echo number_format($res['price'],2); ?></td>
										<td><?php echo $res['unit']; ?></td>
										<td class="text-nowrap">

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#EditModal<?php echo $res['menuitemid']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#DeleteModal<?php echo $res['menuitemid']; ?>"> <i class="fa fa-close text-danger m-r-10"></i> </a>

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
						<label for="recipient-name" class="control-label mb-10">Menu Name</label>
						<input type="text" class="form-control" id="menuname" name="menuname" required="">
					</div>
					<div class="form-group mt-30 mb-30">
						<label class="control-label mb-10 text-left">Menu Category</label>
						<select class="form-control" name="menucategoryid" required="">
							<option disabled="" selected="">Please Select</option>
							<?php $qry = mysqli_query($connection, "select * from menu_category_table");  
							while($res = mysqli_fetch_assoc($qry)){ ?>
							<option value="<?php echo $res['menucategoryid'] ?>"><?php echo $res['menucategoryname']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Price</label>
						<input type="number" class="form-control" id="price" name="price" required="" min="0">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Unit</label>
						<input type="text" class="form-control" id="unit" name="unit" required="">
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="from" value="add-menu-item" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
$qry = mysqli_query($connection, "select * from menu_item_view");
while($res = mysqli_fetch_assoc($qry)) { ?>

<div class="modal fade" id="EditModal<?php echo $res['menuitemid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">UPDATE</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">

					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Menu Name</label>
						<input type="text" class="form-control" id="menuname" name="menuname" required="" value="<?php echo $res['menuname'] ?>">
					</div>
					<div class="form-group mt-30 mb-30">
						<label class="control-label mb-10 text-left">Menu Category</label>
						<select class="form-control" name="menucategoryid" required="">
							<option selected="" value="<?php echo $res['menucategoryid'] ?>"><?php echo $res['menucategoryname']; ?></option>
							<?php $qry1 = mysqli_query($connection, "select * from menu_category_table");  
							while($res1 = mysqli_fetch_assoc($qry1)){ ?>
							<option value="<?php echo $res1['menucategoryid'] ?>"><?php echo $res1['menucategoryname']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Price</label>
						<input type="number" class="form-control" id="price" name="price" required="" min="0" value="<?php echo $res['price']; ?>">
					</div>

					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Unit</label>
						<input type="text" class="form-control" id="unit" name="unit" required="" value="<?php echo $res['unit'] ?>">
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="menuitemid" value="<?php echo $res['menuitemid'] ?>" hidden>
				<input type="text" name="from" value="update-menu-item" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>



<div class="modal fade bs-example-modal-sm in" id="DeleteModal<?php echo $res['menuitemid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">DELETE</h5>
			</div>
			<div class="modal-body">
				<form action="delete.php" method="POST">
				<h4>ARE YOU SURE TO DELETE <?php echo $res['menuname']; ?>?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="menuitemid" value="<?php echo $res['menuitemid'] ?>" hidden>
				<input type="text" name="from" value="delete-menu-item" hidden="">
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


