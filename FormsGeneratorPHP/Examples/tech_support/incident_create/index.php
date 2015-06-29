<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
require('../util/secure_conn.php');

//Set a per session cookie.
if (!isset($_SESSION)) {
	session_set_cookie_params(0, '/');
	session_start();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'display_customer_get';
}

if ($action == 'display_customer_get') {
	if (!isset($email)) {
		$email = "";
	}
    include('customer_get.php');
} else if ($action == 'get_customer') {
    $email = $_POST['email'];
    $customer = get_customer_by_email($email);
    $products = get_products_by_customer($email);
    include('incident_create.php');
} else if ($action == 'create_incident') {
    $customer_id = $_POST['customer_id'];
    $product_code = $_POST['product_code'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    add_incident($customer_id, $product_code, $title, $description);
    $message = "This incident was added to our database.";
    include('incident_create.php');
}
?>