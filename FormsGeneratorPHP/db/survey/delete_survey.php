<?php 
include('config.php'); 
$id = (int) $_GET['id']; 
$count = $db->exec("DELETE FROM `surveys` WHERE `id` = '$id' ") ; 
echo ($count > 0)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='read_survey.php'>Back To Listing</a>
