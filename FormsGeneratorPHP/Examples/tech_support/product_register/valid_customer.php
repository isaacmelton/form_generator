<?php
	 if (!isset($_SESSION['customer']['email'])) {
	 	include('../util/unauthorized.php');
	 	exit();
	 }
 ?>