<div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded">
      <div class="card-body">
        <div class="row">
        <?php
            if (end($rain)) {
              $val='Not Raining';
              
            } else {
              $val='Raining';
            }
          ?>
            <div  style="text-align: center;">
              <br/>
              <br/>
              <p style="font-size: calc(100% + 1vw);">Rain Sensor</p>
              <br/>
              <br/>
              <div> <img src="images\file-icons\rain.png" width="50%"></div>
              <br/>
              <br/>
            
                <div >
                  <h4 class="mb-0 fw-bold" style="font-size: calc(150% + .2vw);">Currently it is <?php echo $val; ?></h4>
                </div>
              <br/>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>