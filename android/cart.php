<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center">CART</h3>



<div class="panel-body">

<div class="table-wrap mt-20">
	<div class="table-responsive">
		<table class="table mb-0">
			<thead>
			  <tr>
				<th>#</th>
				<th>Item Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Actions</th>
			  </tr>
			</thead>
			<tbody>

			<?php 
			$arraylength =  count($_SESSION["orders"]);
			$menuitemidvalues = array_column($_SESSION["orders"], 'menuitemid');
			$quantityvalues = array_column($_SESSION["orders"], 'quantity');
			for ($u=0; $u < $arraylength; $u++) { 

			$qry = mysqli_query($connection,"select * from menu_item_view where menuitemid = '" . $menuitemidvalues[$u] . "'");
        	$res = mysqli_fetch_assoc($qry);
			?>

			  <tr>
				<td><?php echo $u+1;; ?></td>
				<td><strong><?php echo $res['menuname']; ?></strong><br>
				<?php echo $res['unit']; ?>
				</td>
				<td>
				<form action="controller.php" method="POST">
				<div class="form-group">
					<input type="number" class="form-control" required="" min="1" name="quantity" value="<?php echo $quantityvalues[$u]; ?>">
				</div>
				</td>
				<td>
					&#8369; <?php echo number_format($res['price'] * $quantityvalues[$u], 2); ?>
				</td>
				<td>
				<input type="text" name="from" value="updatecart" hidden="">
				<input type="text" name="menuitemid" value="<?php echo $res['menuitemid'] ?>" hidden>
				<button type="submit" class="btn btn-circle btn-sm btn-success"><i class="fa fa-save (alias)"></i></button> 
				</form>

				<a href="controller.php?from=removecart&menuitemid=<?php echo $res['menuitemid']; ?>"><button class="btn btn-circle btn-sm btn-success"><i class="fa fa-trash-o"></i></button></a>
				</td>
			  </tr>
			 <?php } ?>

			  
			</tbody>
		</table>
	</div>
</div>
</div>

<div class="form-actions pull-right pr-15">
	<a href="menu-category.php" class="pull-left" style="padding-right: 5px;"><button class="btn  btn-success ">Continue Ordering</button></a>

	<a href="checkout.php" class="pull-left"><button class="btn  btn-info ">Checkout</button></a>

	<div class="clearfix"></div>

	<br>
	<a href="controller.php?from=clearcart" class="pull-left"><button class="btn  btn-danger ">Clear Cart</button></a>
	
</div>







<style type="text/css">
	.float{
	margin-top:22px;
	display: none;
}
</style>


<!-- /Title -->
<?php 
include('footer.php');
 ?>


