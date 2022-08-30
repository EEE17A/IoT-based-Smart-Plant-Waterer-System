<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				color: #1f5380;
				font-family: monospace;
				font-size: 20px;
				text-align: left;
			} 
			th {
				background-color: #1f5380;
				color: white;
			}
			tr:nth-child(even) {background-color: #f2f2f2}
		</style>
	</head>
	<?php
		//Creates new record as per request
		//Connect to database
		$hostname = "localhost";		//example = localhost or 192.168.0.0
		$username = "root";		//example = root
		$password = "";	
		$dbname = "nodemcu_ldr";
		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed !!!");
		}
		
		
	?>
	<body>
		
		<?php
		$sql2= "SELECT No, Ldr,  TimeStamp FROM nodemcu_ldr_table order by TimeStamp desc limit 20";

		$result = mysqli_query($conn, $sql2); //nodemcu_ldr_table = Youre_table_name;
		while ($data = $result->fetch_assoc()){
			$sensor_data[] = $data;
		}
		
		$readings_time = array_column($sensor_data, 'TimeStamp');
		

		
		$value1 = json_encode(array_reverse(array_column($sensor_data, 'Ldr')), JSON_NUMERIC_CHECK);
		$reading_time = json_encode(array_reverse($readings_time), JSON_NUMERIC_CHECK);
		
		
		?>
    	<div id="chart-soilmoisture" class="container">
		<script>

			
			var value1 = <?php echo $value1; ?>;
			var reading_time = <?php echo $reading_time; ?>;


				var chartT = new Highcharts.Chart
				({
					  chart:{ renderTo : 'chart-soilmoisture' },
					  title: { text: 'Soil Moisture Level' },
					  series: [{
						showInLegend: false,
						data: value1
					  }],
					  
					  plotOptions: {
						line: { animation: false,
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
		
    	<br>
    	<br>
		
	</body>
</html>