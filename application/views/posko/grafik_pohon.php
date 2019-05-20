<div class="container-fluid">

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
                 </div>			
				 <div class="area-diagram-pohon">
				    <canvas width="1000" height="300" id="chart-statistik-pohon"></canvas>
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
		var id_pos ='<?php echo $this->id_posko;?>';
		
		function clear_chart_statistik_pohon() {
			$('.area-diagram-pohon').html('');
			var elm = '<canvas id="chart-statistik-pohon" height="300" width="1000"></canvas>';
			$('.area-diagram-pohon').append(elm);
		}
		
		function initialize_diagram_statistik_pohon(id_posko = id_pos) {
		var data = {'id_posko': id_posko};
		var url  = base_url+'posko/diagrampohon/';
		
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
		
