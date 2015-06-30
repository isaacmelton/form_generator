<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `questions` ( `question` ,  `created_at` ,  `updated_at` ,  `survey_id`  ) VALUES(  '{$_POST['question']}' ,  '{$_POST['created_at']}' ,  '{$_POST['updated_at']}' ,  '{$_POST['survey_id']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
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
