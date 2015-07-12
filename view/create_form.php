<?php

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
                        foreach ($answers[($sequence-1)] as $answer) {
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
        $("div").remove(questionID);
    }

    function getQuestion(count) {
        return  "<div class='col-lg-10 container create_form_question' id='question_" + count + "'>" +
                    "<tr class='question_row' >" +
                        "<td>" +
                            "<h4>Question: </h4>" +
                        "</td>" +
                        "<td>" +
                            "<input class='form-control' type='text' name='question[]'>" +
                        "</td>" +
                        "<td>" +
                            "<input type='button' class='btn btn-default' value='Remove' onclick='removeQuestionFromSurvey(\"#question_"+count+"\")' />" +
                            "<input type='button' class='btn btn-default add_answer' value='Add an Answer' id='question_"+count+"' onclick='addAnswerToQuestion(this.id);'/>" +
                        "</td>" +
                    "</tr>" +
                "</div><br>";
    }

    function getAnswer(count) {
        answer_counter++;
        return  "<tr class='a' id='answer_"+answer_counter+"'>" +
                    "<td>" +
                    "</td>" +
                    "<td>" +
                        "<h5>Answer: </h5>" +
                        "<input class='form-control' type='text' name='answer[" + count + "][]' required>" +
                        "<input type='button' class='btn btn-default' value='Remove' onclick='removeAnswerFromQuestion(\"#answer_"+answer_counter+"\")' required />" +
                    "</td>" +
                "</tr>";
    }

    $(document).ready(function() {

        $("#add_question").click(function () {
            $("#question_table").append(getQuestion(counter));
            counter++;
        });

    });
</script>
  <div class="container-fluid">
<div class="col-md-6 col-md-offset-2">
<form  class="form-horizontal" role="form" name="createForm" id="createForm" action="create_form" method="post">

    <h3>Survey Name: </h3>
	<input type="text" class="form-control" name="survey_title" required><br>

    <table id="question_table">
    </table>
    <input type="button" class="btn btn-default" id="add_question" value="Add a Question"><br>
    <div class="eventButtons">
        <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save">
        <input class="btn btn-default" type="reset" name="reset" id="reset" value="Clear"  class="btn">
    </div>
</form>
</div>
</div>
