<?php
include 'model/database.php';
require_once('db/survey_db.php');
require_once('db/people_db.php');
require_once('db/question_db.php');
require_once('db/answer_db.php');
require_once('db/recorded_answer_db.php');
require_once('db/login_db.php');

$surveys = get_surveys();
?>

<script type="text/javascript">

$(document).ready(function() {
    $("select").change(function() {
        var val = $(this).text();
        $("#widget_code").text("<div id=\"the_widget_area\"></div><script type=\"text/javascript\" src=\"http://localhost/cs6290_webform_generator/js/widget.js\"><\/script><script type=\"text/javascript\">init_widget(" + val + ")<\/script>'");
    }).change();
});
</script>

<div class="container-fluid">
   <div class="col-md-3"></div>
   <div class="col-md-5 text-center">
       <h3>Which survey do you want to create a widget for?</h3>

       <br />

       <select class="form-control" name="survey_id">
           <?php foreach ($surveys as $survey): ?>
               <option value="<?php echo $survey['id']; ?>">
                   <?php echo $survey['title']; ?>
               </option>
           <?php endforeach; ?>
       </select>

       <br />
       <br />

       <textarea id="widget_code" rows="6" cols="60">
           Select an option to generate the code to create your widget!
       </textarea>

       <br />


