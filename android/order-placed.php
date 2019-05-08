<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center">CHECKOUT</h3>


<br>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="well well-sm card-view">
			<h4 class="mb-15">ORDER ID <?php echo $_GET['orderid']; ?></h4>
			<p style="font-size: 20px;">Congratulations, Your order is succesfully placed</p>
		</div>

	</div>
</div>

<div class="row">
	
</div>
<br>

<div class="form-actions pull-right pr-15">
	

	<a href="my-orders.php" class="pull-left"><button class="btn  btn-success ">My Orders</button></a>


	
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


