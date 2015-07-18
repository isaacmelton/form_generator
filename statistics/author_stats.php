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
        var jsonData = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'top5'},
            type: "POST",
            async: false
            }).responseText;

        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById("top5"));
        chart.draw(data, {width: 300, height: 200});


        // REGISTERED USER TAKERS VS ANON USER TAKERS
        var jsonData = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'regvanon'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById("regvanon"));
        chart.draw(data, {width: 300, height: 200});


        // MOST TAKEN SURVEYS
        var jsonData = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'allsurveys'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById("allsurveys"));
        chart.draw(data, {width: 300, height: 200});


        // AVERAGE QUESTIONS PER SURVEY
        var jsonData = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'avgqps'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById("avgqps"));
        chart.draw(data, {width: 600, height: 400, pieHole: 0.4});

        // AVERAGE ANSWERS PER QUESTION
        var jsonData = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {aid: <?php echo $author_id; ?>, purpose: 'avgapq'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById("avgapq"));
        chart.draw(data, {width: 600, height: 400, pieHole: 0.4});
    }
</script>

<h1>AUTHOR'S surveys</h1>
<?php $nsurveys = (count($surveys));
if ($nsurveys < 5): ?>
    <p><i>
        Note: This user has created only <?php echo $nsurveys; ?>, so the following statistics
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



