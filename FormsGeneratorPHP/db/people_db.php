<?php
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
?>