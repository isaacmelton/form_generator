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
            data: {aid: <?php echo $author_id; ?>, purpose: 'author'},
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

<h1>About AUTHOR'S surveys</h1>

<p>
    If the author has created less than three surveys, indicate statistics 
    may be a little wonky...
</p>

<h3>Number of Survey Takers for Top Five Surveys</h3>

<p>
    Bar Graph
</p>

<h3>Number of Registered Takers and Anonymous Takers</h3>

<p>
    Bar Graph
</p>

<h3>Number of Survey Takers for Each Survey</h3>

<p>
    3d Pie Graph
</p>

<h3>Average Number of Questions Per Survey</h3>

<p>
    Donut Graph
</p>

<h3>Average Number of Answers Per Question</h3>
    3d Pie Graph
<p>
    
</p>



