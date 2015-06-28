<?php

function is_valid_admin($username, $password) {
	global $db;
	$query = "SELECT * FROM administrators
			WHERE username = :username
			AND password = :password";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $valid;
}