<?php
/**
 * Created by PhpStorm.
 * User: Barisi
 * Date: 09/10/2015
 * Time: 14:44
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/pi-temp-display/classes/models/Readings.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/chart-custom.css">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Chart.js"></script>
</head>
<header class="jumbotron"><h1>Temperature History</h1></header>
<body class="container">
    <section class="col-lg-12">
        <h2>Temperature (Last 24 hours)</h2>
        <div id="canvas-holder">
            <canvas id="temperature-chart" width="450" height="200"></canvas>
        </div>
    </section>
    <section class="col-lg-12">
        <?php
            $readingObject = new Readings();
            $reading = $readingObject->getReadings(24);
        ?>
    </section>
    <script>
        var lineChartData = {
            labels: [
                <?php
                  foreach ($reading as $row) {
                      print "'" . date('d-m-Y G:i:s', strtotime($row['timestamp'])) . "', ";
                  }
              ?>
            ],
            datasets: [{
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                    <?php
                        foreach ($reading as $row) {
                            print $row['temperature'] . ", ";
                        }
                    ?>
                ]
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("temperature-chart").getContext("2d");
            window.myLine = new Chart(ctx).Line(lineChartData, {
                responsive: true
            });
        };
    </script>
</body>
</html>
