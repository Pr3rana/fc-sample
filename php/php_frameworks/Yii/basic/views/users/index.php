<?php
	include("fusioncharts/fusioncharts.php");
?>

<html>

    <head>
        <title>FusionCharts XT - Simple Area 2D Chart with JSON Data</title>

        <!-- Include the correct path for `fusioncharts.js`  to render the chart. Otherwise, it may lead to JavaScript errors. -->
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.powercharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>

    </head>
    <body>
        <?php
            
            $arrData = array();

			// Creating XML elements
			$xml = new SimpleXMLElement('<xml/>');
			$chart      = $xml->addChild('chart');
			$categories = $chart->addChild('categories');
			$dataset     = $chart->addChild('dataset');
			
			foreach ($arrData as $key => $value) {

			    $chart->addAttribute($key,$value);

			}

			foreach ($users as $user) {

				$label =$user->label;
			    $value = $user->value;
			                   
			    $category = $categories->addChild('category');
			    $set      = $dataset->addChild('set');
			                       
			        $category->addAttribute('label',"$label");
			        $set->addAttribute('value',"$value");

			}      

                $xml_data = $xml->asXML();

                //minifying the xml code
                $xml_data = preg_replace("/\r\n|\r|\n|\<[\?\/]{0,1}xml[^>]*>/",'',$xml_data);

                // Instantiating a FusionCharts Angular Gauge
                $radar_chart = new FusionCharts("radar", "myFirstChart" , 600, 300, "chart-1", "xml",$xml_data);

                // Render the instantiated chart
                $radar_chart->render();

               

         
        ?>
    <div id="chart-1">Fusion Charts will render here</div>
   </body>
</html>
