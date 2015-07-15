<?php

//TODO change to prepared statement
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