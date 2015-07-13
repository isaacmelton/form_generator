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
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
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

