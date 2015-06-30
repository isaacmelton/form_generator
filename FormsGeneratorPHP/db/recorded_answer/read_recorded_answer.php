<?php 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>User Id</b></td>"; 
echo "<td><b>Answer Id</b></td>"; 
echo "<td><b>Survey Id</b></td>"; 
echo "<td><b>Created At</b></td>"; 
echo "<td><b>Updated At</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `recorded_answers`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['user_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['answer_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['survey_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['created_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['updated_at']) . "</td>";  
echo "<td valign='top'><a href=update_recorded_answer.php?id={$row['id']}>Edit</a></td><td><a href=delete_recorded_answer.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=create_recorded_answer.php>New Row</a>"; 
?>
