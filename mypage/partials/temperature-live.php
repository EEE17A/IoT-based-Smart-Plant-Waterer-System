                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Temperature</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">Graph of 14 reading</h5>
                                  </div>
                                  
                                </div>
                                <div id="chart-temp" class="container">
	                                <br/>
	                                <br/>
	                                <script>
	                                	var value1 = <?php echo $temperaturelive; ?>;
	                                	var reading_time = <?php echo $timelive; ?>;
	                                	var chartT = new Highcharts.Chart
	                                	({
	                                		chart:{ renderTo : 'chart-temp' },
	                                		title: { text: 'Temperature' },
											series: [{ type: 'areaspline', name: 'Temperature', data: value1}],
	                                		plotOptions: {
												areaspline: {
													fillColor: {
														linearGradient: {x1: 0,y1: 0,x2: 0,y2: 1},
														stops: [
															[0, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get('rgba')],
															[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
														]
													},
													marker: {	radius: 4},
													lineWidth: 2,
													states: {hover: {lineWidth: 2}},
													threshold: null
												},
											},
	                                		xAxis: {
	                                			type: 'datetime',
	                                			categories: reading_time
	                                		},
	                                		yAxis: {
	                                			title: { text: 'Temperature &degC' }
	                                			},
	                                		credits: { enabled: false }
	                                	});
	                                </script>
                                </div>
                              </div>
                        </div>
                      </div>
                     



