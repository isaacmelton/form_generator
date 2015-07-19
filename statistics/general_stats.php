<link rel="stylesheet" type="text/css" href="./statistics/stats.css"></style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {

        var jsonData = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {purpose: 'general'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById(""));
        chart.draw(data, {width: 300, height: 200});
    }
</script>

<h1>Statistics About Everything</h1>

<div id="">
    
</div>

<h3>Number of Surveys and Number of Users</h3>

<div id="">
    COLUMN CHART
</div>

<h3>Number of Surveys Taken by Registered versus Anonymous Users</h3>

<div id="">
    PIE GRAPH 3D
</div>

<h3>Average Number of Questions per Test</h3>

<div id="">
    DONUT CHART
</div>

<h3>Number of Surveys Taken</h3>

<div id="">
    
</div>

<h3>Top Five Surveys</h3>

<div id="">
    COLUMN CHART
</div>

<h3>Number of Male versus Female Test Takers</h3>

<div id="">
    
</div>

<h3>Average Tests Taken per Male and Female</h3>

<div id="">
    
</div>



