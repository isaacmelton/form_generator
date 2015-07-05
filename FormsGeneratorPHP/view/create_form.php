<?php

// Ref: http://stackoverflow.com/questions/29225320/saving-multiple-form-data-to-mysql-using-php
// Ref: http://stackoverflow.com/questions/18156505/insert-multiple-fields-using-foreach-loop

if(isset($_POST['submit'])) {

    $surveyTitle = $_POST['survey_title'];
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

    var counter = 0;
    var numberPattern = /\d+/g;

    function addAnswerToQuestion(questionID) {
        $("#"+questionID+"").append(getAnswer(questionID.match(numberPattern)));
    }

    function getQuestion(count) {
        return "<tr class='question_row' id='question_" + count + "'>" +
            "<td>Question: </td><td><input type='text' name='question[" + count + "]'>" +
            "</td><td><input type='button' class='add_answer' id='question_"+count+"' onclick='addAnswerToQuestion(this.id);'/></td>";
    }

    function getAnswer(count) {
        return "<tr class='answer'><td>Answer for Question " + count
            + "</td><td><input type='text' name='answer[" + count
            + "][]'></td>";
    }

    $(document).ready(function() {


        $("#add_question").click(function () {
            counter++;
            $("#question_table").append(getQuestion(counter));
        });





    });
</script>

<form name="createForm" id="createForm" action="create_form" method="post">

    Survey Name: <input type="text" name="survey_title"><br>
    <input type="button" id="add_question" value="Add a Question"><br>

    <table id="question_table">

    </table>

    <div class="eventButtons">
        <input type="submit" name="submit" id="submit" value="Save">
        <input type="reset" name="reset" id="reset" value="Clear"  class="btn">
    </div>
</form>
