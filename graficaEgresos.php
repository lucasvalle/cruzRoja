<?php 
require_once 'Template.php';
if(!isset($year))
    $year=date("Y");
include 'controller/GraficoAnualDeEgresos.php';

$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<script src="js/amcharts.js"></script>
<script src="js/serial.js"></script>
<script type="text/javascript">
 console.log(chartData)
AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "mes";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 90;
                categoryAxis.gridPosition = "start";

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "total";
                graph.balloonText = "[[category]]: <b>$[[value]]</b>";
                graph.labelText="$[[value]]";
                graph.labelPosition="top";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                graph.fillColorsField="blue";
                graph.fillColors="red";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";


                chart.write("grafico");
            });
        </script>
<!-- aqui inicia el contenido -->
<div class="row">
    <div class="col-lg-2 col-md-2 pull-right">
        <form action="">
            <input type="text" value="<?=$year?>" name="year" class="form-control col-lg-2" id="" placeholder="año">
        </form>
    </div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<h2>Grafica de Egresos <?=$year?></h2>
	</div>
	<div class="col-lg-12 col-md-12">
        <div id="grafico" style="width: 100%; height: 400px;"></div>
	</div>
</div>
<div id="view"></div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>