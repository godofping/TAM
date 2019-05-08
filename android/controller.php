<?php 
include_once('connection.php');


if (isset($_POST['from']) and $_POST['from'] == 'register') {
	
	$qry = mysqli_query($connection,"select * from customer_table where username = '" . $_POST['username'] . "'");
	$res = mysqli_fetch_assoc($qry);

	if (mysqli_num_rows($qry) > 0) {
		header("Location: register.php?status=username-taken");
	}
	else
	{
		mysqli_query($connection, "insert into customer_table (firstname, middlename, lastname, gender, birthday, status, address, emailaddress, username, password) values ('" . $_POST['firstname'] . "', '" . $_POST['middlename'] . "', '" . $_POST['lastname'] . "', '" . $_POST['gender'] . "', '" . $_POST['birthday'] . "', '" . $_POST['status'] . "', '" . $_POST['address'] . "', '" . $_POST['emailaddress'] . "', '" . $_POST['username'] . "', '" . md5($_POST['password']) . "')");

		$qry = mysqli_query($connection,"select * from customer_table where username = '" . $_POST['username'] . "'");
		$res = mysqli_fetch_assoc($qry);

		$_SESSION['customerid'] = $_res['customerid'];
		header("Location: index.php?status=success");
	}
}

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	
	$qry = mysqli_query($connection,"select * from customer_table where username = '" . $_POST['username'] . "' and password = '" . md5($_POST['password']) . "'");

	if (mysqli_num_rows($qry)) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['customerid'] = $res['customerid'];
		header("Location: menu-category.php");
	}
	else
	{
		header("Location: index.php?status=failed");
	}

}

if (isset($_POST['from']) and $_POST['from'] == 'addcart') {
	


	$arraylength =  count($_SESSION["orders"]);

	$menuitemidvalues = array_column($_SESSION["orders"], 'menuitemid');

	for ($u=0; $u < $arraylength; $u++) { 
	echo "menuitemid : ";
	print_r($_SESSION['orders'][$menuitemidvalues[$u]]['menuitemid']);
	echo " | quantity : ";
	print_r($_SESSION['orders'][$menuitemidvalues[$u]]['quantity']);
	echo "<br>";
	}

	$existing = "false";

	for ($i=0; $i < $arraylength; $i++) { 
		 if ($_SESSION['orders'][$menuitemidvalues[$i]]['menuitemid'] == $_POST['menuitemid']) {
		 	$existing = "true";
		 }
	}
	if ($existing == "true") {
		
		//quantity increment by one 
		$_SESSION['orders'][$_POST['menuitemid']]['quantity']++;
	}
	else
	{
		//add cart
		$_SESSION['orders'][$_POST['menuitemid']] = array('menuitemid' => $_POST['menuitemid'] ,'quantity' => 1);

	}

	header("Location: menu-category.php?status=added");
}

if (isset($_GET['from']) and $_GET['from'] == 'removecart') {
	unset($_SESSION['orders'][$_GET['menuitemid']]);
	header("Location: cart.php");
}


if (isset($_POST['from']) and $_POST['from'] == 'updatecart') {
	if ($_POST['quantity'] > 0) {
		$_SESSION['orders'][$_POST['menuitemid']]['quantity'] =  $_POST['quantity'];
	}

header("Location: cart.php");
}


if (isset($_GET['from']) and $_GET['from'] == 'clearcart') {
unset($_SESSION['orders']);
header("Location: menu-category.php");
}


if (isset($_GET['from']) and $_GET['from'] == 'checkout') {


$arraylength =  count($_SESSION["orders"]);
$menuitemidvalues = array_column($_SESSION["orders"], 'menuitemid');
$quantityvalues = array_column($_SESSION["orders"], 'quantity');

$totalpayment = 0;

mysqli_query($connection, "insert into order_table (customerid, orderdate, status) values ('" . $_SESSION['customerid'] . "', '" . date('Y-m-d') . "', 'pending')");

for ($u=0; $u < $arraylength; $u++) { 

$qry = mysqli_query($connection,"select * from menu_item_view where menuitemid = '" . $menuitemidvalues[$u] . "'");
$res = mysqli_fetch_assoc($qry);

$totalpayment += $res['price'] * $quantityvalues[$u];

}

$qry1 = mysqli_query($connection, "SELECT * FROM order_table ORDER BY orderid DESC LIMIT 1");
$res1 = mysqli_fetch_assoc($qry1);

$orderid = $res1['orderid'];

mysqli_query($connection, "update order_table set totalpayment = '" . $totalpayment . "' where orderid = '" . $orderid . "'");

for ($u=0; $u < $arraylength; $u++) { 

$qry = mysqli_query($connection,"select * from menu_item_view where menuitemid = '" . $menuitemidvalues[$u] . "'");
$res = mysqli_fetch_assoc($qry);

mysqli_query($connection, "insert into cart_item_table (orderid, quantity, menuitemid) values ('" . $orderid . "', '" . $quantityvalues[$u] . "', '" . $res['menuitemid'] . "')");

}

unset($_SESSION['orders']);
header("Location: order-placed.php?orderid=". $orderid ."");



}

if (isset($_POST['from']) and $_POST['from'] == 'expert-menu') {

	$menuitembasedonbudgets = array();
	$selectedmenuitems = array();
	$budget = $_POST['amount'];
	$remainingbudget = $_POST['amount'];
	$totalpayment = 0;

	
	
	



	while($remainingbudget > 0){

		$qry = mysqli_query($connection, "select * from menu_item_table where price <= '" . $remainingbudget . "'");

		while ($res = mysqli_fetch_assoc($qry)) {
		array_push($menuitembasedonbudgets, $res['menuitemid']);
		}


		$randommenuitemid = array_rand($menuitembasedonbudgets,1);
		$randommenuitemid = $menuitembasedonbudgets[$randommenuitemid];

		$qry1 = mysqli_query($connection, "select * from menu_item_view where menuitemid = '" . $randommenuitemid . "'");
		$res1 = mysqli_fetch_assoc($qry1);

		if (($remainingbudget - $res1['price']) >= 0) {
			$totalpayment += $res1['price'];
			$remainingbudget -= $res1['price'];

			array_push($selectedmenuitems, $res1['menuitemid']);

			unset($menuitembasedonbudgets);
			$menuitembasedonbudgets = array();
		}



	
	}

	print_r($selectedmenuitems);
	unset($_SESSION["orders"]);
	$_SESSION["orders"] = array();


	for ($y=0; $y < count($selectedmenuitems) ; $y++) { 
		$arraylength =  count($_SESSION["orders"]);

		$existing = "false";

		for ($i=0; $i < $arraylength; $i++) { 
			 if ($_SESSION['orders'][$selectedmenuitems[$i]]['menuitemid'] == $selectedmenuitems[$y]) {
			 	$existing = "true";
			 }
		}
		if ($existing == "true") {
			
			//quantity increment by one 
			$_SESSION['orders'][$selectedmenuitems[$y]]['quantity']++;
		}
		else
		{
			//add cart
			$_SESSION['orders'][$selectedmenuitems[$y]] = array('menuitemid' => $selectedmenuitems[$y] ,'quantity' => 1);

		}


	}//end for loop

	header("Location: cart.php");
	

}


if (isset($_POST['from']) and $_POST['from'] == 'profile') {

	mysqli_query($connection, "update customer_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "', lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "' ,birthday = '" . $_POST['birthday'] . "' ,status = '" . $_POST['status'] . "', address = '" . $_POST['address'] . "',emailaddress = '" . $_POST['emailaddress'] . "'  where customerid = '" . $_SESSION['customerid'] . "'");


	header("Location: profile.php?status=updated");

}


if (isset($_POST['from']) and $_POST['from'] == 'password') {

	mysqli_query($connection, "update customer_table set password = '" . md5($_POST['password']) . "' where customerid = '" . $_SESSION['customerid'] . "'");


	header("Location: profile.php?status=updated");

}



?>