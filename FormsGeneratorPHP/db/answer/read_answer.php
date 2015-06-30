<?php

echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Answer</b></td>"; 
echo "<td><b>Created At</b></td>"; 
echo "<td><b>Updated At</b></td>"; 
echo "<td><b>Question Id</b></td>"; 
echo "</tr>"; 
$result = $db->query("SELECT * FROM `answers`") or trigger_error(mysql_error());
while($row = $result->fetch(PDO::FETCH_ASSOC)){
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['answer']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['created_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['updated_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['question_id']) . "</td>";  
echo "<td valign='top'><a href=update_answer.php?id={$row['id']}>Edit</a></td><td><a href=delete_answer.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=create_answer.php>New Row</a>";
?>
