<?php

// The following functions are used by choose_focus.php
function get_surveys_by_title() {
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
    GROUP BY email
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


// This function is used by survey_stats.php
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

// for author.php
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

function get_surveys_taker_count_by_author($author_id) {
    global $db;
    $query =
    "SELECT s.id AS sid, 
    s.title AS title,
    p.id AS author_id,
    p.email AS email,
    COUNT(ra.id) AS takers
    FROM surveys AS s
    INNER JOIN people AS p
    ON s.person_id = p.id
    INNER JOIN questions AS q
    ON s.id = q.survey_id
    INNER JOIN answers AS a
    ON q.id = a.question_id
    INNER JOIN recorded_answers AS ra
    ON a.id = ra.answer_id
    WHERE p.id = :author_id
    GROUP BY sid
    ORDER BY takers DESC";
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

function get_anon_takers_by_author($author_id) {
    global $db;
    $query =
    "SELECT COUNT(ra.user_id) AS takers,
    s.person_id AS author_id
    FROM recorded_answers AS ra
    INNER JOIN surveys AS s
    ON ra.survey_id = s.id
    WHERE ra.user_id IS NULL
    AND s.person_id = :author_id
    GROUP BY s.person_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':author_id', $author_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_reg_takers_by_author($author_id) {
    global $db;
    $query =
    "SELECT COUNT(ra.user_id) AS takers,
    s.person_id AS author_id
    FROM recorded_answers AS ra
    INNER JOIN surveys AS s
    ON ra.survey_id = s.id
    WHERE ra.user_id IS NOT NULL
    AND s.person_id = :author_id
    GROUP BY s.person_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':author_id', $author_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_avg_questions_per_survey_for_author($author_id) {
    global $db;
    $query =
    "SELECT question_count AS qps
    FROM (SELECT surveys.id AS survey,
          COUNT(questions.id) AS question_count
          FROM surveys
          INNER JOIN questions
          ON surveys.id = questions.survey_id
          WHERE surveys.person_id = :author_id
          GROUP BY survey) AS counted
    GROUP BY qps";
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

function get_avg_answers_per_question_for_author($author_id) {
    global $db;
    $query =
    "SELECT answer_count AS apq
    FROM (SELECT questions.question AS question,
          COUNT(answers.id) AS answer_count
          FROM questions
          INNER JOIN surveys
          ON questions.survey_id = surveys.id
          INNER JOIN answers
          ON questions.id = answers.question_id
          WHERE surveys.person_id = :author_id
          GROUP BY questions.id) AS counted
    GROUP BY apq";
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


// for general_stats.php
function get_popularity() {
    
}

function get_avg_questions_per_survey() {
    global $db;
    $query =
    "SELECT question_count AS qps
    FROM (SELECT surveys.id AS survey,
          COUNT(questions.id) AS question_count
          FROM surveys
          INNER JOIN questions
          ON surveys.id = questions.survey_id
          GROUP BY survey) AS counted
    GROUP BY qps";
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

function get_avg_answers_per_question() {
    global $db;
    $query =
    "SELECT answer_count AS apq
    FROM (SELECT questions.question AS question,
          COUNT(answers.id) AS answer_count
          FROM questions
          INNER JOIN surveys
          ON questions.survey_id = surveys.id
          INNER JOIN answers
          ON questions.id = answers.question_id
          GROUP BY questions.id) AS counted
    GROUP BY apq";
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

?>

