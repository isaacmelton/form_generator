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
    case 'create':
        include 'view/create_form.php';
        break;
    case 'view_survey':
        include 'db/survey/read_survey.php';
        break;
    case 'view_statistics':
<<<<<<< HEAD
        include "statistics/pseudoindex.php";
=======
        include "statistics/index.php";
        break;
>>>>>>> 951263dfa9109f0245ce29bd6a352e16dd4f6171
    default;
        include "view/main.php";
        break;
}
include 'view/footer.php';
