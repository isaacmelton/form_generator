<?php
function get_surveys() {
	global $db;
	$query = 'SELECT * FROM surveys
	ORDER BY person_id';
	$surveys = $db->query($query);
	return $surveys;
}

function delete_survey($id) {
	global $db;
	$query = "DELETE FROM surveys
	WHERE id = '$id'";
	$db->exec($query);
}
	
?>