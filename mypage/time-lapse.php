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
        <div class="content-wrapper" >
          <div class="card-body">
          <div>
            <h4 class="card-title card-title-dash">Image Database of the garden</h4>
            <iframe src="https://drive.google.com/embeddedfolderview?id=1FQGq0fVafSRYyrJWMeM-dWxx8Jx9qDc9#grid" style="width:100%; height:600px; "></iframe>
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
  
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <script src="js/off-canvas.js"></script>

  <script src="js/todolist.js"></script>
  <!-- inject:js -->
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <!-- endinject -->
</body>

</html>
