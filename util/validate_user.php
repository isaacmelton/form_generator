<?php

$errors = array();
$pattern = '/^[a-zA-Z]{1,25}$/';
$countrypattern = '/^[a-zA-Z]{1,50}$/';
$letterNumberPattern = '/^[a-zA-Z0-9\." "]{1,25}$/';

if(isset($_POST['submit'])) {
    if (empty($_POST['first_name'])) {
        $error = 'No first name was entered.';
        array_push($errors, $error);
    } elseif (!empty($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        if (!preg_match($pattern, $first_name)) {
            $error = "First Name is Invalid. Must be between 1-25 letters.";
            array_push($errors, $error);
        }else
            $first_name = $_POST['first_name'];
    }

     if (empty($_POST['last_name'])) {
        $error = 'No last name was entered.';
        array_push($errors, $error);
    } elseif (!empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
        if (!preg_match($pattern, $last_name)) {
            $error = "Last Name is Invalid. Must be between 1-25 letters.";
            array_push($errors, $error);
        }else
            $last_name = $_POST['last_name'];
    }

     if (empty($_POST['email'])) {
        $error = 'No email address was entered.';
        array_push($errors, $error);

    } elseif (!empty($_POST['email'])) {
        $email_pattern =  "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
        if (!preg_match($email_pattern, $_POST['email'])) {
            $error =  "Email is invalid. Must be between 1-25 characters and be in format name@domain.com.";
            array_push($errors, $error);
        } elseif (!empty(get_person_by_email($_POST['email']))) {
            $error = "This email address has already been used.";
            array_push($errors, $error);
        } else {
            $email = $_POST['email'];
        }
    }

    if (empty($_POST['password'])) {
        $error = 'No password was entered.';
        array_push($errors, $error);
    } elseif (empty($_POST['verify_password'])) {
        $error = 'The password entered was not repeated for confirmation.';
        array_push($errors, $error);
    }

     if (!empty($_POST['password']) && !empty($_POST['verify_password'])) {
// any additional password checking can be done here.
        if ($_POST['password'] != $_POST['verify_password']) {
            $error =  "The passwords entered do not match.";
            array_push($errors, $error);
        } else
            $password = $_POST['password'];
        }


     if (empty($_POST['city'])) {
        $error = 'No city was entered.';
        array_push($errors, $error);
    } elseif (!empty($_POST['city'])) {
        $city = $_POST['city'];
        if (!preg_match($pattern, $city)) {
            $error = "City is invalid. Must be between 1-25 letters.";
            array_push($errors, $error);
        }else
            $city = $_POST['city'];
    }

     if (empty($_POST['state']) && ($_POST['country'] == 'US')) {
        $error = 'No state was entered.';
        array_push($errors, $error);
    } elseif (empty($_POST['state']) && ($_POST['country'] != 'US')){
		$state = null;
	}
		elseif (!empty($_POST['state'])) {
        $state = $_POST['state'];
        $state_pattern = '/^[A-Z]{2}$/';
        if (!preg_match($state_pattern, $state)) {
            $error = "State is invalid. Must be uppercase 2 letter state abbreviation (ex. GA, OH, et. al.).";
            array_push($errors, $error);
        }else
            $state = $_POST['state'];
    }
    if (empty($_POST['country'])) {
        $error = 'No country was entered.';
        array_push($errors, $error);
    } elseif (!empty($_POST['country'])) {
        $country = $_POST['country'];
        if (!preg_match($countrypattern, $country)) {
            $error = "Country is invalid. Must be between 1-50 letters.";
            array_push($errors, $error);
        } else {
            $country = $_POST['country'];
    }

    if (empty($_POST['sex'])) {
        $error = "No gender set.";
        array_push($errors, $error);
    } else {
        $sex = $_POST['sex'];
    }

    if (!array_filter($errors)) {
        add_person($first_name, $last_name, $email, $city, $state, $country, $sex);
        create_user($email, $password);
        $notice = $first_name." has been entered into the system";
		}
}
}