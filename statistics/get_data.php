<?php
require("../model/database.php");
require("../model/statistics_db.php");

    if (!isset($_POST['purpose'])) {
        header('Location: index.php');
    }

    switch ($_POST['purpose']):
        // this condition is used for survey_stats.php
        case 'survey':
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
            break;

        // these are used for author_stats.php
        case 'top5':
            $aid = $_POST['aid'];
            $encode = array();
            $surveys = get_surveys_taker_count_by_author($aid);
            $limit = 5;
            $i = 0;
            foreach($q_and_a as $row) {
                if ($i < $limit) {
                    $encode['cols'][] = array('label'=>'Survey','type'=>'string');
                    $encode['cols'][] = array('label'=>'Takers','type'=>'number');
                    $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['takers'])));
                    $i++;
                } else {
                break;
            }
            $encoded = json_encode($encode);
            echo $encoded;
        case 'regvanon':
            $aid = $_POST['aid'];
            $encode = array();
            $surveys = get_surveys_taker_count_by_author($aid);
            $limit = 5;
            $i = 0;
            foreach($q_and_a as $row) {
                $encode['cols'][] = array('label'=>'Survey','type'=>'string');
                $encode['cols'][] = array('label'=>'Takers','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['takers'])));
            $encoded = json_encode($encode);
            echo $encoded;
        case 'allsurveys':
            $aid = $_POST['aid'];
            $encode = array();
            $regd = get_reg_takers_by_author($author_id);
            $anon = get_anon_takers_by_author($author_id);
            $encode['cols'][] = array('label'=>'Survey','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['takers'])));
            $encoded = json_encode($encode);
            echo $encoded;
        case 'avgqps':
            // do the thing
        case 'avgapq':
            // do the thing
        endswitch;

?>
