<?php
function add_incident($customer_id, $product_code, $title, $description) {
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        "INSERT INTO incidents
            (customerID, productCode, dateOpened, title, description)
        VALUES (
               '$customer_id', '$product_code', '$date_opened',
               '$title', '$description')";
    $db->exec($query);
}

function get_incident($incidentID) {
	global $db;
	$query = "SELECT * FROM incidents
			WHERE incidentID = :incidentID";
	$statement = $db->prepare($query);
	$statement->bindValue(':incidentID', $incidentID);
	$statement->execute();
	$result = $statement->fetch();
	$statement->closeCursor();
	return $result;
}

function get_technican_open_incidents() {
	global $db;
	$query = "SELECT techID, firstName, lastName,  
			( SELECT COUNT(*) FROM incidents
				WHERE incidents.techID = technicians.techID
				AND dateClosed IS NULL ) AS openIncidents
			FROM technicians";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$statement->closeCursor();
	return  $result;
}

function update_technician_to_incident($techID, $incidentID) {
	global $db;
	$query = "UPDATE incidents
			set techID = :techID
			WHERE incidentID = :incidentID";
	$statement = $db->prepare($query);
	$statement->bindValue(':techID', $techID);
	$statement->bindValue(':incidentID', $incidentID);
	$success = $statement->execute();
	return $success;	
}

function get_incidents() {
	global $db;
	$query = 'SELECT * FROM incidents i
			INNER JOIN customers c
			ON i.customerID = c.customerID
			WHERE i.techID is NULL
			ORDER BY i.dateOpened';
	$statement = $db->prepare($query);
	$statement->execute();
	$incidents = $statement->fetchAll();	
	return $incidents;
}

function get_assigned_display_incidents() {
	global $db;
	$query = "SELECT c.firstName AS customerFirstName, c.lastName AS customerLastName, p.name, t.firstName AS technicianFirstName, t.lastName AS technicianLastName, i.incidentID, i.dateOpened, i.dateClosed, i.title, i.description
			FROM incidents i
				INNER JOIN customers c
					ON i.customerID = c.customerID
				INNER JOIN products p
					ON i.productCode = p.productCode
				INNER JOIN technicians t
					ON i.techID = t.techID
			WHERE i.techID IS NOT NULL
			ORDER BY i.incidentID";
	$statement = $db->prepare($query);
	$statement->execute();
	$incidents = $statement->fetchAll();	
	return $incidents;
}

function get_unassigned_display_incidents() {
	global $db;
	$query = 'SELECT * FROM incidents
				INNER JOIN customers
					ON incidents.customerID = customers.customerID
				INNER JOIN products
					ON incidents.productCode = products.productCode
				WHERE incidents.techID IS NULL
				ORDER BY incidents.incidentID';
	$statement = $db->prepare($query);
	$statement->execute();
	$incidents = $statement->fetchAll();
	$statement->closeCursor();
	return $incidents;	
}

function get_open_incidents_by_technician($techID) {
	global $db;	
	$query = "SELECT * FROM incidents i			
			INNER JOIN customers c
			ON i.customerID = c.customerID
			WHERE i.techID = :techID
			AND i.dateClosed IS NULL			
			ORDER BY i.dateOpened";
	$statement = $db->prepare($query);
	$statement->bindValue('techID', $techID);
	$statement->execute();
	$incidents = $statement->fetchAll();
	$statement->closeCursor();
	return $incidents;
}

function update_incident_description($incidentID, $description) {
	global $db;
	$query = "UPDATE incidents
	SET description = :description
	WHERE incidentID = :incidentID";
	$statement = $db->prepare($query);
	$statement->bindValue(':description', $description);
	$statement->bindValue(':incidentID', $incidentID);
	$success = $statement->execute();
	$statement->closeCursor();
	return $success;
}

function update_incident_dateclosed_and_description($incidentID, $dateClosed, $description) {
	global $db;
	$query = "UPDATE incidents
	SET dateClosed = :dateClosed,
	description = :description
	WHERE incidentID = :incidentID";
	$statement = $db->prepare($query);
	$statement->bindValue(':dateClosed', $dateClosed);
	$statement->bindValue(':description', $description);
	$statement->bindValue(':incidentID', $incidentID);
	$success = $statement->execute();
	$statement->closeCursor();
	return $success;
}

?>