<!DOCTYPE html>
<html lang="en">
<head>
<?php include('partials/nodemcu-head.php') ?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('partials/navbar.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('partials/settings-panel.php') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include('partials/sidebar.php') ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class=" grid-margin stretch-card">
              <div class="card">
                <div class="card-body" >
                  <?php include('partials/data-moisture-graph.php') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('partials/footer.php') ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <!-- inject:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <!-- endinject -->
</body>

</html>
