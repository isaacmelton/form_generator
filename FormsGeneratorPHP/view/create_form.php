<?php

// Ref: http://stackoverflow.com/questions/29225320/saving-multiple-form-data-to-mysql-using-php
// Ref: http://stackoverflow.com/questions/18156505/insert-multiple-fields-using-foreach-loop

if(isset($_POST['submit'])) {

    $surveyTitle = $_POST['survey_title'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];
    $now = date("Y-m-d H:i:s");

    //TODO Create survey
    $sql = "INSERT INTO surveys (person_id, title, active)
            VALUES ('1','".$_POST['survey_title']."','1')";  //TODO add user
    if ($db->query($sql)) {
        $survey_id = $db->lastInsertId();

        if (isset($questions)) {
            $sequence = 1;
            foreach ($questions as $question) {

                $sql = "INSERT INTO questions (sequence, question, survey_id, created_at)
                VALUES ('".$sequence."', '".$question."', '".$survey_id."', '".$now."')";  //TODO
                if ($db->query($sql)) {
                    $question_id = $db->lastInsertId();

                    if (isset($answers[($sequence-1)])) {

                        $answer_sequence = 1;
                        foreach ($answers[$sequence-1] as $answer) {
                            $sql = "INSERT INTO answers (sequence, answer, created_at, question_id)
                            VALUES ('".$answer_sequence."','".$answer."','".$now."','".$question_id."')";  //TODO
                            if ($db->query($sql)) {
                            } else {
                                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                            }
                            $answer_sequence++;
                        }
                    }
                } else {
                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                }
                $sequence++;
            }
        }
    } else {
        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
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
    var answer_counter = 0;
    var numberPattern = /\d+/g;

    function addAnswerToQuestion(questionID) {
        $("#"+questionID+"").append(getAnswer(questionID.match(numberPattern)));
    }

    function removeAnswerFromQuestion(answerID) {
        $("tr").remove(answerID);
    }

    function removeQuestionFromSurvey(questionID) {
        $("tr").remove(questionID);
    }

    function getQuestion(count) {
        return  "<tr class='question_row' id='question_" + count + "'>" +
                    "<td>Question: </td>" +
                    "<td>" +
                        "<input type='text' name='question[" + count + "]'>" +
                    "</td>" +
                    "<td>" +
                        "<input type='button' value='Remove' onclick='removeQuestionFromSurvey(\"#question_"+count+"\")' />" +
                        "<input type='button' class='add_answer' value='Add an Answer' id='question_"+count+"' onclick='addAnswerToQuestion(this.id);'/>" +
                    "</td>" +
                "</tr><br>";
    }

    function getAnswer(count) {
        answer_counter++;
        return  "<tr class='answer' id='answer_"+answer_counter+"'>" +
                    "<td>Answer: </td>" +
                    "<td>" +
                        "<input type='text' name='answer[" + count + "][]'>" +
                    "</td>" +
                    "<td>" +
                        "<input type='button' value='Remove' onclick='removeAnswerFromQuestion(\"#answer_"+answer_counter+"\")' />" +
                    "</td>" +
                "</tr>";
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

    <table id="question_table">
    </table>
    <input type="button" id="add_question" value="Add a Question"><br>
    <div class="eventButtons">
        <input type="submit" name="submit" id="submit" value="Save">
        <input type="reset" name="reset" id="reset" value="Clear"  class="btn">
    </div>
</form>