<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
include("fusioncharts/fusioncharts.php");
use Cake\Core\Configure;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>


                <html>

                    <head>
                        <title>FusionCharts XT - Simple Area 2D Chart with JSON Data</title>

                        <!-- Include the correct path for `fusioncharts.js`  to render the chart. Otherwise, it may lead to JavaScript errors. -->
                        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>

  <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>

                    </head>
                    <body>
                        <?php
                            //Connecting to the database.
                                $driver = new Mysql([
                                    'database' => 'new_database',
                                    'username' => 'my_app',
                                    'password' => ''
                                ]);
                                $connection = new Connection([
                                    'driver' => $driver
                                ]);

                            //creating chart_object
                            $arrData = array(

                                "caption" => "Top 5 Stores by Sales",
                                "subcaption" => "Last month",
                                "yaxisname" => "Sales (In USD)",
                                "numberprefix" => "$",
                                //"gaugeFillMix" => "{light-10},{light-20},{light-60}",
                                "bgcolor" => "#ffffff",
                                "showborder" => "0",
                                "showcanvasborder" => "0",
                                "useplotgradientcolor" => "1",
                                "plotborderalpha" => "10",
                                "placevaluesinside" => "1",
                                "valuefontcolor" => "#ffffff",
                                "showaxislines" => "1",
                                "axislinealpha" => "25",
                                "divlinealpha" => "10",
                                "exportEnabled" => "1",
                                "exportAtClientSide" => "1",
                                "exportHandler" => "http://localhost/myphp/php_fc/angulargauge/FCExporter.php",
                                "exportAction" => "download",
                                "aligncaptionwithcanvas" => "0",
                                "showalternatevgridcolor" => "0",
                                "captionfontsize" => "14",
                                "subcaptionfontsize" => "14",
                                "subcaptionfontbold" => "0",
                                "tooltipcolor" => "#ffffff",
                                "tooltipborderthickness" => "0",
                                "tooltipbgcolor" => "#000000",
                                "tooltipbgalpha" => "80",
                                "tooltipborderradius" => "2",
                                "tooltippadding" => "5"

                        );

                           $colorCode = array("#DA6933", "#E6B837", "#6FA317");

                            // Creating XML elements
                            $xml = new SimpleXMLElement('<xml/>');

                            $chart      = $xml->addChild('chart');
                            $colorrange = $chart->addChild('colorrange');
                            $dials      = $chart->addChild('dials');

                            foreach ($arrData as $key => $value) {

                                $chart->addAttribute($key,$value);

                            }
                            // fetching data from angular_data table

                            $i =0;
                            $statement = $connection->execute('SELECT * FROM angular_data');

                            while($row = $statement->fetch('assoc')) {
                                //echo $row['minvalue'] . PHP_EOL;

                                $minvalue = $row['minvalue']. PHP_EOL;
                                $maxvalue = $row['maxvalue']. PHP_EOL;
                               // $code     = $row['code'];
                                $dialValue    = $row['value']. PHP_EOL;
                                $color = $colorrange->addChild('color');
                                    $color->addAttribute('minvalue',"$minvalue");
                                    $color->addAttribute('maxvalue',"$maxvalue");

                                    $color->addAttribute('code',$colorCode[$i]);
                               $i++;

                            }
                                $dial = $dials->addChild('dial');
                                $dial->addAttribute('value',"$dialValue ");

                            $xml_data = $xml->asXML();

                            //minifying the xml code
                            $xml_data = preg_replace("/\r\n|\r|\n|\<[\?\/]{0,1}xml[^>]*>/",'',$xml_data);

                            // Instantiating a FusionCharts Angular Gauge
                            $angulargauge = new FusionCharts("angulargauge", "myFirstChart" , 600, 300, "chart-1", "xml",$xml_data);

                            // Render the instantiated chart
                            $angulargauge->render();
                        ?>
                    <div id="chart-1">Fusion Charts will render here</div>
                   </body>
                </html>
