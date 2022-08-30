<!-- <div id="chart-dataEnergy" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var energy = <?php echo $energy; ?>;
		var chartTa = new Highcharts.Chart
		({
			chart:{ type: 'column',renderTo : 'chart-dataEnergy' },
			title: { text: 'Daily Electrical Energy Usage' },
			series: [{
				showInLegend: false,
				data: energy
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
				title: { text: 'Electrical Energy (kWh)' }
				},
			credits: { enabled: false }
		});

	</script>
</div> -->

<div id="chart-dataenergy" class="container" style="height: 600px">
	<br/>
	<br/>
	<script>
		var reading_time = <?php echo $reading_time; ?>;
		var energy = <?php echo $energy; ?>;
		var chartT = new Highcharts.Chart
		({
			chart:{ renderTo : 'chart-dataenergy' },
			title: { text: 'Daily Electrical Energy Usage' },
			series: [{ type: 'areaspline', name: 'Electrical Energy (kWh)', data: energy}],
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
				title: { text: 'Electrical Energy (kWh)' }
				},
			credits: { enabled: false }
		});
	</script>
</div>
		
		
		