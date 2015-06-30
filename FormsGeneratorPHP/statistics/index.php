<?php 
require '../model/database.php';
require '../model/statistics_db.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'select_focus';
}

if ($action == 'select_focus') {
    $surveys = get_surveys();
    $authors = get_authors();
    include("choose_focus.php");    
} else if ($action == 'surveys') {
    $survey_id = $_POST['survey_id'];
    // Use of model methods to get data for this
    include("survey_stats.php");
} else if ($action == 'authors') {
    $author_id = $_POST['author_id'];
    // Use of model methods to get data for this
    include("author_stats.php");
} else if ($action == 'takers') {
    $taker_id = $_POST['taker_id'];
    // Use of model methods to get data for this
    include("taker_stats.php"); 
}
?>
