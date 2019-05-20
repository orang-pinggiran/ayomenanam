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
	
	    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>GRAFIK TRANSAKSI POHON</h2>
                        </div>
                    </div>
                </div>
                <div class="body">
				<div class="col-sm-2">
					<select class="form-control show-tick filter-bulan">
                        <option value="all">Semua Bulan</option>
						<?php 
                        $posko = $this->db->query('Select * from tbl_posko, tbl_pohon where tbl_posko.id_posko=tbl_pohon.id_posko GROUP BY tbl_posko.id_posko');
                        foreach ($posko->result() as $row ) {
						?>
						<option value="<?php echo $row->id_posko;?>"><?php echo $row->nama_posko;?></option>
                        <?php }?>						
                    </select>
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
				 <div class="area-transaksi-pohon">
				    <canvas width="1000" height="300" id="chart-transaksi-pohon"></canvas>
			  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->

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
		
		<script>
		var base_url='<?php echo base_url();?>';
		
		function clear_chart_grafik_pohon() {
			$('.area-transaksi-pohon').html('');
			var elm = '<canvas id="chart-transaksi-pohon" height="300" width="1000"></canvas>';
			$('.area-transaksi-pohon').append(elm);
		}
		
		function initialize_transaksi_pohon(tanggal = 'all' , id_posko = 'all') {
		var data = {'id_posko': id_posko};
		var data = {'tanggal': tanggal};
		var url  = base_url+'admin/diagramtransaksi/';
		
		$.post(url, data).done(function(res) {
			var chart_data = $.parseJSON(res); 
			var ctx        = document.getElementById("chart-transaksi-pohon");
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
								labelString: '- Tanggal -'
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
	
	initialize_transaksi_pohon();
	
	$(document).ready(function() {
	$('.filter-posko').on('change', function() {
		var id_posko  = $(this).find(':selected').val();
		clear_chart_transaksi_pohon();		
		initialize_transaksi_pohon();
	});
})
		</script>
		
