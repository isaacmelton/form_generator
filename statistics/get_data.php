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
            $encode['cols'][] = array('label'=>'Survey','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            foreach($surveys as $row) {
                if ($i < $limit) {
                    $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['takers'])));
                    $i++;
                } else {
                    break 1;
                }
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'allsurveys':
            $aid = $_POST['aid'];
            $encode = array();
            $surveys = get_surveys_taker_count_by_author($aid);
            foreach($surveys as $row) {
                $encode['cols'][] = array('label'=>'Survey','type'=>'string');
                $encode['cols'][] = array('label'=>'Takers','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['takers'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'regvanon':
            $aid = $_POST['aid'];
            $encode = array();
            $regd = get_reg_takers_by_author($aid);
            $anon = get_anon_takers_by_author($aid);
            $encode['cols'][] = array('label'=>'Taker Type','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Registered Users'), array('v'=>(int)$regd['takers'])));
            $encode['rows'][] = array('c'=> array( array('v'=>'Anonymous Users'), array('v'=>(int)$anon['takers'])));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'avgqps':
            $aid = $_POST['aid'];
            $encode = array();
            $qps = get_avg_questions_per_survey_for_author($aid);
            foreach($qps as $row) {
                $encode['cols'][] = array('label'=>'Number of Questions','type'=>'string');
                $encode['cols'][] = array('label'=>'Count','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['qps'] . ' Questions'), array('v'=>(int)$row['qps'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'avgapq':
            $aid = $_POST['aid'];
            $encode = array();
            $apq = get_avg_answers_per_question_for_author($aid);
            foreach($apq as $row) {
                $encode['cols'][] = array('label'=>'Number of Answers','type'=>'string');
                $encode['cols'][] = array('label'=>'Count','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['apq']. ' Questions'), array('v'=>(int)$row['apq'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;

        // these are used for the general_stats.php
        endswitch;

?>
