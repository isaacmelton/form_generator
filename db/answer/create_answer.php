<?php
if (isset($_POST['submitted'])) {
    $sql = $db->prepare("INSERT INTO `answers` ( `answer` ,  `created_at` ,  `updated_at` ,  `question_id`  )
  VALUES(  '{$_POST['answer']}' ,  '{$_POST['created_at']}' ,  '{$_POST['updated_at']}' ,  '{$_POST['question_id']}'  ) ");
    $sql->execute() or die(print_r($sql->errorInfo()));
echo "Added row.<br />"; 
echo "<a href='read_answer.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Answer:</b><br /><input type='text' name='answer'/> 
<p><b>Created At:</b><br /><input type='text' name='created_at'/> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at'/> 
<p><b>Question Id:</b><br /><input type='text' name='question_id'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
