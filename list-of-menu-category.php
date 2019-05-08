<?php
include_once('connection.php');
$_SESSION['page'] = 'menu-categories';
include('header.php');
 ?>
<!-- Title -->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Menu</h5>
	</div>
</div>
<!-- /Title -->	
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">List of Menu Category</h6>
				</div>
				<div class="clearfix"></div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddModal">Add Menu Category</button>
				</div>
				<div class="clearfix"></div>
			</div>


			<?php if (isset($_GET['status']) and $_GET['status'] == 'added'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menu Category Added. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menu Category updated. 
			</div>
			<?php endif ?>

			<?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menu Category deleted. 
			</div>
			<?php endif ?>


			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Menu Category ID</th>
										<th>Menu Category Name</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$qry = mysqli_query($connection, "select * from menu_category_table");
									while($res = mysqli_fetch_assoc($qry)) { ?>
									<tr>
										<td><?php echo $res['menucategoryid']; ?></td>
										<td><?php echo $res['menucategoryname']; ?></td>
						
										<td class="text-nowrap">

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#EditModal<?php echo $res['menucategoryid']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

											<a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#DeleteModal<?php echo $res['menucategoryid']; ?>"> <i class="fa fa-close text-danger m-r-10"></i> </a>

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
						<label for="recipient-name" class="control-label mb-10">Menu Category Name</label>
						<input type="text" class="form-control" id="menucategoryname" name="menucategoryname" required="">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="from" value="add-menu-category" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
$qry = mysqli_query($connection, "select * from menu_category_table");
while($res = mysqli_fetch_assoc($qry)) { ?>

<div class="modal fade" id="EditModal<?php echo $res['menucategoryid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">UPDATE</h5>
			</div>
			<div class="modal-body">
				<form action="update.php" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Menu Category Name</label>
						<input type="text" class="form-control" id="menucategoryname" name="menucategoryname" required="" value="<?php echo $res['menucategoryname']; ?>">
					</div>			

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="menucategoryid" value="<?php echo $res['menucategoryid'] ?>" hidden>
				<input type="text" name="from" value="update-menu-category" hidden="">
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>



<div class="modal fade bs-example-modal-sm in" id="DeleteModal<?php echo $res['menucategoryid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel1">DELETE</h5>
			</div>
			<div class="modal-body">
				<form action="delete.php" method="POST">
				<h4>ARE YOU SURE TO DELETE?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="text" name="menucategoryid" value="<?php echo $res['menucategoryid'] ?>" hidden>
				<input type="text" name="from" value="delete-menu-category" hidden="">
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


