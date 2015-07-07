<?php

function get_questions($survey_id) {
    global $db;
    $query = "SELECT * FROM questions
              WHERE survey_id = :survey_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':survey_id', $survey_id);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;
	}
	
function get_question_ids_per_survey($survey_id) {
    global $db;
    $query = "SELECT id FROM questions
              WHERE survey_id = :survey_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':survey_id', $survey_id);
    $statement->execute();
    $question_ids = $statement->fetchAll();
    $statement->closeCursor();
    return $question_ids;
	}
	
?>