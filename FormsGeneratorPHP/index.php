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
        include "statistics/index.php";
        break;
    default;
        include "view/default.php";
        break;
}
include 'view/footer.php';