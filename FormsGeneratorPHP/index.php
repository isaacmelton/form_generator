<?php
include 'model/database.php';

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
        echo '<div id="main">';
        echo '<h2>The new and improved Forms Generator</h2>';
        include 'db/answer/read_answer.php';
        echo '</div>';
        break;
    case 'create':
        include 'view/create_form.php';
        break;
    case 'view_survey':
        include 'db/survey/read_survey.php';
        break;
    case 'view_statistics':
        include "statistics/pseudoindex.php";
    default;
        echo '<h1>This is the default page. Check index.php</h1>';
        break;
}
include 'view/footer.php';
