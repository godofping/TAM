<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center">MY ORDERS</h3>



<div class="panel-body">

<div class="table-wrap mt-20">
	<div class="table-responsive">
		<table class="table mb-0">
			<thead>
			  <tr>
				<th>Order ID</th>
				<th>Order Date</th>
				<th>Total Payment</th>
				<th>Status</th>

			
			  </tr>
			</thead>
			<tbody>

			<?php
			$qry = mysqli_query($connection, "select * from order_view where customerid = '" . $_SESSION['customerid'] . "' order by orderid desc");
			while ($res = mysqli_fetch_assoc($qry)) { ?>
			  <tr>
				<td><?php echo $res['orderid']; ?></td>
				<td><?php echo $res['orderdate']; ?></td>
				<td>₱ <?php echo number_format($res['totalpayment'], 2); ?></td>
				<td style="text-transform: uppercase;"><?php echo $res['status']; ?></td>
			  </tr>
			 <?php } ?>

			</tbody>
		</table>
	</div>
</div>
</div>

<div class="row">
	
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


