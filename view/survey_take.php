<?php
if (isset($_SESSION['logged_in'])) {
    $person = get_person_by_email($_SESSION['logged_in']);
}
 ?>
<div id="main">

    <div class="container">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8"><h2><?php echo $survey['title']; ?></h2></div>
        </div>

        <form class="survey" name="take_survey" action="./take_survey" method="post">
            <table class="table table-hover">
                <input type="hidden" name="survey" value="<?php echo $survey['id'] ?>"/>
                <?php
                if (isset($_SESSION['logged_in'])) {
                    echo "<input type='hidden' name='user_id' value='" . $person['id'] . "' required><br>";
                }
                ?>
                <input type="hidden" name="title" value="<?php echo $survey['title']; ?>" required><br>

                <tr>
                    <th><h3>Question</h3></th>
                    <th><h3>Response</h3></th>
                </tr>
                <?php foreach ($questions as $question) : ?>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;<h4><?php echo $question['question']; ?></h4></td>
                        <td></td>
                    </tr>
                    <?php foreach ($answers as $answer) : ?>
                        <?php if ($answer['question_id'] == $question['id']) : ?>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $answer['answer']; ?></td>
                                <td><input type="radio" name="question_<?php echo $question['id'] ?>"
                                           value="<?php echo $answer['id'] ?>"></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tr>
            </table>
            <div class="eventButtons">
                <input class="btn btn-default" type="submit" name="submit" id="submit" value="Save">
                <input class="btn btn-default" type="reset" name="reset" id="reset" value="Clear" class="btn">
            </div>
        </form>
    </div>
</div>