<link rel="stylesheet" type="text/css" href="./statistics/stats.css"></style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {

        <?php foreach ($questions as $question): ?>

            var jsonData<?php echo $question['question_id']; ?> = $.ajax({
                url: "statistics/get_survey_data.php",
                dataType:"json",
                data: {sid: "<?php echo $question['survey_id']; ?>", qid: "<?php echo $question['question_id']; ?>"},
                type: "POST",
                async: false
                }).responseText;
            
            // Create our data table out of JSON data loaded from server.
            var data<?php echo $question['question_id']; ?> = new google.visualization.DataTable(jsonData<?php echo $question['question_id']; ?>);
  
            // Instantiate and draw our chart, passing in some options.
            var chart<?php echo $question['question_id']; ?> = new google.visualization.PieChart(document.getElementById("chart<?php echo $question['question_id']; ?>"));
            chart<?php echo $question['question_id']; ?>.draw(data<?php echo $question['question_id']; ?>, {width: 300, height: 200});

        <?php endforeach; ?>

    }
</script>

<?php if (empty($survey)):
    echo "<meta http-equiv='Location' content='./index.php' >";
    //header('Location: ./index.php');
else: ?>

 <div class="container-fluid">
<div class="col-md-3"></div>
<div class="col-md-5 text-center">
<h1>Survey: <?php echo $survey[0]['title']; ?></h1>

<h2>Author: <?php echo $survey[0]['email']; ?></h2>

<h4>Number of submissions: <?php echo $survey[0]['total']; ?></h4>

<br />

<table class="stat_table col-sm-12 col-sm-offset-2">
    <?php $uniq = null;
    foreach ($survey as $qrow):
        if ($qrow['question'] != $uniq):
            echo '<tr><th colspan="8">' . $qrow['question'] . '</th></tr>';
            echo '<tr><td>Answer</td><td /><td>Votes</td><td /><td>Percent</td><td>Visualization</td></tr>';
            $apr = 0;
                foreach ($survey as $arow):
                    if ($qrow['question'] == $arow['question']):
                       $apr = $apr + 1;
                    endif;
                endforeach;
                $first_go = true; ?>
                <?php foreach ($survey as $arow):
                    if ($qrow['question'] == $arow['question']): ?>
                        <tr>
                            <td><?php echo $arow['answer']; ?></td>
                            <td />
                            <td><?php echo $arow['choice_count']; ?></td>
                            <td />
                            <td>
                                <?php if ($arow['total'] > 0) {
                                    $percent = round(100 * $arow['choice_count'] / $arow['total'], 1);
                                } else { $percent = 0; }
                                $apr = $apr + 1;
                                echo $percent . '%'; ?>
                            </td>
                            <?php if ($first_go == true): ?>
                                <td colspan="3" rowspan="<?php echo $apr; ?>">
                                    <div id="chart<?php echo $qrow['question_id']; ?>">GRAPH</div>
                                </td>                                
                            <?php endif;
                            $first_go = false; ?>
                        </tr>
                    <?php endif;
                endforeach; ?>
            <?php $uniq = $qrow['question']; ?>            
        <?php endif; ?>

    <tr><td colspan="8"></td></tr>

    <?php endforeach; ?>
</table>
<?php endif; ?>

<br />

<p>
    Return <a href="index.php">home</a>.
</p>
</div></div>