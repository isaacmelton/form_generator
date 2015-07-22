<?php
include 'model/database.php';
require_once('db/survey_db.php');
require_once('db/people_db.php');
require_once('db/question_db.php');
require_once('db/answer_db.php');

// if ($_POST['submitted'] == false) {
        $id = $_GET['s'];
        $survey = get_survey($id);
        $questions = get_questions($id);
        $question_ids = get_question_ids_per_survey($id);
        $answers = get_answers();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
/**
$(document).ready(function() {
    $(function() {
        $("#forms_generator_survey").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "http://localhost/cs6290_webform_generator/process_widget.php",
                type: 'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    $("#the_widget_area").html("Your survey is being sent...");
                },
                success: function(data) {
                    $("#the_widget_area").html("Your survey has been received.  Thank you for participating.");
                }
            });
        });
    });
});
**/
</script>

<style>
#the_widget_area, #forms_generator_survey, #the_widget_area table, #the_widget_area tr, #the_widget_area th, #the_widget_area td, #the_widget_area input {
  margin: 0;
  padding: 0;
}

.centered {
  padding-top: 3px;
  text-align: center;
}
</style>

<?php // this will go in action later: http://45.55.93.140/ ?>
    <div id="the_widget_area">
        <form id="forms_generator_survey" name="widget_survey" action="http://localhost/cs6290_webform_generator/process_widget.php" method="post">
            <table>
                <tr>
                    <th colspan="2"><h2><?php echo $survey['title']; ?></h2></tH>
                <input type="hidden" name="submit" value="yes" />
                <input type="hidden" name="survey" value="<?php echo $survey['id'] ?>" />
                <input type="hidden" name="title" value="<?php echo $survey['title']; ?>" required /><br>

                <tr>
                    <th><h3>Question</h3></th>
                    <th><h3>Response</h3></th>
                </tr>
                <?php foreach ($questions as $question) : ?>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;<h4><?php echo $question['question']; ?></h4></td>
                    </tr>
                    <?php foreach ($answers as $answer) : ?>
                        <?php if ($answer['question_id'] == $question['id']) : ?>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $answer['answer']; ?></td>
                                <td><input type="radio" name="question_<?php echo $question['id'] ?>"
                                           value="<?php echo $answer['id'] ?>" required></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" class="centered">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>

