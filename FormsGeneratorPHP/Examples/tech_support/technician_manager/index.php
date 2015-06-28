<?php
require('../model/database.php');
require('../model/technician_db.php');
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
    $action = 'list_technicians';
}

switch ($action) {
	case 'list_technicians':
    	// Get technician data
    	$technicians = get_technicians();
    
    	// Display the technician list
    	include('technician_list.php');
    	break;
	case 'delete_technician':
		$tech_id = $_POST['tech_id'];
    	delete_technician($tech_id);
    	header("Location: .");
    	break;
	case 'show_add_form':
    	include('technician_add.php');
    	break;
	case 'add_technician':
    	$first_name = $_POST['first_name'];
    	$last_name = $_POST['last_name'];
    	$email = $_POST['email'];
    	$phone = $_POST['phone'];
    	$password = $_POST['password'];

    	// Validate the inputs
    	if (empty($first_name) || empty($last_name) ||
        	empty($email) || empty($phone) || empty($password)) {
            	$error = "Invalid technician data. Check all fields and try again.";
            	include('../errors/error.php');
    	} else {
        	add_technician($first_name, $last_name, $email, $phone, $password);
        	header("Location: .");
    	}
		break;
}
?>