<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ingredient";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$in1 = $row['in1'];	
$in1num = $row['in1num'];
$in2 = $row['in2'];	
$in2num = $row['in2num'];
$in3 = $row['in3'];	
$in3num = $row['in3num'];
$in4 = $row['in4'];	
$in4num = $row['in4num'];
$in5 = $row['in5'];	
$in5num = $row['in5num'];


?>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  

      function drawChart() {
	    
		
        var data = google.visualization.arrayToDataTable([
          ['최준석', '피자'],
          ['<?=$in1?>', <?=$in1num?>],
          ['<?=$in2?>', <?=$in2num?>],
          ['<?=$in3?>',<?=$in3num?>],
          ['<?=$in4?>', <?=$in4num?>],
          ['<?=$in5?>', <?=$in5num?>]
        ]);

        var options = {
          title: '최준석 제작 피자'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>



