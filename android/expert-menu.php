<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center">EXPERT MENU</h3>


<br>
<br>
<br>
<form action="controller.php" method="POST">
	<div class="row">
	<div class="col-lg-12">
		<div class="well well-sm card-view">
			
			<p style="font-size: 20px;">
				<div class="form-group">
					<label for="recipient-name" class="control-label mb-10">Amount</label>
					<input type="number" class="form-control" id="amount" name="amount" required="" min="0">
				</div>

			</p>
		</div>

	</div>
</div>

<div class="row">
	
</div>
<br>

<div class="form-actions pull-right pr-15">
	
	<input type="text" name="from" value="expert-menu" hidden>
	<a type="submit" href="my-orders.php" class="pull-left"><button class="btn  btn-success ">OK</button></a>


	
</div>

</form>








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


