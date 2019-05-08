<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<div class="row heading-bg">


	<div class="col-xs-12">
		<?php $qry = mysqli_query($connection, "select * from admin_table where adminid = '" . $_SESSION['adminid'] . "'");
		$res = mysqli_fetch_assoc($qry); ?>

		<h3>Welcome <?php echo $res['firstname']; ?> <?php echo $res['middlename']; ?> <?php echo $res['lastname']; ?></h3>
		<h4>Admin</h4>
		<br>
		<br>

		<?php $qry = mysqli_query($connection, "select count(*) as total from customer_view");
		$res = mysqli_fetch_assoc($qry); ?>

		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $res['total']; ?></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">Number of Customers</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>

				<?php $qry = mysqli_query($connection, "select count(*) as total from order_view where orderdate = '" . date('Y-m-d') . "'");
		$res = mysqli_fetch_assoc($qry); ?>

				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $res['total']; ?></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">Number of Orders Today</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-cake txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>

				<?php $qry = mysqli_query($connection, "select count(*) as total from order_view where orderdate = '" . date('Y-m-d') . "' and status = 'pending'");
		$res = mysqli_fetch_assoc($qry); ?>

				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $res['total']; ?></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">Number of Pending Orders Today</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-group txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>

			</div>
		</div>



	</div>
</div>
<!-- /Title -->
<?php 
include('footer.php');
 ?>


