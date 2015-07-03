<?php
require('../model/database.php');
require('../model/admin_db.php');
require('../util/secure_conn.php');

//Set a per session cookie.
if (!isset($_SESSION)) {
	session_set_cookie_params(0, '/');
	session_start();
}

if (!isset($_SESSION['admin'])) {
	$_SESSION['admin'] = array();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_SESSION['admin'])) {
	$action = 'get_admin';
} else {
    $action = 'get_admin';
}

if ($action == 'get_admin') {
	
	if(!isset($_SESSION['admin']['adminUsername'])) {
		include('admin_login.php');
	} else {
		include('admin_menu.php');
	}
} else if ($action == 'admin_login') {
	
	$adminUsername = $_POST['username'];
	$adminPassword = $_POST['password'];
	
	if (empty($adminUsername)) {
		$login_message = "Please enter a username.";
		include('admin_login.php');
	} elseif (empty($adminPassword)) {
		$login_message = "Please enter a password.";
		include('admin_login.php');
	} else {
		$valid = is_valid_admin($adminUsername, $adminPassword);
		if ($valid) {
			$_SESSION['admin']['adminUsername'] = $adminUsername;
			include('admin_menu.php');
		} else {
			$login_message = "Invalid login credentials. Please try again.";
			include('admin_login.php');
		}		
	}
} else if ($action == 'admin_logout') {
	$_SESSION['admin'] = array();
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

