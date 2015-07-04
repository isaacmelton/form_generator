<?php
/**
function get_hash($user_id) {
    global $db;
    $query =
    "SELECT password
    FROM users
    WHERE id = :user_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_password($user_id, $password) {
    global $db;
    $query =
    "UPDATE users
    SET password = :password
    WHERE id = :user_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function confirm_password($user_id, $password) {
    $hash = get_hash($user_id);
    return password_verify($pass, $hash);
}
**/
function encrypt($user_id, $password) {
    $options['cost'] = 20;
    $hash = password_hash($password, PASSWORD_DEFAULT);
//    update_password($user_id, $hash);
    return $hash;
}

echo encrypt(1, 'password');

?>

