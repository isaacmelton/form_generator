<?php $person = get_person_by_email($_SESSION['logged_in']); ?>
<script>

    var counter = 0;
    var answer_counter = 0;
    var numberPattern = /\d+/g;

    function addAnswerToQuestion(questionID) {
        $("#" + questionID + "").append(getAnswer(questionID.match(numberPattern)));
    }

    function removeAnswerFromQuestion(answerID) {
        $("div").remove(answerID);
    }

    function removeQuestionFromSurvey(questionID) {
        $("div").remove(questionID);
    }

    function getQuestion(count) {
        return "<div class='container-fluid'>" +
                    "<div class='col-md-2'></div>" +
                    "<div class='col-md-6 text-center' id='question_" + count + "'>" +
                        "<tr>" +
                            "<td class='col-sm-2 control-label' colspan='2'>" +
                                "Question:" +
                                "<input class='form-control' type='text' name='question[]' required>" +
                            "</td>" +
                            "<td><br>" +
                            "<input type='button' class='btn btn-default' value='Remove' onclick='removeQuestionFromSurvey(\"#question_" + count + "\")' />" +
                            "&nbsp;<input type='button' class='btn btn-default add_answer' value='Add an Answer' id='question_" + count + "' onclick='addAnswerToQuestion(this.id);'/>" +
                            "</td>" +
                        "</tr>" +
                    "</div>"+
                "</div><br>";
    }
    function getAnswer(count) {
        answer_counter++;
        return "<div class='container-fluid'>" +
                    "<div class='text-center'><br>" +
                        "<div class='col-md-12' id='answer_" + answer_counter + "'>" +
                        "<tr class='col-md-11'>" +
                            "<td>" +
                                "<input class='form-control' type='text' placeholder='Enter Answer Here' name='answer[" + count + "][]' required>" +
                            "</td>" +
                            "<td>" +
                                "<input type='button' class='btn btn-default' value='Remove' onclick='removeAnswerFromQuestion(\"#answer_" + answer_counter + "\")' required />" +
                            "</td>" +
                        "</tr>" +
                        "</div>" +
                    "</div>"+
                "</div>";
    }

    $(document).ready(function () {

        $("#add_question").click(function () {
            $("#question_table").append(getQuestion(counter));
            counter++;
        });

    });
</script>
<div class="main">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8"><h2>Create a new Survey</h2></div>
    </div>


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-horizontal" role="form" name="createForm" id="createForm" action="create_form"
                  method="post">
                <input type="hidden" class="form-control" name="person_id" value="<?php echo $person['id']; ?>"
                       required><br>

                <div class="form-group">
                    <br>
                    <label class="col-sm-1 control-label">Survey Name: </label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="survey_title" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input type="button" class="btn btn-default" id="add_question" value="Add a Question"><br><br>
                    </div>
                </div>

                <div class="table" id="question_table">
                </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save">
                        <input class="btn btn-default" type="reset" name="reset" id="reset" value="Clear" class="btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>