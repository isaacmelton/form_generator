<?php
//Change this to false to remove debug.
$debug = true;

include 'model/database.php';
require('db/survey_db.php');
require('db/people_db.php');
require('db/question_db.php');


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
        include 'view/create_user.php';
        break;
	case 'detailed_survey':
        $id = $_POST['id'];
        $survey = get_survey($id);
        $questions = get_questions($id);
        include 'view/survey_detailed.php';
		break;
	
    default;
        include "view/main.php";
        break;
}
include 'view/footer.php';
