<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center">CHECKOUT</h3>



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
			
			  </tr>
			</thead>
			<tbody>

			<?php 
			$arraylength =  count($_SESSION["orders"]);
			$menuitemidvalues = array_column($_SESSION["orders"], 'menuitemid');
			$quantityvalues = array_column($_SESSION["orders"], 'quantity');

			$totalpayment = 0;

			for ($u=0; $u < $arraylength; $u++) { 

			$qry = mysqli_query($connection,"select * from menu_item_view where menuitemid = '" . $menuitemidvalues[$u] . "'");
        	$res = mysqli_fetch_assoc($qry);
        	
			?>

			  <tr>
				<td><?php echo $u+1;; ?></td>
				<td><strong><?php echo $res['menuname']; ?></strong><br><?php echo $res['unit']; ?></td>
				<td>
				<?php echo $quantityvalues[$u]; ?>
				</td>
				<td>
					&#8369; <?php echo number_format($res['price'] * $quantityvalues[$u], 2); ?>
					<?php $totalpayment += $res['price'] * $quantityvalues[$u]; ?>
				</td>
	
			  </tr>
			 <?php 
		
			} ?>

			 <tr class="txt-dark">
				<td></td>
				
				<td>Subtotal</td>
				<td style="font-size: 20px;">&#8369; <?php echo number_format($totalpayment, 2); ?></td>
				<td></td>
			</tr>

			  
			</tbody>
		</table>
	</div>
</div>
</div>

<div class="row">
	
</div>

<div class="form-actions pull-right pr-15">
	

	<a href="controller.php?from=checkout" class="pull-left"><button class="btn  btn-success ">Confirm Order</button></a>


	
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


