<?php
//Change this to false to remove debug.
$debug = false;

include 'model/database.php';
require('db/survey_db.php');
require('db/people_db.php');
require('db/question_db.php');
require('db/answer_db.php');


// Get the action to perform
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (!empty($_POST)) {
    $action = $_POST;
} else {
    $action = 'none';
}

// Get the selected navigaion to perform
if (isset($_POST['nav'])) {
    $nav = $_POST['nav'];
} else if (isset($_GET['nav'])) {
    $nav = $_GET['nav'];
} else {
    $nav = 'nav';
}

//Set a per session cookie.
if (!isset($_SESSION)) {
    session_set_cookie_params(0, '/');
    session_start();
}

// Show the views.
include 'view/header.php';
if ($debug) { include 'view/debug.php'; }

switch ($nav) {
    case 'nav':
        include 'view/main.php';
        break;
    case 'create_form':
        include 'view/create_form.php';
        break;
    case 'view_survey':
        // Get survey data
		$surveys = get_surveys();
        // Display the survey list
        include('view/survey_list.php');
        break;
    case 'view_statistics':
        include 'statistics/pseudoindex.php';
        break;

	case 'create_user':
    $errors = array();
    $pattern = '/^[a-zA-Z]{1,25}$/';
	$countrypattern = '/^[a-zA-Z]{1,50}$/';
    $letterNumberPattern = '/^[a-zA-Z0-9\." "]{1,25}$/';

    if (empty($_POST['first_name'])) {
        $error = 'No first name was entered.';
        echo $error;
        include 'view/create_user.php';
        exit();
    } elseif (!empty($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        if (!preg_match($pattern, $first_name)) {
            echo "First Name is Invalid. Must be between 1-25 letters.";
            include 'view/create_user.php';
            exit();
        }else
            $first_name = $_POST['first_name'];
    }
	
	if (empty($_POST['last_name'])) {
        $error = 'No last name was entered.';
        echo $error;
        include 'view/create_user.php';
        exit();
    } elseif (!empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
        if (!preg_match($pattern, $last_name)) {
            echo "Last Name is Invalid. Must be between 1-25 letters.";
            include 'view/create_user.php';
            exit();
        }else
            $last_name = $_POST['last_name'];
    }
	 if (empty($_POST['email'])) {
        echo 'No email address was entered.';
        include 'view/create_user.php.php';
        exit();
    } elseif (!empty($_POST['email'])) {
        $email_pattern =  "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
        if (!preg_match($email_pattern, $_POST['email'])) {
            echo "Email is invalid. Must be between 1-25 characters and be in format name@domain.com.";
            include 'view/create_user.php';
            exit();
        }else
            $email = $_POST['email'];
    }
	
	if (empty($_POST['city'])) {
        echo 'No city was entered.';
        include 'view/create_user.php';
        exit();
    } elseif (!empty($_POST['city'])) {
        $city = $_POST['city'];
        if (!preg_match($pattern, $city)) {
            echo "City is invalid. Must be between 1-25 letters.";
            include 'view/create_user.php';
            exit();
        }else
            $city = $_POST['city'];
    }

    if (empty($_POST['state'])) {
        echo 'No state was entered.';
        include 'view/create_user.php';
        exit();
    } elseif (!empty($_POST['state'])) {
        $state = $_POST['state'];
        $state_pattern = '/^[A-Z]{2}$/';
        if (!preg_match($state_pattern, $state)) {
            echo "State is invalid. Must be uppercase 2 letter state abbreviation (ex. GA, OH, et. al.).";
            include 'view/create_user.php';
            exit();
        }else
            $state = $_POST['state'];
    }
	if (empty($_POST['country'])) {
        echo 'No country was entered.';
        include 'view/create_user.php';
        exit();
    } elseif (!empty($_POST['country'])) {
        $country = $_POST['country'];
        if (!preg_match($countrypattern, $country)) {
            echo "Country is invalid. Must be between 1-50 letters.";
            include 'view/create_user.php';
            exit();
        }else
            $country = $_POST['country'];
    }
		$sex = $_POST['sex'];
		
		add_person($first_name, $last_name, $email, $city, $state, $country, $sex);
        include 'view/create_user.php';
        break;

	case 'detailed_survey':
        $id = $_POST['id'];
        $survey = get_survey($id);
        $questions = get_questions($id);
        $question_ids = get_question_ids_per_survey($id);
        $answers = get_answers();
        include 'view/survey_detailed.php';
		break;
    default;
        include "view/main.php";
        break;
}
include 'view/footer.php';
