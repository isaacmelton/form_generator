<?php

/*
function add_person($first_name, $last_name, $email, $city, $state, $country, $sex) {
    global $db;
    $query =
        "INSERT INTO people
            (first_name, last_name, email, city, state, country, sex)
        VALUES (
               '$first_name', '$last_name', '$email',
               '$city', '$state', '$country', '$sex')";
    $db->exec($query);
}
*/

function add_person($first_name, $last_name, $email, $city, $state, $country, $sex) {
    global $db;
    $query =
        "INSERT INTO people
            (first_name, last_name, email, city, state, country, sex)
        VALUES (
               :first_name, :last_name, :email,
               :city, :state, :country, :sex)";
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':sex', $sex);
    $statement->execute();
    $person = $statement->$fetch();
    $statement->closeCursor();
    return $person;
}

function get_person_by_email($email) {
    global $db;
    $query = "SELECT * FROM people
              WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $person = $statement->fetch();
    $statement->closeCursor();
    return $person;
	}
	

?>