<div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded">
      <div class="card-body">
        <div class="row">
          <?php
            if (end($motor)) {
              $val='ON';
              $src='images\file-icons\on.png';
            } else {
              $val='OFF';
              $src='images\file-icons\off.png';
              
            }
          ?>
          <div  style="text-align: center;">
            <br/>
            <br/>
            <p style="font-size: calc(100% + 1vw);">Motor Status</p>
            <br/>
            <div> <img src=<?php echo $src ?> width="50%"></div>
              <div >
                <h4 class="mb-0 fw-bold" style="font-size: calc(150% + .2vw);">Turned <?php echo $val; ?></h4>
              </div>
            <br/>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
