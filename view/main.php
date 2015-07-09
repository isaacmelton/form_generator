<?php
echo '<div id="main">';
echo '<h2>The new and improved Forms Generator</h2>';
$surveys = get_surveys();
include 'view/survey_list.php';
echo '</div>';