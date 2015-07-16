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

function get_question_by_id($id) {
    global $db;
    $query = "SELECT * FROM questions
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $question = $statement->fetch();
    $statement->closeCursor();
    return $question;
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