<?php
require("../model/database.php");
require("../model/statistics_db.php");

    if (!isset($_POST['purpose'])) {
        header('Location: index.php');
    }

    if ($_POST['purpose'] == 'survey') {
        $sid = $_POST['sid'];
        $qid = $_POST['qid'];
        $encode = array();
        $q_and_a = get_answers_for_question($sid, $qid);
        foreach($q_and_a as $row) {
            $encode['cols'][] = array('label'=>'Answer','type'=>'string');
            $encode['cols'][] = array('label'=>'Count','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>$row['answer']), array('v'=>(int)$row['choice_count'])));
        }
        $encoded = json_encode($encode);
        echo $encoded;
    } elseif ($_POST['purpose'] == 'author') {
        // do the thing
    } elseif ($_POST['purpose'] == 'general') {
        // do the thing
    }

?>
