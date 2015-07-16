<?php

if(isset($_POST['submit'])) {

    /*
    Recorded answers:
        id INT,
        user_id INT,
        answer_id INT,
        survey_id INT,
        created_at TIMESTAMP,
        updated_at TIMESTAMP
    */

    $survey_id = $_POST['survey'];
	$user_id = $_POST['user_id'];
    $answers = get_answers_by_id($survey_id);
    $questions = get_question_ids_per_survey($survey_id);
    $now = date("Y-m-d H:i:s");

    foreach ($questions as $question) {
        $question_tag = "question_".$question['id'];
        //echo $question_tag;
        //echo $_POST[$question_tag];
        if (isset($_POST[$question_tag])) {
            //TODO add user id
            $sql = "INSERT INTO recorded_answers ( user_id, answer_id, survey_id, created_at )
            VALUES ('".$user_id."','".str_replace('question_', '', $_POST[$question_tag])."','".$survey_id."', '".$now."')";

            if ($db->query($sql)) {
                $survey_result_id = $db->lastInsertId();
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

}
?>


