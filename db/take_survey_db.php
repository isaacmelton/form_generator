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
    $questions = get_questions($survey_id);
    $answers = get_answers();
    $now = date("Y-m-d H:i:s");

    $sql = "INSERT INTO recorded_answers "
    //TODO Create survey
    $sql = "INSERT INTO surveys (person_id, title, active)
            VALUES ('1','".$_POST['survey_title']."','1')";  //TODO add user
    if ($db->query($sql)) {
        $survey_id = $db->lastInsertId();

        if (isset($questions)) {
            $sequence = 1;
            foreach ($questions as $question) {

                $sql = "INSERT INTO questions (sequence, question, survey_id, created_at)
                        VALUES ('".$sequence."', '".$question."', '".$survey_id."', '".$now."')";  //TODO
                if ($db->query($sql)) {
                    $question_id = $db->lastInsertId();

                    if (isset($answers[($sequence-1)])) {

                        $answer_sequence = 1;
                        foreach ($answers[($sequence-1)] as $answer) {
                            $sql = "INSERT INTO answers (sequence, answer, created_at, question_id)
                            VALUES ('".$answer_sequence."','".$answer."','".$now."','".$question_id."')";  //TODO
                            if ($db->query($sql)) {
                            } else {
                                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                            }
                            $answer_sequence++;
                        }
                    }
                } else {
                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                }
                $sequence++;
            }
        }
    } else {
        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
    }

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    */

}
?>


