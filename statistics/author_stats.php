<link rel="stylesheet" type="text/css" href="./statistics/stats.css"></style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {

        // TOP 5 GRAPH
        var jsonDataTop5 = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'author_top5'},
            type: "POST",
            async: false
            }).responseText;

        // Create our data table out of JSON data loaded from server.
        var dataTop5 = new google.visualization.DataTable(jsonDataTop5);
  
        // Instantiate and draw our chart, passing in some options.
        var chartTop5 = new google.visualization.ColumnChart(document.getElementById("top5"));
        chartTop5.draw(dataTop5, {width: 600, height: 400, vAxis: {minValue: 0}});


        // MOST TAKEN SURVEYS
        var jsonDataAllSurveys = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'author_allsurveys'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataAllSurveys = new google.visualization.DataTable(jsonDataAllSurveys);
  
        // Instantiate and draw our chart, passing in some options.
        var chartAllSurveys = new google.visualization.PieChart(document.getElementById("allsurveys"));
        chartAllSurveys.draw(dataAllSurveys, {width: 600, height: 400, is3D: true});


        // REGISTERED USER TAKERS VS ANON USER TAKERS
        var jsonDataRegvanon = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'author_regvanon'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataRegvanon = new google.visualization.DataTable(jsonDataRegvanon);
  
        // Instantiate and draw our chart, passing in some options.
        var chartRegvanon = new google.visualization.ColumnChart(document.getElementById("regvanon"));
        chartRegvanon.draw(dataRegvanon, {width: 600, height: 400, vAxis: {minValue: 0}});


        // AVERAGE QUESTIONS PER SURVEY
        var jsonDataAvgqps = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'author_avgqps'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataAvgqps = new google.visualization.DataTable(jsonDataAvgqps);
  
        // Instantiate and draw our chart, passing in some options.
        var chartAvgqps = new google.visualization.PieChart(document.getElementById("avgqps"));
        chartAvgqps.draw(dataAvgqps, {width: 600, height: 400, pieHole: 0.4});


        // AVERAGE ANSWERS PER QUESTION
        var jsonDataAvgapq = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'author_avgapq'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataAvgapq = new google.visualization.DataTable(jsonDataAvgapq);
  
        // Instantiate and draw our chart, passing in some options.
        var chartAvgapq = new google.visualization.PieChart(document.getElementById("avgapq"));
        chartAvgapq.draw(dataAvgapq, {width: 600, height: 400, pieHole: 0.4});

    }
</script>
 <div class="container-fluid">
<div class="col-md-3"></div>
<div class="col-md-5 text-center">
<h1>AUTHOR'S surveys</h1>
<?php $nsurveys = (count($surveys));
if ($nsurveys < 5): ?>
    <p><i>
        Note: This user has created only <?php echo $nsurveys; ?> survey, so the following statistics
        may be a poor indication of the author's survey-creation trends.
    </i></p>

<h3>Number of Survey Takers for each Survey</h3>

<?php else: ?>

<h3>Number of Survey Takers for Top Five Surveys</h3>

<?php endif; ?>

<div id="top5">BAR GRAPH</div>

<h3>Number of Survey Takers for All Surveys</h3>

<div id="allsurveys">3D PIE GRAPH</div>

<h3>Registered Takers versus Anonymous Takers</h3>

<div id="regvanon">BAR GRAPH</div>

<h3>Average Number of Questions Per Survey</h3>

<div id="avgqps">DONUT GRAPH</div>

<h3>Average Number of Answers Per Question</h3>

<div id="avgapq">DONUT GRAPH</div>
</div></div>
<br />

