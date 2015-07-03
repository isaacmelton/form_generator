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
    ORDER BY question_id";
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

/**
function get_question_stats_by_author_id($author_id) {
    global $db;
    $query =
    "SELECT surveys.title AS title,
    CONCAT(people.first_name, ' ', people.last_name) AS name,
    people.email AS email,
    questions.question AS question,
    answers.answer AS answer,
    COUNT(answer_id) AS choice_count,
    tottable.total AS total
    FROM recorded_answers
    INNER JOIN answers
    ON answer_id = answers.id
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
    WHERE people.id = :author_id
    GROUP BY answer_id, answers.question_id"
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
} **/

?>
