<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
require('../util/secure_conn.php');

//Set a per session cookie.
if (!isset($_SESSION)) {
	session_set_cookie_params(0, '/');
	session_start();
}

if (!isset($_SESSION['technician'])) {
	$_SESSION['technician'] = array();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_SESSION['technician']['email'])) {
	$action = 'technician_login';
} else {
    $action = 'technician_login';
}

if ($action == 'technician_login') {
	
	if(!isset($_SESSION['technician']['email'])) {
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		} else {
			$email = "";
		}
		include('technician_login.php');
	} else {
		$technician = get_technician_by_email($_SESSION['technician']['email']);
		$tech_incidents = get_open_incidents_by_technician($technician['techID']);
		include('select_incident.php');
	}

	
} else if ($action == 'get_technician') {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty($email)) {
		$error_message = "Please enter an email address.";
		include('technician_login.php');
		
	} else if (empty($password)) {
		$error_message = "Please enter a password.";
		include('technician_login.php');
		
	} else {
	
		$valid = is_valid_technician($email, $password);
			
		if (!$valid) {
			$error_message = "Invalid technician entered.";
			include('technician_login.php');
		} else {
			$technician = get_technician_by_email($email);
			$_SESSION['technician']['techID'] = $technician['techID'];
			$_SESSION['technician']['email'] = $technician['email'];		
			
			$tech_incidents = get_open_incidents_by_technician($technician['techID']);
			
			include('select_incident.php');
		}
	}
	
} else if ($action == 'update_incident') {
	
	$incidentID = $_POST['incidentID'];
	$date = date('Y-m-d');
	$success = false;
	
	if (empty($incidentID)) {
		$error = "There was an error getting the incident.";
		include('../errors/error.php');
	} else {
		$incident = get_incident($incidentID);
		include('update_incident.php');
	}
	
} else if ($action == 'submit_update') {
	
	$success = false;
	$incidentID = $_POST['incidentID'];
	$dateClosed = $_POST['dateClosed'];
	$description = $_POST['description'];	
	
	if (empty($incidentID)) {
		$error = "There was an error getting the incident.";
		include('../errors/error.php');
	} elseif (empty($description)) {
		$error = "Please enter a description of the incident.";
		$incident = get_incident($incidentID);
		include('update_incident.php');
	} else if (empty($dateClosed)) {
		$success = update_incident_description($incidentID, $description);
		include('update_incident.php');
	} else {
		$success = update_incident_dateclosed_and_description($incidentID, $dateClosed, $description);
		include('update_incident.php');
	}
	
} else if ($action == 'technician_logout') {
	$_SESSION['technician'] = array();
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