<?php

function get_surveys() {
    global $db;
    $query =
    "SELECT *
    FROM surveys
    ORDER BY title";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_authors() {
    global $db;
    $query =
    "SELECT people.id AS id, email
    FROM people
    INNER JOIN surveys
    ON people.id = surveys.person_id
    ORDER BY email";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_surveys_by_author($author_id) {
  global $db;
  $query =
  "SELECT *
  FROM surveys
  WHERE person_id = :author_id
  ORDER BY title";
  try {
      $statement = $db->prepare($query);
      $statement->bindValue(':author_id', $author_id);
      $statement->execute();
      $result = $statement->fetchAll();
      $statement->closeCursor();
      return $result;
  } catch (PDOException $e) {
      display_db_error($e->getMessage());
  }
} 


function get_survey_stats_by_id($survey_id) {
    global $db;
    $query =
    "SELECT surveys.title AS title,
    CONCAT(people.first_name, ' ', people.last_name) AS name,
    people.email AS email,
    questions.question AS question,
    answers.answer AS answer,
    COUNT(answer_id) AS choice_count,
    tottable.total AS total,
    questions.id AS question_id,
    questions.sequence AS qorder,
    answers.sequence AS aorder,
    answers.id AS answer_id
    FROM answers
    LEFT JOIN recorded_answers
    ON answers.id = recorded_answers.answer_id
    LEFT JOIN (SELECT answers.question_id AS question_id,
               COUNT(answer_id) AS total
               FROM recorded_answers
               INNER JOIN answers
               ON answer_id = answers.id
               GROUP BY answers.question_id) AS tottable
    ON answers.question_id = tottable.question_id
    INNER JOIN questions
    ON answers.question_id = questions.id
    INNER JOIN surveys
    ON questions.survey_id = surveys.id
    INNER JOIN people
    ON surveys.person_id = people.id
    WHERE surveys.id = :survey_id
    GROUP BY answer_id, answers.question_id
    ORDER BY qorder ASC, aorder ASC";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':survey_id', $survey_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}


// THE FOLLOWING GET USED FOR AJAX AND JSON
function get_answers_for_question($survey_id, $question_id) {
    global $db;
    $query =
    "SELECT answers.answer AS answer,
    COUNT(answer_id) AS choice_count,
    questions.id AS question_id,
    answers.sequence AS aorder,
    answers.id AS answer_id
    FROM answers
    LEFT JOIN recorded_answers
    ON answers.id = recorded_answers.answer_id
    INNER JOIN questions
    ON answers.question_id = questions.id
    INNER JOIN surveys
    ON questions.survey_id = surveys.id
    WHERE surveys.id = :survey_id
    AND questions.id = :question_id
    GROUP BY answer_id, answers.question_id
    ORDER BY aorder ASC";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':survey_id', $survey_id);
        $statement->bindValue(':question_id', $question_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_questions_for_survey($survey_id) {
    global $db;
    $query =
    "SELECT survey_id,
    questions.id AS question_id,
    questions.question AS question,
    questions.sequence AS qorder
    FROM questions
    WHERE survey_id = :survey_id
    ORDER BY qorder ASC"; 
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':survey_id', $survey_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}


?>

