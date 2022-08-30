<!-- <div id="chart-datatemperature" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var temperature = <?php echo $temperature; ?>;
		var chartTa = new Highcharts.Chart
		({
			chart:{ type: 'column',renderTo : 'chart-datatemperature' },
			title: { text: 'Average temperature &#176;C' },
			series: [{
				showInLegend: false,
				data: temperature
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
				title: { text: 'temperature &#176;C' }
				},
			credits: { enabled: false }
		});

	</script>
</div> -->
		

<div id="chart-datatemperature" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var temperature = <?php echo $temperature; ?>;
		var chartT = new Highcharts.Chart
		({
			chart:{ renderTo : 'chart-datatemperature' },
			title: { text: 'Average temperature Level' },
			series: [{ type: 'areaspline', name: 'temperature &#176;C', data: temperature}],
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
				title: { text: 'temperature &#176;C' }
				},
			credits: { enabled: false }
		});
	</script>
</div>
		




