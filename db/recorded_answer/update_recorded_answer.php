<?php
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 

$sql = $db->prepare("UPDATE `recorded_answers` SET  `user_id` =  '{$_POST['user_id']}' ,  `answer_id` =  '{$_POST['answer_id']}' ,  `survey_id` =  '{$_POST['survey_id']}' ,  `created_at` =  '{$_POST['created_at']}' ,  `updated_at` =  '{$_POST['updated_at']}'   WHERE `id` = '$id' "); 
$count = $sql->execute() or die(print_r($sql->errorInfo()));

echo ($count > 0) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='read_recorded_answer.php'>Back To Listing</a>"; 
} 
$result = $db->query("SELECT * FROM `recorded_answers` WHERE `id` = '$id' "); 
$row = $result->fetch(PDO::FETCH_ASSOC);
?>

<form action='' method='POST'> 
<p><b>User Id:</b><br /><input type='text' name='user_id' value='<?= stripslashes($row['user_id']) ?>' /> 
<p><b>Answer Id:</b><br /><input type='text' name='answer_id' value='<?= stripslashes($row['answer_id']) ?>' /> 
<p><b>Survey Id:</b><br /><input type='text' name='survey_id' value='<?= stripslashes($row['survey_id']) ?>' /> 
<p><b>Created At:</b><br /><input type='text' name='created_at' value='<?= stripslashes($row['created_at']) ?>' /> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at' value='<?= stripslashes($row['updated_at']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
