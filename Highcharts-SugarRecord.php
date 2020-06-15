<?php
session_start();
if(isset($_SESSION["uid"])==false)
{
    header("location:Index.html"); 
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>HighCharts</title>
    </head>
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/highcharts.js"></script>
    <script type="text/javascript" src="JS/exporting.js"></script>
    <script type="text/javascript" src="JS/bootstrap.js"></script>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <style type="text/css">
        body {
            background-color: blanchedalmond;
            background-attachment: fixed;
        }

        #pid {
            line-height: 10px;
            width: 150px;
        }
        
        text{
            font-family: cursive;
            font-size: 15px;
            color: black;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            fetchdata();

            function fetchdata() {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 500,
                        shadow: true
                    },
                    title: {
                        text: 'Sugar Record'
                    },
                    subtitle: {
                        text: '@Health-Care'
                    },
                    xAxis: {
                        title: {
                            text: ''
                        },
                        categories: []

                    },
                    yAxis: {
                        title: {
                            text: ''
                        }
                    },
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.series.name + '</b><br/>' +
                                this.x + ': ' + this.y;
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -5,
                        y: 60,
                        borderWidth: 0,
                        backgroundColor: 'yellow',
                        borderColor: '#C98657',
                        borderWidth: 3,
                        borderRadius: 5,
                        enabled: true,
                        itemHoverStyle: {
                            color: '#FF0000',
                        }
                    },
                    series: [{},
                        {},
                        {}
                    ]
                }
                var url = "getSugarRecord.php";
                $.getJSON(url, function(json) {
                    //alert(JSON.stringify(json));

                    options.xAxis.categories = json[0]['data'];
                    options.series[0].data = json[1]['data'];
                    options.series[1].data = json[2]['data'];
                    options.series[2].data = json[3]['data'];

                    options.xAxis.title.text = json[0]['Date'];
                    options.yAxis.title.text = "Sugar Level";

                    options.series[0].name = json[1]['NormalLevel'];
                    options.series[1].name = json[2]['PrediabeticLevel'];
                    options.series[2].name = json[3]['DiabeticLevel'];

                    $('#container2').highcharts(options);

                });

            }
        });

    </script>

    <body>
        <div class="container-fluid">
            <?php include_once("header.php"); ?>
            <center>
                <div class="row col-md-6 mt-5" id="container2">
                </div>
            </center>
            <br><br>
            <?php include_once("footer.php"); ?>
        </div>
    </body>

    </html>
