<?php 
include('config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `questions` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='read_question.php'>Back To Listing</a>
