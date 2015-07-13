<?php
//Change this to false to remove debug.
$debug = false;

include 'model/database.php';
require('db/survey_db.php');
require('db/people_db.php');
require('db/question_db.php');
require('db/answer_db.php');
require('db/login_db.php');


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
    case 'login':
        if (!isset($_POST['email'])) {
            $email = "";
        } else {
            $email = $_POST['email'];
        }
        if (!isset($_POST['password'])) {
            $password = "";
        } else {
            $password = $_POST['password'];
        }
        $is_valid_password = confirm_password($email, $password);
        if (!$is_valid_password) {
            echo 'login is: '.$email.'... ';
            echo 'password is: '.$password.'... ';
            echo 'is total failure; not logged in.';
            echo '... encrypting password.';
            echo encrypt($email, $password);
//            include('index.php');
//        } elseif ((empty($admin) || empty($is_valid_password)) && !isset($_POST['has_tried_before'])) {
//            $message = 'Please enter your login information.';
//            include('admin_login.php');
//        } elseif ((empty($admin) || empty($is_valid_password)) && isset($_POST['has_tried_before'])) {
//            $message = 'The login information you entered was incorrect.  Please try again.';
//            include('admin_login.php');
        } else {
            $_SESSION['logged_in'] = $email;
//            include('index.php');
            echo 'logged in as '.$_SESSION['logged_in'];
        } 
        break;
    case 'logout':
        unset($_SESSION['logged_in']);
        $message = 'Successfully logged out.';
        include('index.php');
    case 'create_form':
        include 'view/create_form.php';
        break;
    case 'view_survey':
        // Get survey data
		$surveys = get_surveys();
        // Display the survey list
        include 'view/survey_list.php';
        break;
    case 'take_survey':
        if (isset($_POST['submit'])){
            include 'view/survey_results.php';
        } else {
            include 'view/main.php';
        }
        break;
    case 'view_statistics':
        include 'statistics/index.php';
        break;
    case 'create_user':
        include 'util/validate_user.php';
        include 'view/create_user.php';
        break;
    case 'detailed_survey':
        $id = $_POST['id'];
        $survey = get_survey($id);
        $questions = get_questions($id);
        $question_ids = get_question_ids_per_survey($id);
        $answers = get_answers();
        //include 'view/survey_detailed.php';
        include 'view/survey_take.php';
	break;
    default;
        include "view/main.php";
        break;
}
include 'view/footer.php';

?>
