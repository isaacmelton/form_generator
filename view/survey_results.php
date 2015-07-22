<div id="main">

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8"><h2>Survey Results</h2></div>
    </div>

    <div class="container">
        <!-- display a table of surveys -->

        <h2><?php echo get_survey($result_data['survey_id'])['title']; ?></h2>

        <table class="table table-hover">
            <tr>
                <th>Question</th>
                <th>Response</th>
            </tr>
            <?php for ($i = 0; $i < count($question_ids); $i++) { ?>
                <tr>
                    <td><?php echo get_question_by_id($question_ids[$i])['question']; ?></td>
                    <td><?php echo get_answer_by_id($answer_ids[$i])['answer']; ?></td>
                </tr>
            <?php } ?>
            </tr>
        </table>
        </form>
    </div>
</div>