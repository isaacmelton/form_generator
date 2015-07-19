<?php
function get_surveys()
{
    global $db;
    $query = 'SELECT * FROM surveys
	ORDER BY person_id';
    $surveys = $db->query($query);
    return $surveys;
}

function delete_survey($id)
{
    global $db;
    $query = "DELETE FROM surveys
	WHERE id = '$id'";
    $db->exec($query);
}

function get_survey($id)
{
    global $db;
    $query = "SELECT * FROM surveys
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $survey = $statement->fetch();
    $statement->closeCursor();
    return $survey;
}

?>
