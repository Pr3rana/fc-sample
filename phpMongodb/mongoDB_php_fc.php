<?php
require 'C:\xampp\htdocs\phpMongodb\vendor\autoload.php';

    $connection = new MongoDB\Client;
    $db = $connection->myProject;
    $myObj = $db->chartData->find();

    //convert mongoCursor into an array
    $data=iterator_to_array($myObj);
    asort($data);
    /*
        Include the `fusioncharts.php` file that contains functions to embed the charts.
    */
    include("fusioncharts/fusioncharts.php");
?>
<html>
    <head>
        <title>FusionCharts XT   Simple Line Chart with XML Data</title>
        <!--   Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>
    </head>
    <body>
        <?php

        $arrData = array(
            "chart" => array(
                "caption"=> "Comparison of Petrol and Diesel price",
                "xAxisname"=> "Month",
                "yAxisName"=> "Price",
                "plotFillAlpha"=> "80",
                "showValues"=> "0",
                "placeValuesInside"=> "1",
                "usePlotGradientColor"=> "0",
                "rotateValues"=> "1",
                "valueFontColor"=> "#FFFFFF",
                "showHoverEffect"=> "1",
                "rotateValues"=> "1",
                "showXAxisLine"=> "1",
                "xAxisLineThickness"=> "1",
                "xAxisLineColor"=> "#999999",
                "showAlternateHGridColor"=> "0",
                "legendBgAlpha"=> "0",
                "legendBorderAlpha"=> "0",
                "legendShadow"=> "0",
                "legendItemFontSize"=> "10",
                "legendItemFontColor"=> "#666666",
                "theme"=> "fint"
                )
            );

            $categoryArray=array();
            $dataseries1=array();
            $dataseries2=array();


            foreach ($data as $dataset) {

                    array_push($categoryArray, array(
                      "label" => $dataset["month"]
                    )
                );


                array_push($dataseries1, array(
                    "value" => $dataset["petrol"]
                    )
                );

                array_push($dataseries2, array(
                    "value" => $dataset["diesel"]
                    )
                );

            }

            $arrData["categories"]=array(array("category"=>$categoryArray));
            // creating dataset object
            $arrData["dataset"] = array(array("seriesName"=> "Petrol_price", "data"=>$dataseries1), array("seriesName"=> "Diesel_price",  "renderAs"=>"line", "data"=>$dataseries2));

            $jsonEncodedData = json_encode($arrData);
            // chart object
        $msChart = new FusionCharts("msline","chart1" , "100%", "400", "chart-container", "json",$jsonEncodedData);

        $msChart->render();

        ?>
        <div id="chart-container">Fusion Charts will render here</div>
    </body>
</html>
