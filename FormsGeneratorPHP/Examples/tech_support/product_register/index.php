<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');
require('../util/secure_conn.php');

if (!isset($_SESSION)) {
	session_set_cookie_params(0, '/');
	session_start();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login_customer';
}

if ($action == 'login_customer') {
	
	if(!isset($_SESSION['customer']['email'])) {
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		} else {
			$email = "";
		}
		include('customer_login.php');
	} else {
		$customer = get_customer_by_email($_SESSION['customer']['email']);
		$products = get_products();
		include('product_register.php');
	}
    
} else if ($action == 'get_customer') {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty($email)) {
		$error_message = "Please enter an email address.";
		include('customer_login.php');
	
	} else if (empty($password)) {
		$error_message = "Please enter a password.";
		include('customer_login.php');
	
	} else {
	
		$valid = is_valid_customer($email, $password);
			
		if (!$valid) {
			$error_message = "Invalid customer entered.";
			include('customer_login.php');
		} else {
			$customer = get_customer_by_email($email);			
			$_SESSION['customer']['customerID'] = $customer['customerID'];
			$_SESSION['customer']['email'] = $customer['email'];
			$products = get_products();
			
			include('product_register.php');
		}
	}
	    
} else if ($action == 'register_product') {
    $customer_id = $_POST['customer_id'];
    $product_code = $_POST['product_code'];
    add_registration($customer_id, $product_code);
    $message = "Product ($product_code) was registered successfully.";
    include('product_register.php');
    
} else if ($action == 'customer_logout') {
	
	$_SESSION['customer'] = array();
	session_destroy();
	$login_message = "You have been logged out.";
	$uri = $_SERVER['REQUEST_URI'];
	$dirs = explode('/', $uri);
	$i = 1;
	$path = '/';
	while ($dirs[$i] != "tech_support") {
		$path .= $dirs[$i] . '/';
		$i += 1;
	}
	$path .= 'tech_support/';
	header("Location: http://".$_SERVER['HTTP_HOST'].$path);	
}
?>