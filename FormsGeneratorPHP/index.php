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
    default;
        echo 'Default Nav. Change this in index.php';
        break;
}
include 'view/footer.php';