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
                    $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['timestaken'])));
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
                $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['timestaken'])));
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
            $encode['rows'][] = array('c'=> array( array('v'=>'Registered Users'), array('v'=>(int)$regd['timestaken'])));
            $encode['rows'][] = array('c'=> array( array('v'=>'Anonymous Users'), array('v'=>(int)$anon['timestaken'])));
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
                $encode['rows'][] = array('c'=> array( array('v'=>$row['question_count'] . ' Questions'), array('v'=>(int)$row['occurrence'])));
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
                $encode['rows'][] = array('c'=> array( array('v'=>$row['answer_count']. ' Answers'), array('v'=>(int)$row['occurrence'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;

        // these are used for the general_stats.php
        case 'general_popularity':
            $encode = array();
            $surveys = get_popularity_of_surveys();
            foreach($surveys as $row) {
                $encode['cols'][] = array('label'=>'Survey','type'=>'string');
                $encode['cols'][] = array('label'=>'Takers','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['title']), array('v'=>(int)$row['timestaken'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_svu':
            $encode = array();
            $surveys = get_number_surveys();
            $regd = get_number_users();
            $encode['cols'][] = array('label'=>'The Counted','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Surveys'), array('v'=>(int)$surveys)));
            $encode['rows'][] = array('c'=> array( array('v'=>'Registered Users'), array('v'=>(int)$regd)));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_regvanon':
            $encode = array();
            $regd = get_number_regd_takens();
            $anon = get_number_anon_takens();
            $encode['cols'][] = array('label'=>'Taker Type','type'=>'string');
            $encode['cols'][] = array('label'=>'Takers','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Registered Users'), array('v'=>(int)$regd)));
            $encode['rows'][] = array('c'=> array( array('v'=>'Anonymous Users'), array('v'=>(int)$anon)));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_avgqps':
            $encode = array();
            $qps = get_avg_questions_per_survey();
            foreach($qps as $row) {
                $encode['cols'][] = array('label'=>'Number of Questions','type'=>'string');
                $encode['cols'][] = array('label'=>'Occurrence','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['question_count'] . ' Questions'), array('v'=>(int)$row['occurrence'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_avgapq':
            $encode = array();
            $apq = get_avg_answers_per_question();
            foreach($apq as $row) {
                $encode['cols'][] = array('label'=>'Number of Answers','type'=>'string');
                $encode['cols'][] = array('label'=>'Count','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$row['answer_count']. ' Answers'), array('v'=>(int)$row['occurrence'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_mvf1':
            $encode = array();
            $both = get_number_male_and_female_users();
            foreach($both as $row) {
                if ($row['sex'] == 'M') {
                    $sex = 'Male';
                } else {
                    $sex = 'Female';
                }
                $encode['cols'][] = array('label'=>'Gender','type'=>'string');
                $encode['cols'][] = array('label'=>'Takers','type'=>'number');
                $encode['rows'][] = array('c'=> array( array('v'=>$sex), array('v'=>(int)$row['number'])));
            }
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        case 'general_mvf2':
            $encode = array();
            $creators = get_number_male_and_female_created_surveys();
            $takers = get_number_male_and_female_surveys_taken();
            foreach($creators as $row) {
                if ($row['sex'] == 'F') {
                    $csfemale = $row['created'];
                } else {
                    $csmale = $row['created'];
                }
            }
            foreach($takers as $row) {
                if ($row['sex'] == 'F') {
                    $stfemale = $row['taken'];
                } else {
                    $stmale = $row['taken'];
                }
            }
            if (empty($csfemale)) { $csfemale = 0; }
            if (empty($csmale))   { $csmale = 0; }
            if (empty($stfemale)) { $stfemale = 0; }
            if (empty($stmale))   { $stmale = 0; }
            $encode['cols'][] = array('label'=>'Gender','type'=>'string');
            $encode['cols'][] = array('label'=>'Female Users','type'=>'number');
            $encode['cols'][] = array('label'=>'Male Users','type'=>'number');
            $encode['rows'][] = array('c'=> array( array('v'=>'Surveys Created'), array('v'=>(int)$csfemale), array('v'=>(int)$csmale)));
            $encode['rows'][] = array('c'=> array( array('v'=>'Surveys Taken'), array('v'=>(int)$stfemale), array('v'=>(int)$stmale)));
            $encoded = json_encode($encode);
            echo $encoded;
            break;
        endswitch;

?>
