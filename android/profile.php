<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->
<br>
<h3 class="txt-dark text-center">Profile</h3>


<br>
<br>
<br>
							<form action="controller.php" method="POST">

							<?php 
							$qry = mysqli_query($connection, "select * from customer_table where customerid = '" . $_SESSION['customerid'] . "'");
							$res = mysqli_fetch_assoc($qry);
							 ?>



												<div class="form-group">
													<label class="control-label mb-10" for="firstname">First Name</label>
													<input type="text" class="form-control" required="" id="firstname" name = "firstname" placeholder="Enter first name" value="<?php echo $res['firstname'] ?>">
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="middlename">Middle Name</label>
													<input type="text" class="form-control" required="" id="middlename" name = "middlename" placeholder="Enter middle name" value="<?php echo $res['middlename'] ?>">
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="lastname">Last Name</label>
													<input type="text" class="form-control" required="" id="lastname" name = "lastname" placeholder="Enter last name" value="<?php echo $res['lastname'] ?>">
												</div>
												<div class="form-group mt-30 mb-30">
													<label class="control-label mb-10 text-left">Gender</label>
													<select class="form-control" name="gender" required="">
														<option selected="" value="<?php echo $res['gender'] ?>"><?php echo $res['gender']; ?></option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="birthday">birthday</label>
													<input type="date" max="12-12-2010" class="form-control" required="" id="birthday" name = "birthday" placeholder="Enter birthday" value="<?php echo $res['birthday'] ?>">
												</div>
												<div class="form-group mt-30 mb-30">
													<label class="control-label mb-10 text-left">Status</label>
													<select class="form-control" name="status" required="">
														<option selected="" value="<?php echo $res['status'] ?>"><?php echo $res['status']; ?></option>
														<option value="Single">Single</option>
														<option value="Female">Married</option>
														<option value="Female">Windowed</option>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="address">Address</label>
													<input type="text" class="form-control" required="" id="address" name = "address" placeholder="Enter address" value="<?php echo $res['address'] ?>">
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="emailaddress">Email Address</label>
													<input type="email" class="form-control" required="" id="emailaddress" name = "emailaddress" placeholder="Enter email address" value="<?php echo $res['emailaddress'] ?>">
												</div>
											
											
												
												<div class="clearfix"></div>

												<br>
												<div class="clearfix"></div>

							

											<div class="form-actions pull-right pr-15">
												<input type="text" name="from" value="profile" hidden="">

												<a type="submit" class="pull-left"><button class="btn  btn-success ">Update Profile</button></a>
											</div>




								


											</form>

											<br>
											<br>


												<form action="controller.php" method="POST">
													<div class="form-group">
													<label class="pull-left control-label mb-10" for="password">Password</label>
									
													<div class="clearfix"></div>
													<input type="password" class="form-control" required="" id="password" name="password" placeholder="Enter password">
												</div>
												<br>
												<div class="form-actions pull-right pr-15">
												<input type="text" name="from" value="password" hidden="">

												<a type="submit" class="pull-left"><button class="btn  btn-success ">Update Password</button></a>
												</form>
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


