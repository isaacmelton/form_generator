<?php 
if (strstr(getcwd(), "statistics") == true) {
    header('Location: ../index.php');
}

require './model/statistics_db.php';

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
    include("./statistics/choose_focus.php");
} else if ($action == 'surveys') {
    $survey_id = $_POST['survey_id'];
    $survey = get_survey_stats_by_id($survey_id);
    $questions = get_questions_for_survey($survey_id);
    include("./statistics/survey_stats.php");
} else if ($action == 'authors') {
    $author_id = $_POST['author_id'];
    $surveys = get_surveys_by_author($author_id);
    include("./statistics/author_stats.php");
} else if ($action == 'general') {
    include("./statistics/general_stats.php"); 
}
?>


