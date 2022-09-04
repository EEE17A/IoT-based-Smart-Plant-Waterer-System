<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <!-- <meta charset="utf-8"  http-equiv="refresh" content="7"> -->
  <meta charset="utf-8" >

 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Automatic Plant Watering System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <script src="vendors/progressbar.js/progressbar.min.js"></script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!-- endinject -->
		
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

		$sql2= "SELECT * FROM fatin1 ORDER BY timestamp desc limit 14";

		$result = mysqli_query($conn, $sql2); //nodemcu_ldr_table = Youre_table_name;
    
		while ($data = $result->fetch_assoc()){
			$sensor_data[] = $data;
      
		}
		
		$lasttime = array_reverse(array_column($sensor_data, 'timestamp'));
		$timelive = json_encode($lasttime, JSON_NUMERIC_CHECK);
		$moisture = array_reverse(array_column($sensor_data, 'moisture'));
		$temperature= array_reverse(array_column($sensor_data, 'temperature'));
    $humidity = array_reverse(array_column($sensor_data, 'humidity'));
    $rain= array_reverse(array_column($sensor_data, 'rain'));
		$motor= array_reverse(array_column($sensor_data, 'motor'));
    $temperaturelive= json_encode( $temperature, JSON_NUMERIC_CHECK);
    $moisturelive = json_encode($moisture, JSON_NUMERIC_CHECK);
	?>
</head>
<body>
  <div class="container-scroller">
  
    <!-- partial:partials/_navbar.html -->
    <?php include('partials/navbar.php') ?>
    <!-- end -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('partials/settings-panel.php') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include('partials/sidebar.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <?php include('partials/main-panel.php') ?>
          <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
  <!-- container-scroller -->



  <script src="js/progress.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

