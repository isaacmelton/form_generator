<?php 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `people` ( `first_name` ,  `last_name` ,  `email` ,  `city` ,  `state` ,  `country` ,  `sex` ,  `created_at` ,  `updated_at`  ) VALUES(  '{$_POST['first_name']}' ,  '{$_POST['last_name']}' ,  '{$_POST['email']}' ,  '{$_POST['city']}' ,  '{$_POST['state']}' ,  '{$_POST['country']}' ,  '{$_POST['sex']}' ,  '{$_POST['created_at']}' ,  '{$_POST['updated_at']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='read_people.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>First Name:</b><br /><input type='text' name='first_name'/> 
<p><b>Last Name:</b><br /><input type='text' name='last_name'/> 
<p><b>Email:</b><br /><input type='text' name='email'/> 
<p><b>City:</b><br /><input type='text' name='city'/> 
<p><b>State:</b><br /><input type='text' name='state'/> 
<p><b>Country:</b><br /><input type='text' name='country'/> 
<p><b>Sex:</b><br /><input type='text' name='sex'/> 
<p><b>Created At:</b><br /><input type='text' name='created_at'/> 
<p><b>Updated At:</b><br /><input type='text' name='updated_at'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
