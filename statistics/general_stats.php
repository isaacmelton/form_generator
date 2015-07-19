<link rel="stylesheet" type="text/css" href="./statistics/stats.css"></style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {

        // POPULARITY
        var jsonPopularity = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {purpose: 'general_popularity'},
            type: "POST",
            async: false
            }).responseText;

        // Create our data table out of JSON data loaded from server.
        var Popularity = new google.visualization.DataTable(jsonPopularity);
  
        // Instantiate and draw our chart, passing in some options.
        var chartPopularity = new google.visualization.PieChart(document.getElementById("popularity"));
        chartPopularity.draw(Popularity, {width: 600, height: 400, is3D: true});


        // NUMBER OF SURVEYS VS NUMBER OF USERS
        var jsonDataSvu = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {purpose: 'general_svu'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataSvu = new google.visualization.DataTable(jsonDataSvu);
  
        // Instantiate and draw our chart, passing in some options.
        var chartSvu = new google.visualization.ColumnChart(document.getElementById("svu"));
        chartSvu.draw(dataSvu, {width: 600, height: 400, vAxis: {minValue: 0}});


        // REGISTERED USER TAKERS VS ANON USER TAKERS
        var jsonDataRegvanon = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {purpose: 'general_regvanon'},
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
            data: {purpose: 'general_avgqps'},
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
            data: {purpose: 'general_avgapq'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataAvgapq = new google.visualization.DataTable(jsonDataAvgapq);
  
        // Instantiate and draw our chart, passing in some options.
        var chartAvgapq = new google.visualization.PieChart(document.getElementById("avgapq"));
        chartAvgapq.draw(dataAvgapq, {width: 600, height: 400, pieHole: 0.4});


        // PERCENT MALE VS FEMALE
        var jsonDataMvf1 = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {purpose: 'general_mvf1'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataMvf1 = new google.visualization.DataTable(jsonDataMvf1);
  
        // Instantiate and draw our chart, passing in some options.
        var chartMvf1 = new google.visualization.PieChart(document.getElementById("mvf1"));
        chartMvf1.draw(dataMvf1, {width: 600, height: 400, is3D: true});

        // MALE VS FEMALE SITE USAGE
        var jsonDataMvf2 = $.ajax({
            url: "statistics/get_data.php",
            dataType:"json",
            data: {purpose: 'general_mvf2'},
            type: "POST",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var dataMvf2 = new google.visualization.DataTable(jsonDataMvf2);
  
        // Instantiate and draw our chart, passing in some options.
        var chartMvf2 = new google.visualization.ColumnChart(document.getElementById("mvf2"));
        chartMvf2.draw(dataMvf2, {width: 600, height: 400});

    }
</script>

 <div class="container-fluid">
<div class="col-md-3"></div>
<div class="col-md-5 text-center">

<h1>Statistics About Everything</h1>


<h3>Surveys by Popularity</h3>

<div id="popularity">
    3D PIE CHART
</div>

<h3>Number of Surveys and Number of Users</h3>

<div id="svu">
    COLUMN CHART
</div>

<h3>Number of Surveys Taken by Registered versus Anonymous Users</h3>

<div id="regvanon">
    COLUMN CHART
</div>

<h3>Number of Questions per Survey</h3>

<div id="avgqps">
    DONUT CHART
</div>

<h3>Number of Answers per Question</h3>

<div id="avgapq">
    DONUT CHART
</div>

<h3>Number of Male and Female Registered Users</h3>

<div id="mvf1">
    PIE CHART
</div>

<h3>Male and Female Registered User Site Activity</h3>

<div id="mvf2">
    SIDE-BY-SIDE COLUMN CHART
</div>
</div></div>
<br />

