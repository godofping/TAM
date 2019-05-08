<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center"><?php echo $_GET['menucategoryname']; ?></h3>
<br>



<?php 
$qry = mysqli_query($connection, "select * from menu_item_table where menucategoryid = '" . $_GET['menucategoryid'] . "'");

while ($res = mysqli_fetch_assoc($qry)) { ?>

<form action="controller.php" method="POST">
<div class="panel panel-warning card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h4 class="panel-title txt-light"><?php echo $res['menuname']; ?></h4>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="container">
				<div class="row">
				<div class="pull-left">
				<h6><?php echo $res['unit']; ?></h6>
				<h6>Price: &#8369; <?php echo number_format($res['price'],2); ?></h6></div>
				<input type="text" hidden="" name="from" value="addcart">
				<input type="text" hidden="" name="menuitemid" value="<?php echo $res['menuitemid'] ?>">
				<div class="pull-right"><button type="submit" class="btn btn-info">Add to Cart</button></div>
			</div>
			</div>
		</div>
	</div>
</div>
</form>

<?php } ?>



<!-- /Title -->
<?php 
include('footer.php');
 ?>


