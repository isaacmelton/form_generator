<?php

function get_answers() {
	global $db;
	$query = 'SELECT * FROM answers
	ORDER BY question_id';
	$surveys = $db->query($query);
	return $surveys;
}

function get_answers_by_id($question_id) {
    global $db;
    $query = "SELECT * FROM answers
              WHERE question_id = :question_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':question_id', $question_id);
    $statement->execute();
    $answers = $statement->fetchAll();
    $statement->closeCursor();
    return $answers;
	}
	
?>