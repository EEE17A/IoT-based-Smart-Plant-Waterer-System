<div class="col-md-6 col-lg-12 grid-margin stretch-card">
  <div class="card card-rounded">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
            <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
            <div style="text-align: center;">
              <br/>
              <p style="font-size: calc(150% + .2vw);">Temperature</p>
              <h4 class="mb-0 fw-bold" style="font-size: calc(150% + .2vw);"><?php echo end($temperature); ?> &degC</h4>
            </div>
            <br/>
        </div>
        <div class="col-sm-6">
          <div id="visitperday" class="progressbar-js-circle pr-2"></div>
          <div  style="text-align: center;">
            <br/>
            <p  style=" font-size: calc(150% + .2vw);">Humidity</p>
            <h4 class="mb-0 fw-bold" style="font-size: calc(150% + .2vw);"><?php echo end($humidity); ?> </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>