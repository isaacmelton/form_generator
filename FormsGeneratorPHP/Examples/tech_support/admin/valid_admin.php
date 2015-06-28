<?php
 if (!isset($_SESSION['admin']['adminUsername'])) {
 	include('../util/unauthorized.php');
 	exit();
 }
 ?>