<?php

if(isset($_POST['survey'])) {

    $questions = get_question_ids_per_survey($_POST['survey']);

    $now = date("Y-m-d H:i:s");


    if (array_filter($questions)) {
        foreach ($questions as $q) {
            $key = "question_".$q['id'];

            $sql = "INSERT INTO recorded_answers (user_id, answer_id, survey_id, created_at)
                    VALUES ('".$_POST['user_id']."', '" . $_POST[$key] . "', '" . $_POST['survey'] . "', '".$now."')";

            if ($db->query($sql)) {

            } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
            }
        }
    }

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    // TODO Make a real results page
    include './view/main.php';

} else {
    $surveys = get_surveys();
    include './view/survey_list.php';
}
