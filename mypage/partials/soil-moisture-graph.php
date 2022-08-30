<div id="chart-soilmoisture" class="container">

	<br/>
	<br/>
	<script>
		var value1 = <?php echo $value1; ?>;
		var reading_time = <?php echo $reading_time; ?>;
		var chartT = new Highcharts.Chart
		({
			chart:{ type: 'column',renderTo : 'chart-soilmoisture' },
			title: { text: 'Soil Moisture Level' },
			series: [{
				showInLegend: false,
				data: value1
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
				title: { text: 'Relative Moisture' }
				},
			credits: { enabled: false }
		});
	</script>
			
</div>