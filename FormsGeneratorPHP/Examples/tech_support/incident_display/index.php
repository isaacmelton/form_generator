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

if (!isset($_SESSION['incident_display'])) {
	$_SESSION['incident_display'] = array();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'display_unassigned';
}

if ($action == 'display_unassigned') {
	$unassigned_incidents = get_unassigned_display_incidents();
	include('unassigned_incidents.php');
} else if ($action == 'display_assigned') {
	$assigned_incidents = get_assigned_display_incidents();
	include('assigned_incidents.php');
}