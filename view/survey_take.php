<div id="main">

    <div class="container">

        <h2><?php echo $survey['title']; ?></h2>

        <form class="survey" name="take_survey" action="./take_survey" method="post">
            <table class="table table-hover">
                <input type="hidden" name="survey" value="<?php echo $survey['id'] ?>"/>
                <?php
                if (isset($_SESSION['logged_in'])) {
                    echo "<input type='hidden' name='user_id' value='" . $person['id'] . "' required><br>";
                }
                ?>
                <!-- <input type="hidden" name="user_id" value="<?php //echo $person['id']; ?>" required><br> -->
                <input type="hidden" name="title" value="<?php echo $survey['title']; ?>" required><br>

                <tr>
                    <th>Question</th>
                    <th>Response</th>
                </tr>
                <?php foreach ($questions as $question) : ?>
                    <tr>
                        <td><?php echo $question['question']; ?></td>
                        <td></td>
                    </tr>
                    <?php foreach ($answers as $answer) : ?>
                        <?php if ($answer['question_id'] == $question['id']) : ?>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<?php echo $answer['answer']; ?></td>
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