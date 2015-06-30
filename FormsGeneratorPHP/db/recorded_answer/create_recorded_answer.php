<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `recorded_answers` ( `user_id` ,  `answer_id` ,  `survey_id` ,  `created_at` ,  `updated_at`  ) VALUES(  '{$_POST['user_id']}' ,  '{$_POST['answer_id']}' ,  '{$_POST['survey_id']}' ,  '{$_POST['created_at']}' ,  '{$_POST['updated_at']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='read_recorded_answer.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>User Id:</b><br /><input type='text' name='user_id'/> 
<p><b>Answer Id:</b><br /><input type='text' name='answer_id'/> 
<p><b>Survey Id:</b><br /><input type='text' name='survey_id'/> 
<p><b>Created At:</b><br /><input type='text' name='created_at'/> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
