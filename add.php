<?php
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'add-admin-account') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$qry = mysqli_query($connection, "select * from admin_table where username = '" . $_POST['username'] . "'");
	if (mysqli_num_rows($qry) > 0) {
		header("Location: list-of-administrator-accounts.php?status=username-taken");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from employee_table where username = '" . $_POST['username'] . "'");
		if (mysqli_num_rows($qry) > 0) {
			header("Location: list-of-administrator-accounts.php?status=username-taken");
		}
		else
		{
			$qry = mysqli_query($connection, "select * from customer_table where username = '" . $_POST['username'] . "'");
			if (mysqli_num_rows($qry) > 0) {
				header("Location: list-of-administrator-accounts.php?status=username-taken");
			}
			else
			{
				mysqli_query($connection,"insert into admin_table (firstname, middlename, lastname, username, password) values ('" . $_POST['firstname'] . "', '" . $_POST['middlename'] . "', '" . $_POST['lastname'] . "', '" . $_POST['username'] . "', '" . md5($_POST['password']) . "')");
				header("Location: list-of-administrator-accounts.php?status=added");

			}
		}

	}

}


if (isset($_POST['from']) and $_POST['from'] == 'add-employee-account') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$qry = mysqli_query($connection, "select * from admin_table where username = '" . $_POST['username'] . "'");
	if (mysqli_num_rows($qry) > 0) {
		header("Location: list-of-administrator-accounts.php?status=username-taken");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from employee_table where username = '" . $_POST['username'] . "'");
		if (mysqli_num_rows($qry) > 0) {
			header("Location: list-of-administrator-accounts.php?status=username-taken");
		}
		else
		{
			$qry = mysqli_query($connection, "select * from customer_table where username = '" . $_POST['username'] . "'");
			if (mysqli_num_rows($qry) > 0) {
				header("Location: list-of-administrator-accounts.php?status=username-taken");
			}
			else
			{
				mysqli_query($connection,"insert into employee_table (firstname, middlename, lastname, jobposition, username, password) values ('" . $_POST['firstname'] . "', '" . $_POST['middlename'] . "', '" . $_POST['lastname'] . "', '" . $_POST['jobposition'] . "', '" . $_POST['username'] . "', '" . md5($_POST['password']) . "')");
				header("Location: list-of-employee-accounts.php?status=added");

			}
		}

	}

}


if (isset($_POST['from']) and $_POST['from'] == 'add-menu-category') {
	mysqli_query($connection, "insert into menu_category_table (menucategoryname) values ('" . $_POST['menucategoryname'] . "')");
	header("Location: list-of-menu-category.php?status=added");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-menu-item') {
	mysqli_query($connection, "insert into menu_item_table (menuname, menucategoryid, price, unit) values ('" . $_POST['menuname'] . "', '" . $_POST['menucategoryid'] . "', '" . $_POST['price'] . "', '" . $_POST['unit'] . "')");
	header("Location: list-of-menu.php?status=added");
}






?>