<?php 
include('config.php'); 
$id = (int) $_GET['id']; 
$count = $db->exec("DELETE FROM `people` WHERE `id` = '$id' ") ; 
echo ($count > 0)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='read_people.php'>Back To Listing</a>
