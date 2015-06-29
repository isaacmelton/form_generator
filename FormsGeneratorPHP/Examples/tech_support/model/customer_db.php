<?php

function get_customers_by_last_name($last_name) {
    global $db;
    $query = "SELECT * FROM customers
              WHERE lastName = '$last_name'
              ORDER BY lastName";
    $customers = $db->query($query);
    return $customers;
}

function get_customer($customer_id) {
    global $db;
    $query = "SELECT * FROM customers
              WHERE customerID = :customer_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function get_customer_by_email($email) {
	global $db;
	$query = "SELECT * FROM customers
			WHERE email = :email";
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->execute();
	$customer = $statement->fetch();
	$statement->closeCursor();
	return $customer;
}

function update_customer($customer_id, $first_name, $last_name,
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    global $db;
    $query = "UPDATE customers
              SET firstName = '$first_name',
                  lastName = '$last_name',
                  address = '$address',
                  city = '$city',
                  state = '$state',
                  postalCode = '$postal_code',
                  countryCode = '$country_code',
                  phone = '$phone',
                  email = '$email',
                  password = '$password'
              WHERE customerID = '$customer_id'";
    $db->exec($query);
}

function is_valid_customer($email, $password) {
	global $db;
	$query = "SELECT * FROM customers
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