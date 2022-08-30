        <title>Automatic Plant Watering System</title>
		<meta charset="utf-8" http-equiv="refresh" content="1000">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Script for updating pages without refreshing the page -->
		<script src="jquery.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		
		<?php
		//Creates new record as per request
		//Connect to database
		$hostname = "localhost";		//example = localhost or 192.168.0.0
		$username = "root";		//example = root
		$password = "";	
		$dbname = "test";
		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed !!!");
		}
		?>

		<?php
		$sql2= "SELECT average_temp, average_moisture,average_humidity,motor_daily,energy_daily,Date FROM table_average order by Date desc limit 7";

		$result = mysqli_query($conn, $sql2); //nodemcu_ldr_table = Youre_table_name;
		while ($data = $result->fetch_assoc()){
			$sensor_data[] = $data;
		}
		
		$readings_time = array_column($sensor_data, 'Date');
		$temperature = json_encode(array_reverse(array_column($sensor_data, 'average_temp')), JSON_NUMERIC_CHECK);
		$moisture = json_encode(array_reverse(array_column($sensor_data, 'average_moisture')), JSON_NUMERIC_CHECK);
		$humidity = json_encode(array_reverse(array_column($sensor_data, 'average_humidity')), JSON_NUMERIC_CHECK);
		$motor = json_encode(array_reverse(array_column($sensor_data, 'motor_daily')), JSON_NUMERIC_CHECK);
		$energy = json_encode(array_reverse(array_column($sensor_data, 'energy_daily')), JSON_NUMERIC_CHECK);
		$reading_time = json_encode(array_reverse($readings_time), JSON_NUMERIC_CHECK);
		?>

		  	<!-- Required meta tags -->
  
  			<!-- plugins:css -->
  			<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  			<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  			<link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  			<!-- endinject -->

  			<!-- inject:css -->
  			<link rel="stylesheet" href="css/vertical-layout-light/style.css">
  			<!-- endinject -->
  			<link rel="shortcut icon" href="images/favicon.png" />