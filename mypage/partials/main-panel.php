
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                        <?php include('partials/moisture-live.php') ?>
                        <div class="col-lg-4 d-flex flex-column">
                            <div class="row flex-grow">
                                <?php include('partials/status-summary.php') ?>
                                <?php include('partials/temp-humid-card.php') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                            <?php include('partials/temperature-live.php') ?>
                        </div>
                        
                        <div class="row flex-grow">
                            <?php include('partials/last-image.php') ?>
                        <div class="row flex-grow">
                            <?php include('partials/image-database.php') ?>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <?php include('partials/moisture-card.php') ?>
                        <?php include('partials/motor-card.php') ?>
                        
                        <?php include('partials/rain-card.php') ?>
                        <?php include('partials/add-feature.php') ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('partials/footer.php') ?>
        <!-- partial -->
      </div>
        
      