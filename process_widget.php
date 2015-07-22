<?php

include 'model/database.php';
require_once('db/survey_db.php');
require_once('db/people_db.php');
require_once('db/question_db.php');
require_once('db/answer_db.php');

if (isset($_POST['submit'])) {
echo 'made it to line 10: '.$_POST['submit'].'<br />';
    $questions = get_question_ids_per_survey($_POST['survey']);
    $now = date("Y-m-d H:i:s");
    $result_data = array();
    $question_ids = array();
    $answer_ids = array();
    $result_data['survey_id'] = $_POST['survey'];

    if (array_filter($questions)) {

        $count = 0;
        foreach ($questions as $q) {
echo 'made it to line 22: '.var_dump($q).'<br />';
            $key = "question_" . $q['id'];
            $question_ids[$count] = $q['id'];
            $answer_ids[$count] = $_POST[$key];
            $query = "INSERT INTO recorded_answers ( user_id, answer_id, survey_id, created_at )
                      VALUES  ( :user_id, :answer_id, :survey_id, :now )";
            $statement = $db->prepare($query);
            if (isset($_POST['user_id'])) {
                $statement->bindValue(':user_id', $_POST['user_id']);
            } else {
                $statement->bindValue(':user_id', null);
            }
            $statement->bindValue(':answer_id', $_POST[$key]);
            $statement->bindValue(':survey_id', $_POST['survey']);
            $statement->bindValue(':now', $now);
echo 'made it to line 37: '.var_dump($statement).'<br />';
            if ($statement->execute()) {

            } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
            }
            $count++;
        }
    }

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//echo 'this should be here:'. var_dump($statement);


?>


