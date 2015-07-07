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
	
?>