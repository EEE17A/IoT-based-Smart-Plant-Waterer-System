<!-- <div id="chart-dataHumidity" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var humidity = <?php echo $humidity; ?>;
		var chartTa = new Highcharts.Chart
		({
			chart:{ type: 'column',renderTo : 'chart-dataHumidity' },
			title: { text: 'Average Humidity Level' },
			series: [{
				showInLegend: false,
				data: humidity
			}],
			plotOptions: {
				
				column: { animation: false,
		  		dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
			xAxis: {
				type: 'datetime',
				categories: reading_time
			},
			yAxis: {
				title: { text: 'Relative Humidity (%)' }
				},
			credits: { enabled: false }
		});

	</script>
</div> -->


<div id="chart-datahumidity" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var humidity = <?php echo $humidity; ?>;
		var chartT = new Highcharts.Chart
		({
			chart:{ renderTo : 'chart-datahumidity' },
			title: { text: 'Average Humidity Level' },
			series: [{ type: 'areaspline', name: 'Relative Humidity (%)', data: humidity}],
			plotOptions: {
				areaspline: {
					fillColor: {
						linearGradient: {x1: 0,y1: 0,x2: 0,y2: 1},
						stops: [
							[0, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get('rgba')],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {	radius: 4},
					lineWidth: 2,
					states: {hover: {lineWidth: 2}},
					threshold: null
				},
			},
			xAxis: {
				type: 'datetime',
				categories: reading_time
			},
			yAxis: {
				title: { text: 'Relative Humidity (%)' }
				},
			credits: { enabled: false }
		});
	</script>
</div>
		






