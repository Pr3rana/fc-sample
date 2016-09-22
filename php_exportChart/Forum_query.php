<?php

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

   include("fusioncharts/fusioncharts.php");


?>

<html>
   <head>
    <title>FusionCharts XT - Column 2D Chart - Data from a database</title>

    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->

    <script src="fusioncharts/fusioncharts.js"></script>
    <script type="text/javascript">
    function ExportMyChart() {
         var chartObject = FusionCharts('chartResumenCompletoID');
         if( chartObject.hasRendered() ) chartObject.exportChart({"exportAction":"save","exportFormat":"PNG"});
   }
</script>

  </head>

   <body>
    <?php

        // Form the SQL query that returns the top 10 most populous countries

            // The `$arrData` array holds the chart attributes and data
      $arrDataResumenCompleto = array(
        "chart" => array(
            "caption" => "",
            "theme" => "fint",
            "paletteColors" => "#989830",
            "yAxisName" => "Porcentaje Logro (%)",
            "xAxisName" => "",
            "yAxisMaxValue" => "100",
            "yAxisMinValue" => "0",
            "plotSpacePercent" => "40",
            "numberSuffix" => "%",
            "labelDisplay" => "auto",
            "useEllipsesWhenOverflow" => "0",
            "xAxisNameFontSize" => "13",
            "yAxisNameFontSize" => "13",
      "exportEnabled" => "1",
      "exportAtClientSide" => "0",
      "exportHandler" =>"http://localhost/myphp/php_fc/Sample/Query_Sample/php-export-handler/index.php",
      "exportAction" => "save",
      "exportShowMenuItem"=>'0',
      "exportFormat" => "png",
      "animation" => "0"
        )
    );

      $actualData = array(
                "Teenage" => 1250,
                "Adult" => 1463,
                "Mid-age" => 1050,
                "Senior" => 2910
            );

          $arrDataResumenCompleto["data"] = array();

          foreach ($actualData as $key => $value) {
                array_push($arrDataResumenCompleto['data'],
                    array(
                        'label' => $key,
                        'value' => $value
                    )
                );
            }



            /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */




            $jsonEncodedData = json_encode($arrDataResumenCompleto);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

            $columnChart = new FusionCharts("bar2d", "chartResumenCompletoID", "100%", "300", "chartResumenCompleto", "json", $jsonEncodedData);

            // Render the chart
            $columnChart->render();



    ?>
 <div class="apChart" id="<?php echo "chartResumenCompleto"; ?>"></div>
<input type="button" value="Export My Chart" onclick="ExportMyChart()" />

   </body>

</html>
