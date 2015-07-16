<?php

/**
 * Gets all of the authors in the omniblog database.
 * 
 * Used in the search.php
 * 
 * @return multidimensional array of all the authors and their IDs
 */
function get_authors() {
	global $db;
	$query = 
		"SELECT * 
		FROM authors
		ORDER BY name";
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

/**
 * Gets all of the subjects in the omniblog database.  Used mainly as part of
 * the archive.php search system.
 * 
 * @return multidimensional array of all the subjects and their IDs
 */
function get_subjects() {
	global $db;
	$query = 
		"SELECT * 
		FROM subjects
		ORDER BY name";
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

/**
 * Gets an array that's a mix of data: entryID -- subjectID -- subjectName.  This is
 * iterated over each time we need the relevant tags.
 * 
 * @return a multidimensional array.  This is used after each entry to get all of
 *			the relevant tags
 */
function get_subjects_for_entries() {
	global $db;
	$query = 
		"SELECT subjects_of_entries.entryID, subjects_of_entries.subjectID, subjects.name AS name
		FROM subjects_of_entries
		INNER JOIN subjects
		ON subjects.id = subjects_of_entries.subjectID";
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

function get_entries() {
	global $db;
	$query =
		"SELECT entries.id, entries.title, authors.name AS author, entries.date AS date, entries.description, entries.firstParagraph,
				entries.content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE entries.leader = 0
		AND entries.date <= CURDATE()
		ORDER BY entries.date DESC";
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

function get_home_entries() {
	global $db;
	$query =
		"SELECT entries.id, entries.title, authors.name AS author,
				entries.date AS date, entries.description, entries.firstParagraph,
				entries.content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE entries.leader = 0
		AND entries.date <= CURDATE()
		ORDER BY entries.date DESC
		LIMIT 15";
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

function get_leader() {
global $db;
	$query =
		"SELECT entries.id, title, authors.name AS author,
				entries.date AS date, description, firstParagraph, 
				content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE leader = 1
		AND date <= CURDATE()
		ORDER BY date DESC
		LIMIT 1";
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}	
}

function get_entry_by_id($entryID) {
	global $db;
	$query =
		"SELECT entries.id, entries.title, authors.name AS author,
				entries.date AS date, entries.description, entries.firstParagraph, 
				entries.content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE entries.leader = 0
		AND entries.id = :entryID
		AND entries.date <= CURDATE()
		ORDER BY date DESC";
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':entryID', $entryID);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function get_wish_entry_by_id($entryID) {
	global $db;
	$query =
		"SELECT entries.id, entries.title, authors.name AS author,
				entries.date AS date, entries.description, entries.firstParagraph, 
				entries.content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE entries.leader = 0
		AND entries.id = :entryID
		AND entries.date <= CURDATE()
		ORDER BY date DESC";
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':entryID', $entryID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function get_regular_teasers() {
		global $db;
	$query =
		"SELECT DISTINCT entries.id, entries.title, authors.name AS author,
				entries.date AS date, entries.description, entries.firstParagraph
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE entries.leader = 0
		AND entries.date <= CURDATE()
		ORDER BY rand()
		LIMIT 5";
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

function get_archive_teasers() {
	global $db;
	$query =
		"SELECT entries.id, entries.title, authors.name AS author, authors.id AS author_id,
				entries.date AS date, entries.description, entries.firstParagraph
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		WHERE entries.leader = 0
		AND entries.date <= CURDATE()
		ORDER BY date DESC";
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

function get_leader_by_subject($subject) {
	global $db;
	$query =
		"SELECT entries.id, title, authors.name AS author,
				entries.date AS date, description, firstParagraph, 
				content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		INNER JOIN subjects_of_entries
		ON subjects_of_entries.entryID = entries.id
		INNER JOIN subjects
		ON subjects_of_entries.subjectID = subjects.id
		WHERE leader = 1
		AND subjects.name = :subject
		AND date <= CURDATE()
		ORDER BY date DESC
		LIMIT 1";
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':subject', $subject);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function get_entries_by_subject($subject) {
	global $db;
	$query =
		"SELECT entries.id, title, authors.name AS author,
				entries.date AS date, description, firstParagraph, 
				content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		INNER JOIN subjects_of_entries
		ON subjects_of_entries.entryID = entries.id
		INNER JOIN subjects
		ON subjects_of_entries.subjectID = subjects.id
		WHERE leader = 0
		AND subjects.name = :subject
		AND date <= CURDATE()
		ORDER BY date DESC";
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':subject', $subject);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function get_random_entries() {
			global $db;
	$query =
		"SELECT DISTINCT entries.id, entries.title, authors.name AS author,
				entries.date AS date, entries.description, entries.firstParagraph,
				entries.content
		FROM entries
		INNER JOIN authors
		ON authors.id = entries.authorID
		INNER JOIN subjects_of_entries
		ON subjects_of_entries.entryID = entries.id
		INNER JOIN subjects
		ON subjects_of_entries.subjectID = subjects.id
		ORDER BY rand()
		LIMIT 10";
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

function get_oldest_article_date() {
	global $db;
	$query =
		"SELECT date
		FROM entries
		ORDER BY date ASC
		LIMIT 1";
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
