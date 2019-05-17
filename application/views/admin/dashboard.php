<div class="container-fluid">
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">
                    <div class="text">KOMUNITAS</div>
					<?php
						$cek = $this->db->query('Select count(id_pengguna) AS jumlah from tbl_pengguna where level="2" ');
						foreach ($cek->result() as $row) {
								?>
                    <div class="number count-to" data-from="0" data-to="<?php echo $row->jumlah; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $row->jumlah; ?></div>
						<?php } ?>
				</div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_balance</i>
                </div>
                <div class="content">
                    <div class="text">POSKO</div>
					<?php
						$cek2 = $this->db->query('Select count(id_pengguna) AS jumlah2 from tbl_pengguna where level="4" ');
						foreach ($cek2->result() as $row2) {
								?>
                    <div class="number count-to" data-from="0" data-to="<?php echo $row2->jumlah2; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $row2->jumlah2; ?></div>
						<?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
					<?php
						$cek3 = $this->db->query('Select count(id_pengguna) AS jumlah3 from tbl_pengguna where level="3" ');
						foreach ($cek3->result() as $row3) {
								?>                    
					<div class="text">PENGGUNA</div>
                    <div class="number count-to" data-from="0" data-to="<?php echo $row3->jumlah3; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $row3->jumlah3; ?></div>
						<?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>GRAFIK POHON</h2>
                        </div>
                    </div>
                </div>
                <div class="body">
				<div class="col-sm-2">
                    <select class="form-control show-tick filter-posko">
                        <option value="all">Semua Posko</option>
						<?php 
                        $posko = $this->db->query('Select * from tbl_posko, tbl_pohon where tbl_posko.id_posko=tbl_pohon.id_posko GROUP BY tbl_posko.id_posko');
                        foreach ($posko->result() as $row ) {
						?>
						<option value="<?php echo $row->id_posko;?>"><?php echo $row->nama_posko;?></option>
                        <?php }?>						
                    </select>
                 </div>			
				 <div class="area-diagram-pohon">
				    <canvas width="1000" height="300" id="chart-statistik-pohon"></canvas>
			  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
    <div class="row clearfix">
        <!-- Visitors -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-pink">
                    <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)"><canvas width="240" height="92" style="display: inline-block; width: 240px; height: 92px; vertical-align: top;"></canvas></div>
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                        </li>
                        <li>
                            YESTERDAY
                            <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                        </li>
                        <li>
                            LAST WEEK
                            <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Visitors -->
        <!-- Latest Social Trends -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-cyan">
                    <div class="m-b--35 font-bold">LATEST SOCIAL TRENDS</div>
                    <ul class="dashboard-stat-list">
                        <li>
                            #socialtrends
                            <span class="pull-right">
                                <i class="material-icons">trending_up</i>
                            </span>
                        </li>
                        <li>
                            #materialdesign
                            <span class="pull-right">
                                <i class="material-icons">trending_up</i>
                            </span>
                        </li>
                        <li>#adminbsb</li>
                        <li>#freeadmintemplate</li>
                        <li>#bootstraptemplate</li>
                        <li>
                            #freehtmltemplate
                            <span class="pull-right">
                                <i class="material-icons">trending_up</i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Latest Social Trends -->
        <!-- Answered Tickets -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-teal">
                    <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            YESTERDAY
                            <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST WEEK
                            <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST MONTH
                            <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST YEAR
                            <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            ALL
                            <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Answered Tickets -->
    </div>

    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>TASK INFOS</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Manager</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Task A</td>
                                    <td><span class="label bg-green">Doing</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Task B</td>
                                    <td><span class="label bg-blue">To Do</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Task C</td>
                                    <td><span class="label bg-light-blue">On Hold</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Task D</td>
                                    <td><span class="label bg-orange">Wait Approvel</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Task E</td>
                                    <td>
                                        <span class="label bg-red">Suspended</span>
                                    </td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
                    <h2>BROWSER USAGE</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="donut_chart" class="dashboard-donut-chart"><svg height="265" version="1.1" width="240" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.65625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#e91e63" d="M120,205.83333333333331A73.33333333333333,73.33333333333333,0,0,0,176.28111147618802,85.48708402170021" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#e91e63" stroke="#ffffff" d="M120,208.83333333333331A76.33333333333333,76.33333333333333,0,0,0,178.58352058203207,83.5638283680425L204.42166721428202,61.98062603255032A110,110,0,0,1,120,242.5Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00bcd4" d="M176.28111147618802,85.48708402170021A73.33333333333333,73.33333333333333,0,0,0,59.265442447673244,91.40144410443494" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00bcd4" stroke="#ffffff" d="M178.58352058203207,83.5638283680425A76.33333333333333,76.33333333333333,0,0,0,56.78084691144169,89.72013954507091L33.039156231895774,73.65434042225911A105,105,0,0,1,200.58431870454194,65.18605212197984Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#ff9800" d="M59.265442447673244,91.40144410443494A73.33333333333333,73.33333333333333,0,0,0,57.20809660165833,170.380795205369" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#ff9800" stroke="#ffffff" d="M56.78084691144169,89.72013954507091A76.33333333333333,76.33333333333333,0,0,0,54.63933691718073,171.9304641001341L30.093411043283524,186.73841131677833A105,105,0,0,1,33.039156231895774,73.65434042225911Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#009688" d="M57.20809660165833,170.380795205369A73.33333333333333,73.33333333333333,0,0,0,102.08771840330716,203.6120801677082" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#009688" stroke="#ffffff" d="M54.63933691718073,171.9304641001341A76.33333333333333,76.33333333333333,0,0,0,101.35494324707882,206.52121072002353L94.35286953200799,234.31956933103675A105,105,0,0,1,30.093411043283524,186.73841131677833Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#607d8b" d="M102.08771840330716,203.6120801677082A73.33333333333333,73.33333333333333,0,0,0,119.97696165425272,205.8333297144784" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#607d8b" stroke="#ffffff" d="M101.35494324707882,206.52121072002353A76.33333333333333,76.33333333333333,0,0,0,119.97601917647215,208.83332956643434L119.96701327768002,237.49999481845774A105,105,0,0,1,94.35286953200799,234.31956933103675Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="120" y="122.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.6667,0,0,1.6667,-79.9948,-89)" stroke-width="0.6000000000000001"><tspan dy="6" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Chrome</tspan></text><text x="120" y="142.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.5278,0,0,1.5278,-63.3292,-70.9861)" stroke-width="0.6545454545454545"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">37%</tspan></text></svg></div>
                </div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
    </div>
</div>

        <!-- Grafik Js -->
        <script src="<?php echo base_url(); ?>adminBSB/js/chart.bundle.js"></script>
		
		<script>
		var base_url='<?php echo base_url();?>';
		
		function clear_chart_statistik_pohon() {
			$('.area-diagram-pohon').html('');
			var elm = '<canvas id="chart-statistik-pohon" height="300" width="1000"></canvas>';
			$('.area-diagram-pohon').append(elm);
		}
		
		function initialize_diagram_statistik_pohon(id_posko = 'all') {
		var data = {'id_posko': id_posko};
		var url  = base_url+'admin/diagrampohon/';
		
		$.post(url, data).done(function(res) {
			var chart_data = $.parseJSON(res); 
			var ctx        = document.getElementById("chart-statistik-pohon");
			var myChart    = new Chart(ctx, {
				type: 'line',
				animation: true,
				data: chart_data,
				barValueSpacing: 5,
				barDatasetSpacing: 4,
				options: {
					legend: {
						position: "bottom",
						display:true
					},
					animation: {
						onProgress: function() {
							var ctx = this.chart.ctx;
							var y = this.scales['y-axis-0'].height + this.scales['y-axis-0'].top + 80;
							ctx.fillText('', 50,y);
						},
					},
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: false,
					},
					scales: {
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: '- Jenis Pohon -'
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: '- Jumlah Pohon -'
							},
							ticks: {
							   stepSize: 5,
							   beginAtZero: true
							}
						}]
					},
					hover: {
						onHover: function(e) {
							var point = this.getElementAtEvent(e);
							if (point.length) e.target.style.cursor = 'pointer';
							else e.target.style.cursor = 'default';
						}
					}
				}
			});

			myChart.clear();
		});
	}
	
	initialize_diagram_statistik_pohon();
	
	$(document).ready(function() {
	$('.filter-posko').on('change', function() {
		var id_posko  = $(this).find(':selected').val();
		clear_chart_statistik_pohon();		
		initialize_diagram_statistik_pohon(id_posko);
	});
})
		</script>
		
