<!-- <div id="chart-datamotor" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var motor = <?php echo $motor; ?>;
		var chartTa = new Highcharts.Chart
		({
			chart:{ type: 'column',renderTo : 'chart-datamotor' },
			title: { text: 'Average Motor ON Time' },
			series: [{
				showInLegend: false,
				data: motor
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
				title: { text: 'time (sec)' }
				},
			credits: { enabled: false }
		});

	</script>
</div> -->

<div id="chart-datamotor" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var motor = <?php echo $motor; ?>;
		var chartT = new Highcharts.Chart
		({
			chart:{ renderTo : 'chart-datamotor' },
			title: { text: 'Average Motor ON Time' },
			series: [{ type: 'areaspline', name: 'time (sec)', data: motor}],
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
				title: { text: 'time (sec)' }
				},
			credits: { enabled: false }
		});
	</script>
</div>
		
		
		
		
		