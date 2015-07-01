<?php
echo "<table class=table>"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>First Name</b></td>"; 
echo "<td><b>Last Name</b></td>"; 
echo "<td><b>Email</b></td>"; 
echo "<td><b>City</b></td>"; 
echo "<td><b>State</b></td>"; 
echo "<td><b>Country</b></td>"; 
echo "<td><b>Sex</b></td>"; 
echo "<td><b>Created At</b></td>"; 
echo "<td><b>Updated At</b></td>"; 
echo "</tr>"; 
$result = $db->query("SELECT * FROM `people`") or trigger_error(mysql_error());
while($row = $result->fetch(PDO::FETCH_ASSOC)){
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['first_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['last_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['email']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['city']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['state']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['country']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['sex']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['created_at']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['updated_at']) . "</td>";  
echo "<td valign='top'><a href=update_people.php?id={$row['id']}>Edit</a></td><td><a href=delete_people.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=create_people.php>New Row</a>"; 
?>
