<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `surveys` ( `created_at` ,  `updated_at` ,  `person_id` ,  `title`  ) VALUES(  '{$_POST['created_at']}' ,  '{$_POST['updated_at']}' ,  '{$_POST['person_id']}' ,  '{$_POST['title']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='read_survey.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Created At:</b><br /><input type='text' name='created_at'/> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at'/> 
<p><b>Person Id:</b><br /><input type='text' name='person_id'/> 
<p><b>Title:</b><br /><input type='text' name='title'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
