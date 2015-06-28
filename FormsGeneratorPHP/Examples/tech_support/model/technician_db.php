<?php
function get_technicians() {
	global $db;
	$query = 'SELECT * FROM technicians
	ORDER BY lastName';
	$technicians = $db->query($query);
	return $technicians;
}

function delete_technician($tech_id) {
	global $db;
	$query = "DELETE FROM technicians
	WHERE techID = '$tech_id'";
	$db->exec($query);
}

function add_technician($first_name, $last_name, $email, $phone, $password) {
    global $db;
    $query = "INSERT INTO technicians
                 (firstName, lastName, email, phone, password)
              VALUES
                 ('$first_name', '$last_name', '$email', '$phone', '$password')";
    $db->exec($query);
}

function get_technician($techID) {
	global $db;
	$query = "SELECT * FROM technicians
			WHERE techID = :techID";
	$statement = $db->prepare($query);
	$statement->bindValue(':techID', $techID);
	$statement->execute();
	$result = $statement->fetch();
	$statement->closeCursor();
	return $result;
}

function  get_technician_by_email($email) {
	global $db;
	$query = "SELECT * FROM technicians
	WHERE email = :email";
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->execute();
	$result = $statement->fetch();
	return $result;
}

function is_valid_technician($email, $password) {
	global $db;
	$query = "SELECT * FROM technicians
			WHERE email = :email
			AND password = :password";
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $valid;
}

?>