<?php 
include_once('connection.php');

// login codes
if (isset($_POST['from']) and $_POST['from'] == 'login') {

	$username = $_POST['username'];
	$password = md5($_POST['password']);


	$qry = mysqli_query($connection, "select * from admin_table where username = '" . $username . "' and password = '" . $password . "'");

	if (mysqli_num_rows($qry) > 0) {

		$result = mysqli_fetch_assoc($qry);

		$_SESSION["adminid"] =  $result['adminid'];


		header("Location: admin-dashboard.php");
		

	}
	else
	{
		$qry = mysqli_query($connection, "select * from employee_table where username = '" . $username . "' and password = '" . $password . "'");

		if (mysqli_num_rows($qry) > 0) {

			

			$result = mysqli_fetch_assoc($qry);

			$_SESSION["employeeid"] =  $result['employeeid'];
			$_SESSION['jobposition'] = $result['jobposition'];


			header("Location: employee-dashboard.php");
			

		}
		else
		{
				header("Location: index.php?status=failed");	
		}
		
	}
}
// end login codes

 ?>