<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
        <?php foreach ($questions as $question):

            var jsonData<?php echo $question['question_id']; ?> = $.ajax({
                url: "get_survey_data.php?sid=<?php echo $question['survey_id']; ?>&qid=<?php echo $question['question_id']; ?>",
                dataType:"json",
                async: false
                }).responseText;
            
            // Create our data table out of JSON data loaded from server.
            var data = new google.visualization.DataTable(jsonData);
  
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart<?php echo question.id; ?>'));
            chart.draw(data, {width: 400, height: 240});

        <?php endforeach; ?>
    }
</script>

<?php if (empty($survey)):
    header('Location: index.php');
else: ?>
<p>
    Okay, so uh... this is going to get adjusted depending on the format we plan on using, ultimately, but I'll try to make it somewhat clear what's going on...
</p>

<h1><?php echo $survey[0]['title']; ?></h1>

<h2>Author: <?php echo $survey[0]['email']; ?></h2>

<h3><i>Number of submissions: <?php echo $survey[0]['total']; ?></i></h3>

<ol>
    <?php $uniq = null;
    $i = 0;
    foreach ($survey as $qrow):
        if ($qrow['question'] != $uniq):
            echo '<li>' . $qrow['question'] . '</li>'; ?>
            <ul>
                <?php foreach ($survey as $arow):
                    if ($qrow['question'] == $arow['question']): ?>
                        <li>
                            <?php echo $arow['answer']; ?>
                            <ul><i>
                                <li>total votes: <?php echo $arow['choice_count']; ?></li>
                                <?php $percent = round(100 * $arow['choice_count'] / $arow['total'], 1); ?>
                                <li>percent of votes: <?php echo $percent; ?>%</li>
                            </i></ul>
                        </li>
                        <script> </script>
                    <?php endif;
                endforeach; ?>
            </ul>
            <?php $uniq = $qrow['question']; ?>
            <br />
            <div id="chart<?php echo $qrow['question_id']; ?>"></div>
        <?php $i = $i + 1;
        endif;
    endforeach; ?>
</ol>

<br />

<br />
<?php endif; ?>
