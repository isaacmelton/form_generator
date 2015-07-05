<?php

// Ref: http://stackoverflow.com/questions/29225320/saving-multiple-form-data-to-mysql-using-php
// Ref: http://stackoverflow.com/questions/18156505/insert-multiple-fields-using-foreach-loop

if(isset($_POST['submit'])) {

    $surveyTitle = $_POST['surveyTitle'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];

    //TODO Create survey
    $sql = "INSERT INTO survey
            VALUES ()";  //TODO
    if ($db->query($sql)) {
        echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
    } else {
        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
    }

    $db = null;

    //TODO iterate over questions and add
    foreach ($questions as $question) {
        $sql = "INSERT INTO question
                VALUES ()";  //TODO
        if ($db->query($sql)) {
            echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
        } else {
            echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
        }
        //TODO iterate over answers and add
        foreach ($answers as $answers) {
            $sql = "INSERT INTO answers
                    VALUES ()";  //TODO
            if ($db->query($sql)) {
                echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
            }
        }
    }

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<script>
    $(document).ready(function() {
        var counter = 0;
        $("#add_question").click(function () {
            counter++;
            $("#question_table").append(getQuestion(counter));
        });

        $(".add_answer").click(function () {
            $(this).append(getAnswer(counter));
        });

        function getQuestion(count) {
            return "<tr class='question' id='question_"+count+"'><td>Question " + count + "</td><td><input type='text' name='question[]'></td><td><input type='button' class='add_answer' id='question_"+count+"' /></td>";
        }

        function getAnswer(count) {
            return "<tr class='answer'><td>Answer for Question " + count
                + "</td><td><input type='text' name='answer[" + count
                + "][]'></td>";
        }

    });
</script>

<form name="createForm" id="createForm" action="create_form" method="post">

    Survey Name: <input type="text" name="surveyTitle"><br>

    <table id="question_table">
        <tr><td>Add Question</td><td><input type="button" id="add_question" name='add_question' /></td></tr>
    </table>

    <div class="eventButtons">
        <input type="submit" name="submit" id="submit" value="Save">
        <input type="reset" name="reset" id="reset" value="Clear"  class="btn">
    </div>
</form>
