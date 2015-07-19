<?php

/*
Recorded answers:
    id INT,
    user_id INT,
    answer_id INT,
    survey_id INT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
*/

if (isset($_POST['submit'])) {
    $questions = get_question_ids_per_survey($_POST['survey']);
    $now = date("Y-m-d H:i:s");
    $result_data = array();
    $question_ids = array();
    $answer_ids = array();
    $result_data['survey_id'] = $_POST['survey'];

    if (array_filter($questions)) {

        $count = 0;
        foreach ($questions as $q) {
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
?>


