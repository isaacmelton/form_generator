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
    "SELECT FLOOR(SUM(adivbyq)) AS timestaken
    FROM (SELECT survey_id, 
                 COUNT(answer_id) AS acount, 
                 qcount, 
                 COUNT(answer_id) / qcount AS adivbyq
          FROM recorded_answers
          LEFT JOIN (SELECT surveys.id, 
                            COUNT(questions.id) AS qcount
                     FROM surveys 
                     INNER JOIN questions 
                     ON surveys.id = questions.survey_id
                     WHERE surveys.person_id = :author_id
                     GROUP BY surveys.id) AS t1
          ON t1.id = survey_id
          GROUP BY survey_id, qcount) AS meh";
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
    "SELECT FLOOR(SUM(adivbyq)) AS timestaken
    FROM (SELECT survey_id, 
                 COUNT(answer_id) AS acount, 
                 qcount, 
                 COUNT(answer_id) / qcount AS adivbyq
          FROM recorded_answers
          LEFT JOIN (SELECT surveys.id, 
                            COUNT(questions.id) AS qcount
                     FROM surveys 
                     INNER JOIN questions 
                     ON surveys.id = questions.survey_id
                     WHERE surveys.person_id = :author_id
                     GROUP BY surveys.id) AS t1
          ON t1.id = survey_id
          WHERE user_id IS NULL
          GROUP BY survey_id, qcount) AS meh";
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
    "SELECT FLOOR(SUM(adivbyq)) AS timestaken
    FROM (SELECT survey_id, 
                 COUNT(answer_id) AS acount, 
                 qcount, 
                 COUNT(answer_id) / qcount AS adivbyq
          FROM recorded_answers
          LEFT JOIN (SELECT surveys.id, 
                            COUNT(questions.id) AS qcount
                     FROM surveys 
                     INNER JOIN questions 
                     ON surveys.id = questions.survey_id
                     WHERE surveys.person_id = :author_id
                     GROUP BY surveys.id) AS t1
          ON t1.id = survey_id
          WHERE user_id IS NOT NULL
          GROUP BY survey_id, qcount) AS meh";
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
    "SELECT question_count,
            COUNT(question_count) AS occurrence
    FROM (SELECT surveys.id AS survey,
          COUNT(questions.id) AS question_count
          FROM surveys
          INNER JOIN questions
          ON surveys.id = questions.survey_id
          WHERE surveys.person_id = :author_id
          GROUP BY survey) AS counted
    GROUP BY question_count";
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
    "SELECT answer_count,
            COUNT(answer_count) AS occurrence
    FROM (SELECT questions.question AS question,
          COUNT(answers.id) AS answer_count
          FROM questions
          INNER JOIN surveys
          ON questions.survey_id = surveys.id
          INNER JOIN answers
          ON questions.id = answers.question_id
          WHERE surveys.person_id = :author_id
          GROUP BY questions.id) AS counted
    GROUP BY answer_count";
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
function get_popularity_of_surveys() {
    global $db;
    $query =
    "SELECT surveys.title AS title, 
            FLOOR(SUM(adivbyq)) AS timestaken
     FROM (SELECT user_id,
                  survey_id, 
                  COUNT(answer_id) AS acount, 
                  qcount, 
                  COUNT(answer_id) / qcount AS adivbyq
           FROM recorded_answers
           LEFT JOIN (SELECT surveys.id, 
                             COUNT(questions.id) AS qcount
                      FROM surveys 
                      INNER JOIN questions 
                      ON surveys.id = questions.survey_id
                      GROUP BY surveys.id) AS t1
           ON t1.id = survey_id
           GROUP BY user_id, survey_id, qcount) AS t2
    INNER JOIN surveys
    ON t2.survey_id = surveys.id
    GROUP BY survey_id";
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

function get_number_surveys() {
    global $db;
    $query =
    "SELECT COUNT(*) AS number
    FROM surveys";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['number'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_number_users() {
    global $db;
    $query =
    "SELECT COUNT(*) AS number
    FROM users";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['number'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_number_anon_takens() {
    global $db;
    $query =
    "SELECT FLOOR(SUM(adivbyq)) AS timestaken
    FROM (SELECT survey_id, 
                 COUNT(answer_id) AS acount, 
                 qcount, 
                 COUNT(answer_id) / qcount AS adivbyq
          FROM recorded_answers
          LEFT JOIN (SELECT surveys.id, 
                            COUNT(questions.id) AS qcount
                     FROM surveys 
                     INNER JOIN questions 
                     ON surveys.id = questions.survey_id
                     GROUP BY surveys.id) AS t1
          ON t1.id = survey_id
          WHERE user_id IS NULL
          GROUP BY survey_id, qcount) AS meh";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['timestaken'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_number_regd_takens() {
    global $db;
    $query =
    "SELECT FLOOR(SUM(adivbyq)) AS timestaken
    FROM (SELECT survey_id, 
                 COUNT(answer_id) AS acount, 
                 qcount, 
                 COUNT(answer_id) / qcount AS adivbyq
          FROM recorded_answers
          LEFT JOIN (SELECT surveys.id, 
                            COUNT(questions.id) AS qcount
                     FROM surveys 
                     INNER JOIN questions 
                     ON surveys.id = questions.survey_id
                     GROUP BY surveys.id) AS t1
          ON t1.id = survey_id
          WHERE user_id IS NOT NULL
          GROUP BY survey_id, qcount) AS meh";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['timestaken'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_avg_questions_per_survey() {
    global $db;
    $query =
    "SELECT question_count,
            COUNT(question_count) AS occurrence
    FROM (SELECT surveys.id AS survey,
          COUNT(questions.id) AS question_count
          FROM surveys
          INNER JOIN questions
          ON surveys.id = questions.survey_id
          GROUP BY survey) AS counted
    GROUP BY question_count";
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
    "SELECT answer_count,
            COUNT(answer_count) AS occurrence
    FROM (SELECT questions.question AS question,
          COUNT(answers.id) AS answer_count
          FROM questions
          INNER JOIN surveys
          ON questions.survey_id = surveys.id
          INNER JOIN answers
          ON questions.id = answers.question_id
          GROUP BY questions.id) AS counted
    GROUP BY answer_count";
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

function get_number_male_and_female_users() {
    global $db;
    $query =
    "SELECT sex,
    COUNT(*) AS number 
    FROM people
    GROUP BY sex
    ORDER BY sex";
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

function get_number_male_and_female_created_surveys() {
    global $db;
    $query =
    "SELECT p.sex AS sex, COUNT(*) AS created
    FROM surveys AS s
    INNER JOIN people AS p
    ON s.person_id = p.id
    GROUP BY p.sex
    ORDER BY p.sex";
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

function get_number_male_and_female_surveys_taken() {
    global $db;
    $query =
    "SELECT t3.sex AS sex, 
            SUM(timestaken) AS taken
    FROM (SELECT user_id, 
                  FLOOR(SUM(adivbyq)) AS timestaken, 
                  sex
           FROM (SELECT user_id, 
                        survey_id, 
                        COUNT(answer_id) AS acount, 
                        qcount, 
                        COUNT(answer_id) / qcount AS adivbyq
                 FROM recorded_answers
                 LEFT JOIN (SELECT surveys.id, 
                                   COUNT(questions.id) AS qcount
                            FROM surveys 
                            INNER JOIN questions 
                            ON surveys.id = questions.survey_id
                            GROUP BY surveys.id) AS t1
                 ON t1.id = survey_id
                 WHERE user_id IS NOT NULL
                 GROUP BY user_id, survey_id, qcount) AS t2
           INNER JOIN users
           ON user_id = users.id
           INNER JOIN people
           ON users.person_id = people.id
           GROUP BY user_id) AS t3
    INNER JOIN users
    ON user_id = users.id
    INNER JOIN people
    ON users.person_id = people.id
    GROUP BY sex
    ORDER BY sex";
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

