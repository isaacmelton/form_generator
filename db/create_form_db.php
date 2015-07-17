<?php

if(isset($_POST['submit'])) {

    $surveyTitle = $_POST['survey_title'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];
    $now = date("Y-m-d H:i:s");
	$person_id = $_POST['person_id'];

    $query = "INSERT INTO surveys (person_id, title, active, created_at)
              VALUES (:person_id, :survey_title, '1', :now)";
    $statement = $db->prepare($query);
    $statement->bindValue(':person_id', $_POST['person_id']);
    $statement->bindValue(':survey_title', $_POST['survey_title']);
    $statement->bindValue(':now', $now);
    if($statement->execute()) {
        $survey_id = $db->lastInsertId();
        $statement->closeCursor();

        if (isset($questions)) {
            $sequence = 1;
            foreach ($questions as $question) {

                $query = "INSERT INTO questions (sequence, question, survey_id, created_at)
                          VALUES (:sequence, :question, :survey_id, :now)";
                $statement = $db->prepare($query);
                $statement->bindValue(':sequence', $sequence);
                $statement->bindValue(':question', $question);
                $statement->bindValue(':survey_id', $survey_id);
                $statement->bindValue(':now', $now);
                if ($statement->execute()) {
                    $question_id = $db->lastInsertId();
                    $statement->closeCursor();

                    if (isset($answers[($sequence-1)])) {
                        $answer_sequence = 1;
                        foreach ($answers[($sequence-1)] as $answer) {

                            $query = "INSERT INTO answers(sequence, answer, created_at, question_id)
                                      VALUES (:answer_sequence, :answer, :now, :question_id)";
                            $statement = $db->prepare($query);
                            $statement->bindValue(':answer_sequence', $answer_sequence);
                            $statement->bindValue(':answer', $answer);
                            $statement->bindValue(':now', $now);
                            $statement->bindValue(':question_id', $question_id);
                            if ($statement->execute()) {
                                $statement->closeCursor();
                            } else {
                                echo "<script type= 'text/javascript'>alert('Answers not successfully Inserted.');</script>";
                            }
                            $answer_sequence++;
                        }
                    }
                } else {
                    echo "<script type= 'text/javascript'>alert('Questions not successfully Inserted.');</script>";
                }
                $sequence++;
            }
        }
    } else {
        echo "<script type= 'text/javascript'>alert('Survey not successfully Inserted.');</script>";
    }

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>


