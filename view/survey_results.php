<?php

if(isset($_POST['survey'])) {

    //TODO Fix this. The selector is wrong.
    if(isset($_POST['question'])) {
        if (array_filter($questions)){
            foreach ($questions as $q) {

                //TODO Fix this.
                $sql = "INSERT INTO recorded_answers (user_id, answer_id, survey_id)
                    VALUES ('1', '" . $q . "', '" . $_POST['survey_id'] . "')";
                if ($db->query($sql)) {

                } else {
                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                }
            }
        }

        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }

    // TODO Make a real results page
    include './view/main.php';


} else {
    $surveys = get_surveys();
    include './view/survey_list.php';
}
