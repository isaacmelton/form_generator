<style>
.focus_chooser {
   margin-right:10px;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $("#author_focus").hide();

    $("input[value='survey']").change(function() {
        $("#author_focus").hide();
        $("#survey_focus").slideDown();
    });

    $("input[value='author']").change(function() {
        $("#survey_focus").hide();
        $("#author_focus").slideDown();
    });
});
</script>

<?php if (empty($surveys)):
    header('Location: index.php');
else: ?>
 <div class="container-fluid">
<div class="col-md-3"></div>
<div class="col-md-5 text-center">
<h3>What kind of statistics are you looking for?</h3>

<span class="focus_chooser"><input type="radio" name="focus" value="survey" checked>Surveys</span>
<span class="focus_chooser"><input type="radio" name="focus" value="author">Authors</span>

<br />
<br />

<div id="survey_focus">
    <p class="focus_description">
        Here are all the surveys created thus far.  Inspecting one lets you see all 
        of the different survey-taker tendencies.
    </p>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="surveys" />
        <select name="survey_id">
            <?php foreach ($surveys as $survey): ?>
                <option value="<?php echo $survey['id']; ?>">
                    <?php echo $survey['title']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <br />
        <input type="submit" value="Inspect" />
    </form>
    <br />
</div>

<div id="author_focus">
    <p class="focus_description">
        Here are all the authors who have created surveys.  By inspecting one, 
        you can take a peak at their survey creation tendencies.
    </p>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="authors" />
        <select name="author_id">
            <?php foreach ($authors as $author): ?>
                <option value="<?php echo $author['id']; ?>">
                    <?php echo $author['email']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <br />
        <input type="submit" value="Inspect" />
    </form>
    <br />
</div>

</div></div>
<?php endif; ?>

<br />
