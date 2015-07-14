<?php
ob_start();
//Change this to false to remove debug.
$debug = true;
//Change this to true to enable login.
$force_login = false;

//Set a per session cookie.
if (!isset($_SESSION)) {
    session_set_cookie_params(0, '/');
    session_start();
}

include 'model/database.php';
require_once('db/survey_db.php');
require_once('db/people_db.php');
require_once('db/question_db.php');
require_once('db/answer_db.php');
require_once('db/recorded_answer_db.php');
require_once('db/login_db.php');


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



//Log in user automatically if remembered
if (!isset($_SESSION['logged_in']) && isset($_COOKIE['remembered'])) {
    $email = is_remembered($_COOKIE['remembered']);
    if (!empty($email)) {
        $_SESSION['logged_in'] = $email;
        $login_message = 'Welcome, '.$_SESSION['logged_in'].'.';
        header('Location: index.php');
    } else {
        unset($_COOKIE['remembered']);
    }
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
            $login_message = 'The login information you entered is invalid.';
            header('Location: index.php');
        } else {
            $_SESSION['logged_in'] = $email;
            if (isset($_POST['remember_me'])) {
                $cookie_val = openssl_random_pseudo_bytes(60);
                setcookie('remembered', $cookie_val, time() + (86400 * 365), "/"); // gives cookie one year shelf-life
                set_remember_me($email, $cookie_val);
                $login_message = "We'll remember you, '.$email.'. Promise.";
            } else {
                $login_message = 'Welcome, '.$_SESSION['logged_in'].'.';
            }
            header('Location: index.php');
        } 
        break;
	case 'need_log_in':
		include 'view/log_in.php';
		break;
    case 'logout':
        if (isset($_COOKIE['remembered']) {
            unset($_COOKIE['remembered']);
            unset_remember_me($_SESSION['logged_in']); 
        }            
        unset($_SESSION['logged_in']);
        $login_message = 'Successfully logged out.';
        header('Location: index.php');
		break;
    case 'create_form':
        //Here we're checking if the user is logged in and if the
        // login toggle isn't turned off.
        if (!isset($_SESSION["logged_in"]) && $force_login)
        {   include 'view/log_in.php';
        } else {
            include 'db/create_form_db.php';
            if (isset($survey_id)) {
                $survey = get_survey($survey_id);
                $questions = get_questions($survey_id);
                $question_ids = get_question_ids_per_survey($survey_id);
                $answers = get_answers();
                include ('./view/survey_take.php');
            } else {
                include('./view/create_form.php');
            }
        }
        break;
    case 'view_survey':
        if (!isset($_SESSION["logged_in"]) && $force_login)
        {   include 'view/log_in.php';
        } else {
            // Get survey data
            $surveys = get_surveys();
            // Display the survey list
            include 'view/survey_list.php';
        }
        break;
    case 'take_survey':
        if (isset($_POST['submit'])){
            include 'db/take_survey_db.php';
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
