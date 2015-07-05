<?php
function get_surveys() {
	global $db;
	$query = 'SELECT * FROM surveys
	ORDER BY person_id';
	$surveys = $db->query($query);
	return $surveys;
}
?>