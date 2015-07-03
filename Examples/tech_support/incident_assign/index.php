<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
require('../model/customer_db.php');
require('../util/secure_conn.php');

//Set a per session cookie.
if (!isset($_SESSION)) {
	session_set_cookie_params(0, '/');
	session_start();
}

if (!isset($_SESSION['incident_assign'])) {
	$_SESSION['incident_assign'] = array();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'select_incident';
}

if ($action == 'select_incident') {
    
	// Get unassigned incidents.
    $incidents = get_incidents();
    
    // Display the product list
    include('incident_select.php'); 
    
} else if ($action == 'incident_assign') {
	
	//Save the selection to the session array
	$_SESSION['incident_assign']['incidentID'] = $_POST['incidentID'];
	
	//Get the technicians
	$technician_incidents = get_technican_open_incidents();
	
	// Display the select technician page
	include('technician_select.php');
	
} else if ($action == 'technician_assign') {
	
	//Save the selected technician to the session array
	$_SESSION['incident_assign']['techID'] = $_POST['techID'];
	
	//If the session data is not ready, show error.
	if (!isset($_SESSION['incident_assign']['incidentID']) || !isset($_SESSION['incident_assign']['techID'])) {
		$error = "There was a session error assigning the incident.";
		include('../errors/error.php');
	}	
	
	$incident = get_incident($_SESSION['incident_assign']['incidentID']);
	$customer = get_customer($incident['customerID']);
	$technician = get_technician($_SESSION['incident_assign']['techID']);
		
	//Display the assign incident page
	include('incident_assign.php');	
	
} else if ($action = 'incident_assignment_confirm') {
	
	$incident_id = $_SESSION['incident_assign']['incidentID'];
	$technician_id = $_SESSION['incident_assign']['techID'];
	
	//If the session data is not ready, show error.	
	if (empty($incident_id) || (empty($technician_id))) {
		$error = "There was a session error assigning the incident.";
		include('../errors/error.php');
	}
	
	$confirmed = update_technician_to_incident($technician_id, $incident_id);

	include('incident_assign.php');
	
}
?>