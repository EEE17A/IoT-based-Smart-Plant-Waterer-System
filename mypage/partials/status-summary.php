<div class="col-md-6 col-lg-12 grid-margin stretch-card">
  <div class="card bg-primary card-rounded">
    <div class="card-body pb-0">
      <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
      <div class="row">
        <div class="col-sm-8">
        <p class="status-summary-ight-white">Last Recorded at</p>
        <h2 class="text-info"><?php echo end($lasttime); ?></h2>
        </div>
        <div class="col-sm-4">
          <div class="status-summary-chart-wrapper mb-1">
            <canvas id="status-summary"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>