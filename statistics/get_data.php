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
        case 'author_top5':
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
        case 'author_allsurveys':
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
        case 'author_regvanon':
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
        case 'author_avgqps':
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
        case 'author_avgapq':
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
        case 'general_popularity':
            $encode = array();
            $surveys = // STUB
            foreach($surveys as $row) {
                $encode['cols'][] = array('label'=>'Survey','type'=>'string');
                $encode['cols'][] = array('label'=>'Takers','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['takers'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_svu':
            $encode = array();
            $surveys = // STUB
            $regd = // STUB
            $encode['cols'][] = array('label'=>'The Counted','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Surveys'), array('v'=>(int)$surveys)));
            $encode['rows'][] = array('c'=> array( array('v'=>'Registered Users'), array('v'=>(int)$regd)));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_regvanon':
            $encode = array();
            $regd = // STUB
            $anon = // STUB
            $encode['cols'][] = array('label'=>'Taker Type','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Registered Users'), array('v'=>(int)$regd['takers'])));
            $encode['rows'][] = array('c'=> array( array('v'=>'Anonymous Users'), array('v'=>(int)$anon['takers'])));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_qps':
            $encode = array();
            $qps = // STUB
            foreach($qps as $row) {
                $encode['cols'][] = array('label'=>'Number of Questions','type'=>'string');
                $encode['cols'][] = array('label'=>'Count','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['qps'] . ' Questions'), array('v'=>(int)$row['qps'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_apq':
            $encode = array();
            $apq = // STUB
            foreach($apq as $row) {
                $encode['cols'][] = array('label'=>'Number of Answers','type'=>'string');
                $encode['cols'][] = array('label'=>'Count','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['apq']. ' Questions'), array('v'=>(int)$row['apq'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_mvf1':
            $encode = array();
            $male = // STUB
            $female = // STUB
            $encode['cols'][] = array('label'=>'Gender','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Male'), array('v'=>(int)$male['takers'])));
            $encode['cols'][] = array('label'=>'Gender','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Female'), array('v'=>(int)$female['takers'])));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_mvf2':
            $encode = array();
            $mcs = // STUB
            $fcs = // STUB
            $musers = // STUB
            $fusers = // STUB
            $encode['cols'][] = array('label'=>'Gender','type'=>'string');
            $encode['cols'][] = array('label'=>'Surveys Created','type'=>'number');
            $encode['cols'][] = array('label'=>'Site Users','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Surveys Created'), array('v'=>(int)$mcs), array('v'=>(int)$fcs)));
            $encode['rows'][] = array('c'=> array( array('v'=>'Site Users'), array('v'=>(int)$musers), array('v'=>(int)$fusers)));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        endswitch;

?>
