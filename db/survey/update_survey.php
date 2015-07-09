<?php
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 

$sql = $db->prepare("UPDATE `surveys` SET  `created_at` =  '{$_POST['created_at']}' ,  `updated_at` =  '{$_POST['updated_at']}' ,  `person_id` =  '{$_POST['person_id']}' ,  `title` =  '{$_POST['title']}'   WHERE `id` = '$id' "); 
$count = $sql->execute() or die(print_r($sql->errorInfo()));

echo ($count > 0) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='read_survey.php'>Back To Listing</a>"; 
} 
$result = $db->query("SELECT * FROM `surveys` WHERE `id` = '$id' "); 
    $row = $result->fetch(PDO::FETCH_ASSOC);
?>

<form action='' method='POST'> 
<p><b>Created At:</b><br /><input type='text' name='created_at' value='<?= stripslashes($row['created_at']) ?>' /> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at' value='<?= stripslashes($row['updated_at']) ?>' /> 
<p><b>Person Id:</b><br /><input type='text' name='person_id' value='<?= stripslashes($row['person_id']) ?>' /> 
<p><b>Title:</b><br /><input type='text' name='title' value='<?= stripslashes($row['title']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
