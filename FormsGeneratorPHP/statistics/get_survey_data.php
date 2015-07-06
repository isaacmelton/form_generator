<?php
require("../model/database.php");
require("../model/statistics_db.php");

$q_and_a = get_answers_for_question(2, 2);

$encode = array();

foreach($q_and_a as $row) {
   $encode['cols'][] = array('label'=>'Answer','type'=>'string');
   $encode['cols'][] = array('label'=>'Count','type'=>'number');
   $encode['rows'][] = array('c'=> array( array('v'=>$row['answer']), array('v'=>(int)$row['choice_count'])));
}

$encoded = json_encode($encode);

?>
<html>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
            
            // Create our data table out of JSON data loaded from server.
            var data = new google.visualization.DataTable(<?php echo $encoded; ?>);
            var options = {'width':400, 'height':300};
  
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart'));
            chart.draw(data, options);
    }
</script>

<div id="chart"></div>
</html>
