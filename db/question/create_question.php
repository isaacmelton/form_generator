<?php
if (isset($_POST['submitted'])) { 
$sql = $db->prepare("INSERT INTO `questions` ( `question` ,  `created_at` ,  `updated_at` ,  `survey_id`  )
 VALUES(  '{$_POST['question']}' ,  '{$_POST['created_at']}' ,  '{$_POST['updated_at']}' ,  '{$_POST['survey_id']}'  ) "); 
    $sql->execute() or die(print_r($sql->errorInfo()));
echo "Added row.<br />"; 
echo "<a href='read_question.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Question:</b><br /><input type='text' name='question'/> 
<p><b>Created At:</b><br /><input type='text' name='created_at'/> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at'/> 
<p><b>Survey Id:</b><br /><input type='text' name='survey_id'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
