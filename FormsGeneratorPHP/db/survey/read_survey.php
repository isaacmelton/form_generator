<?php 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Created At</b></td>"; 
echo "<td><b>Updated At</b></td>"; 
echo "<td><b>Person Id</b></td>"; 
echo "<td><b>Title</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `surveys`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['created_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['updated_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['person_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['title']) . "</td>";  
echo "<td valign='top'><a href=update_survey.php?id={$row['id']}>Edit</a></td><td><a href=delete_survey.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=create_survey.php>New Row</a>"; 
?>
