<?php

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
    $person = $statement->fetch();
    $statement->closeCursor();
    return $person;
}

/* Old method.
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
	
function states_list() {
	$states = array('AL'=>"Alabama",
					'AK'=>"Alaska",
					'AZ'=>"Arizona",
					'AR'=>"Arkansas",
					'CA'=>"California",
					'CO'=>"Colorado",
					'CT'=>"Connecticut",
					'DE'=>"Delaware",
					'DC'=>"District Of Columbia",
					'FL'=>"Florida",
					'GA'=>"Georgia",
					'HI'=>"Hawaii",
					'ID'=>"Idaho",
					'IL'=>"Illinois",
					'IN'=>"Indiana",
					'IA'=>"Iowa",
					'KS'=>"Kansas",
					'KY'=>"Kentucky",
					'LA'=>"Louisiana",
					'ME'=>"Maine",
					'MD'=>"Maryland",
					'MA'=>"Massachusetts",
					'MI'=>"Michigan",
					'MN'=>"Minnesota",
					'MS'=>"Mississippi",
					'MO'=>"Missouri",
					'MT'=>"Montana",
					'NE'=>"Nebraska",
					'NV'=>"Nevada",
					'NH'=>"New Hampshire",
					'NJ'=>"New Jersey",
					'NM'=>"New Mexico",
					'NY'=>"New York",
					'NC'=>"North Carolina",
					'ND'=>"North Dakota",
					'OH'=>"Ohio",
					'OK'=>"Oklahoma",
					'OR'=>"Oregon",
					'PA'=>"Pennsylvania",
					'RI'=>"Rhode Island",
					'SC'=>"South Carolina",
					'SD'=>"South Dakota",
					'TN'=>"Tennessee",
					'TX'=>"Texas",
					'UT'=>"Utah",
					'VT'=>"Vermont",
					'VA'=>"Virginia",
					'WA'=>"Washington",
					'WV'=>"West Virginia",
					'WI'=>"Wisconsin",
					'WY'=>"Wyoming");
	return $states;
}

?>
