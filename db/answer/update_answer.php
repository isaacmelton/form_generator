<?php
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) {

$sql = $db->prepare("UPDATE `answers` SET  `answer` =  '{$_POST['answer']}' ,  `created_at` =  '{$_POST['created_at']}' ,  `updated_at` =  '{$_POST['updated_at']}' ,  `question_id` =  '{$_POST['question_id']}'   WHERE `id` = '$id' ");
$count = $sql->execute() or die(print_r($sql->errorInfo()));

echo ($count > 0) ? "Edited row.<br />" : "Nothing changed. <br />";
echo "<a href='read_answer.php'>Back To Listing</a>"; 
}

$result = $db->query("SELECT * FROM `answers` WHERE `id` = '$id' ");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    ?>

<form action='' method='POST'> 
<p><b>Answer:</b><br /><input type='text' name='answer' value='<?php echo stripslashes($row['answer']) ?>' />
<p><b>Created At:</b><br /><input type='text' name='created_at' value='<?php echo stripslashes($row['created_at']) ?>' />
<p><b>Updated At:</b><br /><input type='text' name='updated_at' value='<?php echo stripslashes($row['updated_at']) ?>' />
<p><b>Question Id:</b><br /><input type='text' name='question_id' value='<?php echo stripslashes($row['question_id']) ?>' />
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?>
