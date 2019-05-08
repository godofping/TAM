<?php
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'delete-admin-account') {
	mysqli_query($connection, "delete from admin_table where adminid = '" . $_POST['adminid'] . "'  ");
	header("Location: list-of-administrator-accounts.php?status=deleted");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-employee-account') {
	mysqli_query($connection, "delete from employee_table where employeeid = '" . $_POST['employeeid'] . "'  ");
	header("Location: list-of-employee-accounts.php?status=deleted");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-menu-category') {
	mysqli_query($connection, "delete from menu_category_table where menucategoryid = '" . $_POST['menucategoryid'] . "' ");

	header("Location: list-of-menu-category.php?status=deleted");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-menu-item') {
	mysqli_query($connection, "delete from menu_item_table where menuitemid = '" . $_POST['menuitemid'] . "' ");

	header("Location: list-of-menu.php?status=deleted");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-customer-account') {
	mysqli_query($connection, "delete from customer_table where customerid = '" . $_POST['customerid'] . "' ");

	header("Location: list-of-customer-accounts.php?status=deleted");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-order-from-admin') {
	mysqli_query($connection, "delete from order_table where orderid = '" . $_POST['orderid'] . "'");

	header("Location: list-of-orders1.php?status=deleted");
}


?>