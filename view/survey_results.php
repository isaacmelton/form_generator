<?php


if(isset($_POST['survey'])) {

    $questions = get_question_ids_per_survey($_POST['survey']);
    $now = date("Y-m-d H:i:s");
    $result_data = array();
    $question_ids = array();
    $answer_ids = array();
    $result_data['survey_id'] = $_POST['survey'];

    if (array_filter($questions)) {

        //TODO If user is logged in, use a different query.
        $count = 0;
        foreach ($questions as $q) {
            $key = "question_".$q['id'];
            $question_ids[$count] = $q['id'];
            $answer_ids[$count] = $_POST[$key];
            $query = "INSERT INTO recorded_answers (  answer_id, survey_id, created_at )
                      VALUES  ( :answer_id, :survey_id, :now )";
            $statement = $db->prepare($query);
            //$statement->bindValue(':user_id', $_POST['user_id']);
            $statement->bindValue(':answer_id', $_POST[$key]);
            $statement->bindValue(':survey_id', $_POST['survey']);
            $statement->bindValue(':now', $now);

            if ($statement->execute()) {

            } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
            }
            $count++;
        }
    }

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

} else {
    $surveys = get_surveys();
    include './view/survey_list.php';
}

?>

<div id="main">

    <div class="container">
        <!-- display a table of surveys -->

        <h2><?php echo get_survey($result_data['survey_id'])['title']; ?></h2>

            <table class="table table-hover">
                <tr>
                    <th>Question</th>
                    <th>Response</th>
                </tr>
                <?php for($i = 0; $i < count($question_ids); $i++){ ?>
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