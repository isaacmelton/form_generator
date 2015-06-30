<?php 
include('config.php'); 

if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 

$sql = $db->prepare("UPDATE `people` SET  `first_name` =  '{$_POST['first_name']}' ,  `last_name` =  '{$_POST['last_name']}' ,  `email` =  '{$_POST['email']}' ,  `city` =  '{$_POST['city']}' ,  `state` =  '{$_POST['state']}' ,  `country` =  '{$_POST['country']}' ,  `sex` =  '{$_POST['sex']}' ,  `created_at` =  '{$_POST['created_at']}' ,  `updated_at` =  '{$_POST['updated_at']}'   WHERE `id` = '$id' "); 
$count = $sql->execute() or die(print_r($sql->errorInfo()));


echo ($count > 0)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='read_people.php'>Back To Listing</a>"; 
} 
$result = $db->query("SELECT * FROM `people` WHERE `id` = '$id' "); 
$row = $result->fetch(PDO::FETCH_ASSOC);

?>

<form action='' method='POST'> 
<p><b>First Name:</b><br /><input type='text' name='first_name' value='<?= stripslashes($row['first_name']) ?>' /> 
<p><b>Last Name:</b><br /><input type='text' name='last_name' value='<?= stripslashes($row['last_name']) ?>' /> 
<p><b>Email:</b><br /><input type='text' name='email' value='<?= stripslashes($row['email']) ?>' /> 
<p><b>City:</b><br /><input type='text' name='city' value='<?= stripslashes($row['city']) ?>' /> 
<p><b>State:</b><br /><input type='text' name='state' value='<?= stripslashes($row['state']) ?>' /> 
<p><b>Country:</b><br /><input type='text' name='country' value='<?= stripslashes($row['country']) ?>' /> 
<p><b>Sex:</b><br /><input type='text' name='sex' value='<?= stripslashes($row['sex']) ?>' /> 
<p><b>Created At:</b><br /><input type='text' name='created_at' value='<?= stripslashes($row['created_at']) ?>' /> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at' value='<?= stripslashes($row['updated_at']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
