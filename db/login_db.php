<?php

function get_hash($email) {
    global $db;
    $query =
    "SELECT users.`password` AS pswd
    FROM users
    INNER JOIN people
    ON users.person_id = people.id
    WHERE people.email = :email";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['pswd'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_user_id($email) {
    global $db;
    $query =
    "SELECT users.id AS user_id
    FROM users
    INNER JOIN people
    ON users.person_id = people.id
    WHERE people.email = :email";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['user_id'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_password($email, $password) {
    global $db;
    $query =
    "UPDATE users
    SET users.`password` = :password
    WHERE users.id = :user_id";
    try {
        $statement = $db->prepare($query);
        $user_id = get_user_id($email);
        $statement->bindValue(':email', $user_id);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $row_count = $statement->fetchColumn();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function confirm_password($email, $password) {
    $hash = get_hash($email);
    if (empty($hash)) {
        $hash = ' ';
    } 
    if (empty($password)) {
        $password = ' ';
    }
    return password_verify($password, $hash);
}

function encrypt($email, $password) {
    $options['cost'] = 20;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    update_password($email, $hash);
    return $hash;
}

function is_remembered($cookie_val) {
    global $db;
    $query =
    "SELECT people.email AS email
    FROM people
    INNER JOIN users
    ON people.id = users.person_id
    WHERE remember_me = :cookie_val";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cookie_val', $cookie_val);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['email'];
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function set_remember_me($email, $cookie_val) {
    global $db;
    $query =
    "UPDATE users
    SET users.remember_me = :cookie_val
    WHERE users.id = :user_id";
    try {
        $statement = $db->prepare($query);
        $user_id = get_user_id($email);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':cookie_val', $cookie_val);
        $statement->execute();
        $row_count = $statement->fetchColumn();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function unset_remember_me($email) {
    global $db;
    $query =
    "UPDATE users
    SET users.remember_me = NULL
    WHERE users.id = :user_id";
    try {
        $statement = $db->prepare($query);
        $user_id = get_user_id($email);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $row_count = $statement->fetchColumn();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

?>
