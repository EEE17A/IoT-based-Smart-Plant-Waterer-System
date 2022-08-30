<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Automatic Plant Watering System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
    <style>
                

                

                
                #content {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: stretch;
                    justify-content: center;

                    /*this centers the text vertically*/
                    align-items: center;

                }

                figure {
                    padding: 0px;
                    margin: 0;
                    -webkit-margin-before: 0;
                    margin-block-start: 0;
                    -webkit-margin-after: 0;
                    margin-block-end: 0;
                    -webkit-margin-start: 0;
                    margin-inline-start: 0;
                    -webkit-margin-end: 0;
                    margin-inline-end: 0
                }

                figure img {
                    display: block;
                    width: 100%;
                    height: auto;
                    border-radius: 4px;
                    margin-top: 8px;
                }

                @media (min-width: 800px) and (orientation:landscape) {
                    #content {
                        display:flex;
                        flex-wrap: nowrap;
                        align-items: stretch
                    }

                    figure img {
                        display: block;
                        max-width: 100%;
                        max-height: calc(100vh - 40px);
                        width: auto;
                        height: auto
                    }

                    figure {
                        padding: 0 0 0 0px;
                        margin: 0;
                        -webkit-margin-before: 0;
                        margin-block-start: 0;
                        -webkit-margin-after: 0;
                        margin-block-end: 0;
                        -webkit-margin-start: 0;
                        margin-inline-start: 0;
                        -webkit-margin-end: 0;
                        margin-inline-end: 0
                    }
                }

                section#buttons {
                    display: flex;
                    flex-wrap: nowrap;
                    justify-content: space-between
                }

                button {
                    display: block;
                    margin: 5px;
                    padding: 0 12px;
                    border: 0;
                    line-height: 28px;
                    cursor: pointer;
                    color: #fff;
                    background: #ff3034;
                    border-radius: 5px;
                    font-size: 16px;
                    outline: 0
                }


    </style>
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
        <section class="main">
            <div id="content">
                <figure>
                    <div id="stream-container" class="image-container hidden">
                        <div class="close" id="close-stream"></div>
                        <img id="stream" src="https://drive.google.com/uc?export=view&id=1CFC2tBdcMMtttn1Gn4YABQEwhaBVsgF_" width= "50%">
                    </div>
                    <br/>
                    <div id="face_enroll">Click to get Live Preview</div>
                    <button id="toggle-stream">Play</button> 
                    <button id="get-still">Image</button>
                  <div class="input-group" id="framesize-group">
                      <label for="framesize">Resolution : </label>
                      <select id="framesize" class="default-action">
                          <option value="10">UXGA(1600x1200)</option>
                          <option value="9" >SXGA(1280x1024)</option>
                          <option value="8">XGA(1024x768)</option>
                          <option value="7">SVGA(800x600)</option>
                          <option value="6">VGA(640x480)</option>
                          <option value="5" selected="selected" >CIF(400x296)</option>
                          <option value="4">QVGA(320x240)</option>
                          <option value="3">HQVGA(240x176)</option>
                          <option value="0">QQVGA(160x120)</option>
                      </select>
                  </div>

                </figure>
            </div>
        </section>
        <script>
          document.addEventListener('DOMContentLoaded', function (event) {
            var baseHost = 'http://192.168.137.118'
            var streamUrl = baseHost + ':81'

            const hide = el => {
              el.classList.add('hidden')
            }
            const show = el => {
              el.classList.remove('hidden')
            }

            const disable = el => {
              el.classList.add('disabled')
              el.disabled = true
            }

            const enable = el => {
              el.classList.remove('disabled')
              el.disabled = false
            }

            const updateValue = (el, value, updateRemote) => {
              updateRemote = updateRemote == null ? true : updateRemote
              let initialValue
              if (el.type === 'checkbox') {
                initialValue = el.checked
                value = !!value
                el.checked = value
              } else {
                initialValue = el.value
                el.value = value
              }

              if (updateRemote && initialValue !== value) {
                updateConfig(el);
              } else if(!updateRemote){
                if(el.id === "aec"){
                  value ? hide(exposure) : show(exposure)
                } else if(el.id === "agc"){
                  if (value) {
                    show(gainCeiling)
                    hide(agcGain)
                  } else {
                    hide(gainCeiling)
                    show(agcGain)
                  }
                } else if(el.id === "awb_gain"){
                  value ? show(wb) : hide(wb)
                } else if(el.id === "face_recognize"){
                  value ? enable(enrollButton) : disable(enrollButton)
                }
              }
            }

            function updateConfig (el) {
              let value
              switch (el.type) {
                case 'checkbox':
                  value = el.checked ? 1 : 0
                  break
                case 'range':
                case 'select-one':
                  value = el.value
                  break
                case 'button':
                case 'submit':
                  value = '1'
                  break
                default:
                  return
              }

              const query = `${baseHost}/control?var=${el.id}&val=${value}`

              fetch(query)
                .then(response => {
                  console.log(`request to ${query} finished, status: ${response.status}`)
                })
            }

            document
              .querySelectorAll('.close')
              .forEach(el => {
                el.onclick = () => {
                  hide(el.parentNode)
                }
              })

            // read initial values
            fetch(`${baseHost}/status`)
              .then(function (response) {
                return response.json()
              })
              .then(function (state) {
                document
                  .querySelectorAll('.default-action')
                  .forEach(el => {
                    updateValue(el, state[el.id], false)
                  })
              })

            const view = document.getElementById('stream')
            const viewContainer = document.getElementById('stream-container')
            const stillButton = document.getElementById('get-still')
            const streamButton = document.getElementById('toggle-stream')
            const enrollButton = document.getElementById('face_enroll')
            const closeButton = document.getElementById('close-stream')

            const stopStream = () => {
              window.stop();
              streamButton.innerHTML = 'Start Stream'
              view.src = `https://drive.google.com/uc?export=view&id=13EevXo-EPBb1TC3p8Wh-CJKmF_gkSVDK`
            }

            const startStream = () => {
              view.src = `${streamUrl}/stream`
              show(viewContainer)
              streamButton.innerHTML = 'Stop Stream'
            }

            // Attach actions to buttons
            stillButton.onclick = () => {
              stopStream()
              view.src = `${baseHost}/capture?_cb=${Date.now()}`
              show(viewContainer)
            }

            closeButton.onclick = () => {
              stopStream()
              hide(viewContainer)
            }

            streamButton.onclick = () => {
              const streamEnabled = streamButton.innerHTML === 'Stop Stream'
              if (streamEnabled) {
                stopStream()
              } else {
                startStream()
              }
            }

            enrollButton.onclick = () => {
              updateConfig(enrollButton)
            }

            // Attach default on change action
            document
              .querySelectorAll('.default-action')
              .forEach(el => {
                el.onchange = () => updateConfig(el)
              })

            // Custom actions
            // Gain
            const agc = document.getElementById('agc')
            const agcGain = document.getElementById('agc_gain-group')
            const gainCeiling = document.getElementById('gainceiling-group')
            agc.onchange = () => {
              updateConfig(agc)
              if (agc.checked) {
                show(gainCeiling)
                hide(agcGain)
              } else {
                hide(gainCeiling)
                show(agcGain)
              }
            }

            // Exposure
            const aec = document.getElementById('aec')
            const exposure = document.getElementById('aec_value-group')
            aec.onchange = () => {
              updateConfig(aec)
              aec.checked ? hide(exposure) : show(exposure)
            }

            // AWB
            const awb = document.getElementById('awb_gain')
            const wb = document.getElementById('wb_mode-group')
            awb.onchange = () => {
              updateConfig(awb)
              awb.checked ? show(wb) : hide(wb)
            }

            // Detection and framesize
            const detect = document.getElementById('face_detect')
            const recognize = document.getElementById('face_recognize')
            const framesize = document.getElementById('framesize')

            framesize.onchange = () => {
              updateConfig(framesize)
              if (framesize.value > 5) {
                updateValue(detect, false)
                updateValue(recognize, false)
              }
            }

            detect.onchange = () => {
              if (framesize.value > 5) {
                alert("Please select CIF or lower resolution before enabling this feature!");
                updateValue(detect, false)
                return;
              }
              updateConfig(detect)
              if (!detect.checked) {
                disable(enrollButton)
                updateValue(recognize, false)
              }
            }

            recognize.onchange = () => {
              if (framesize.value > 5) {
                alert("Please select CIF or lower resolution before enabling this feature!");
                updateValue(recognize, false)
                return;
              }
              updateConfig(recognize)
              if (recognize.checked) {
                enable(enrollButton)
                updateValue(detect, true)
              } else {
                disable(enrollButton)
              }
            }
          })
        </script>
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
