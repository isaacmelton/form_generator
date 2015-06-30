<?php 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Question</b></td>"; 
echo "<td><b>Created At</b></td>"; 
echo "<td><b>Updated At</b></td>"; 
echo "<td><b>Survey Id</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `questions`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['question']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['created_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['updated_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['survey_id']) . "</td>";  
echo "<td valign='top'><a href=update_question.php?id={$row['id']}>Edit</a></td><td><a href=delete_question.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=create_question.php>New Row</a>"; 
?>
