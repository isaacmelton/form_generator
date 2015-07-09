<?php
$id = (int) $_GET['id']; 
$count = $db->exec("DELETE FROM `answers` WHERE `id` = '$id' ") ;
echo ($count > 0) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
?> 

<a href='read_answer.php'>Back To Listing</a>
