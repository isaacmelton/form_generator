<?php 
include('config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `questions` SET  `question` =  '{$_POST['question']}' ,  `created_at` =  '{$_POST['created_at']}' ,  `updated_at` =  '{$_POST['updated_at']}' ,  `survey_id` =  '{$_POST['survey_id']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='read_question.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `questions` WHERE `id` = '$id' ")); 
?>

<form action='' method='POST'> 
<p><b>Question:</b><br /><input type='text' name='question' value='<?= stripslashes($row['question']) ?>' /> 
<p><b>Created At:</b><br /><input type='text' name='created_at' value='<?= stripslashes($row['created_at']) ?>' /> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at' value='<?= stripslashes($row['updated_at']) ?>' /> 
<p><b>Survey Id:</b><br /><input type='text' name='survey_id' value='<?= stripslashes($row['survey_id']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
