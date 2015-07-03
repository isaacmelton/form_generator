<?php
include 'model/database.php';

// Get the action to perform
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
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
switch ($nav) {
    case 'nav':
        include 'view/main.php';
        break;
    case 'create_survey':
        include 'view/create_form.php';
        break;
    case 'view_survey':
        include 'db/survey/read_survey.php';
        break;
    case 'view_statistics':
        include "statistics/pseudoindex.php";
        break;
	case 'create_user':
        include 'view/create_user.php';
        break;
    default;
        include "view/main.php";
        break;
}
include 'view/footer.php';
