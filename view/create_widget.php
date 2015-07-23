<script type="text/javascript">
$(document).ready(function() {
    $("select").each(function() {
        $(this).change(function() {
            var val = $(this).val();
            $("#widget_code").text("<div id=\"the_widget_area\"></div><script type=\"text/javascript\" src=\"http://45.55.93.140/js/widget.js\"><\/script><script type=\"text/javascript\">init_widget(" + val + ")<\/script>");
        });
    });
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
</div>

