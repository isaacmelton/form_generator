<?php

// Ref: http://stackoverflow.com/questions/29225320/saving-multiple-form-data-to-mysql-using-php
// Ref: http://stackoverflow.com/questions/18156505/insert-multiple-fields-using-foreach-loop

if(isset($_POST['submit'])){

    $surveyTitle = $_POST['surveyTitle'];
    $row_data = array();
    foreach($_POST['question'] as $row=>$question){
        $question = mysql_real_escape_string($question);
        $answer= mysql_real_escape_string($_POST['answer'][$row]);

        $row_data[] = "('$question','$answer')";
    }
}
if(!empty($row_data)){

    //$insert_query = mysql_query("INSERT INTO surveys( " DATA "  ) VALUES".implode(',', $row_data));

    if(!$insert_query){
        echo "Error: " . mysql_error();
    }else{
        echo "Data Saved Successfully";
    }
}

?>

<h1>This needs to be more fixed and allow for multiple answers.</h1>

<form name="createForm" id="createForm" action="create_form" method="post">

    Survey Name: <input type="text" name="surveyTitle">
    <table class="itemTable">
    <tr class="cloneable">
        <td>Question<input type="text" name="question[]"></td>
        <td>Answer<input type="text" name="answer[]"></td>
    </tr>
    </tbody>
    </table>
    </div>
    <div class="eventButtons">
        <input type="submit" name="submit" id="submit" value="Save">
        <input type="reset" name="reset" id="reset" value="Clear"  class="btn">
    </div>
</form>
