<?php ?>
<script>

    var counter = 0;
    var answer_counter = 0;
    var numberPattern = /\d+/g;

    function addAnswerToQuestion(questionID) {
        $("#"+questionID+"").append(getAnswer(questionID.match(numberPattern)));
    }

    function removeAnswerFromQuestion(answerID) {
        $("table").remove(answerID);
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
        return  "<table class='a' id='answer_"+answer_counter+"'>" +
            "<tr>" +
            "<td>" +
            "<h5>Answer: </h5>" +
            "</td>" +
            "<td>" +
            "<input class='form-control' type='text' name='answer[" + count + "][]' required>" +
            "</td>" +
            "<td>" +
            "<input type='button' class='btn btn-default' value='Remove' onclick='removeAnswerFromQuestion(\"#answer_"+answer_counter+"\")' required />" +
            "</td>" +
            "</tr>" +
            "</table>";
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

            <table class="table" id="question_table">
            </table>
            <br><br>
            <input type="button" class="btn btn-default" id="add_question" value="Add a Question"><br>
            <div class="eventButtons">
                <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save">
                <input class="btn btn-default" type="reset" name="reset" id="reset" value="Clear"  class="btn">
            </div>
        </form>
    </div>
</div>