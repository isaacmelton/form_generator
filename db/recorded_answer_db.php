<?php

function get_all_recorded_answers() {
	global $db;
	$query = 'SELECT * FROM recorded_answers';
	$statement = $db->prepare($query);
	$statement->execute();
	$recorded_answers = $statement->fetchAll();
	$statement->closeCursor();
	return $recorded_answers;
}

function get_recorded_answers_by_answer_id($answer_id) {
    global $db;
    $query = "SELECT * FROM recorded_answers
              WHERE answer_id = :answer_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':answer_id', $answer_id);
    $statement->execute();
    $recorded_answers = $statement->fetchAll();
    $statement->closeCursor();
    return $recorded_answers;
	}
	
	
function get_recorded_answers_by_user_id($user_id) {
    global $db;
    $query = "SELECT * FROM recorded_answers
              WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $recorded_answers = $statement->fetchAll();
    $statement->closeCursor();
    return $recorded_answers;
	}
	
function get_recorded_answers_by_survey_id($survey_id) {
    global $db;
    $query = "SELECT * FROM recorded_answers
              WHERE survey_id = :survey_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':survey_id', $survey_id);
    $statement->execute();
    $recorded_answers = $statement->fetchAll();
    $statement->closeCursor();
    return $recorded_answers;
	}
	
	
function get_recorded_answer($id) {
    global $db;
    $query = "SELECT * FROM recorded_answers
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $recorded_answer = $statement->fetch();
    $statement->closeCursor();
    return $recorded_answer;
	}
	
	
	
?>
