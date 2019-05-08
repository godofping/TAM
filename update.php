<?php
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'update-admin-account') {
	mysqli_query($connection, "update admin_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "', lastname = '" . $_POST['lastname'] . "' where adminid = '" . $_POST['adminid'] . "'  ");
	header("Location: list-of-administrator-accounts.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-employee-account') {
	mysqli_query($connection, "update employee_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "', lastname = '" . $_POST['lastname'] . "', jobposition = '" . $_POST['jobposition'] . "' where employeeid = '" . $_POST['employeeid'] . "'  ");
	header("Location: list-of-employee-accounts.php?status=updated");
}


if (isset($_POST['from']) and $_POST['from'] == 'update-menu-category') {
	mysqli_query($connection, "update menu_category_table set menucategoryname = '" . $_POST['menucategoryname'] . "' where menucategoryid = '" . $_POST['menucategoryid'] . "'");

	header("Location: list-of-menu-category.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-menu-item') {
	mysqli_query($connection, "update menu_item_table set menuname = '" . $_POST['menuname'] . "', menucategoryid = '" . $_POST['menucategoryid'] . "', price = '" . $_POST['price'] . "', unit = '" . $_POST['unit'] . "' where menuitemid = '" . $_POST['menuitemid'] . "'");

	header("Location: list-of-menu.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-customer-account') {
	mysqli_query($connection, "update customer_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "', lastname = '" . $_POST['lastname'] . "', birthday = '" . $_POST['birthday'] . "', gender = '" . $_POST['gender'] . "', address = '" . $_POST['address'] . "', emailaddress = '" . $_POST['emailaddress'] . "' where customerid = '" . $_POST['customerid'] . "'");
	
	header("Location: list-of-customer-accounts.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'confirm-order-status') {
	mysqli_query($connection, "update order_table set status = 'confirmed', employeeid = '" . $_SESSION['employeeid'] . "' where orderid = '" . $_POST['orderid'] . "'");
	header("Location: list-of-order-employee.php?status=confirmed");
}

if (isset($_POST['from']) and $_POST['from'] == 'cancel-order-status') {
	mysqli_query($connection, "update order_table set status = 'cancelled', employeeid = '" . $_SESSION['employeeid'] . "' where orderid = '" . $_POST['orderid'] . "'");
	header("Location: list-of-order-employee.php?status=cancelled");
}

if (isset($_POST['from']) and $_POST['from'] == 'paid-order-status') {
	mysqli_query($connection, "update order_table set status = 'paid', employeeid = '" . $_SESSION['employeeid'] . "' where orderid = '" . $_POST['orderid'] . "'");
	header("Location: list-of-order-employee.php?status=paid");
}


if (isset($_POST['from']) and $_POST['from'] == 'update-order-status') {
	mysqli_query($connection, "update order_table set status = '" . $_POST['status'] . "', employeeid = '" . $_SESSION['employeeid'] . "' where orderid = '" . $_POST['orderid'] . "'");
	header("Location: list-of-order-employee.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'profile-admin') {
	mysqli_query($connection, "update admin_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "', lastname = '" . $_POST['lastname'] . "' where adminid = '" . $_SESSION['adminid'] . "'");
	header("Location: profile.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'password-admin') {
	mysqli_query($connection, "update admin_table set password = '" . md5($_POST['password']) . "' where adminid = '" . $_SESSION['adminid'] . "'");
	header("Location: profile.php?status=updated-password");
}


if (isset($_POST['from']) and $_POST['from'] == 'profile-employee') {
	mysqli_query($connection, "update employee_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "', lastname = '" . $_POST['lastname'] . "' where employeeid = '" . $_SESSION['employeeid'] . "'");
	header("Location: profile.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'password-employee') {
	mysqli_query($connection, "update employee_table set password = '" . md5($_POST['password']) . "' where employeeid = '" . $_SESSION['employeeid'] . "'");
	header("Location: profile.php?status=updated-password");
}




?>