
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="<?php echo base_url('adminBSB/images/'.$poster); ?>" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
					<?php
						$cek = $this->db->query('Select * from tbl_event, tbl_pengguna WHERE tbl_pengguna.id_pengguna='.$id_pengguna.' group by tbl_pengguna.id_pengguna');
						foreach ($cek->result() as $row) {
						?>
						<h4><?php echo $judul_event ?></h4>
                         <p><i class="fa fa-user"></i> Oleh <?php echo $row->nama; ?> 
											<?php } ?>

                </p>
                <p><i class="fa fa-calendar"></i> Diterbitkan <?php echo parse_time($tgl_event,'d F Y'); ?> pukul <?php echo parse_time($jam_event,'H:i') ; ?> WIB</p>
                <hr>
                        <p align="justify"><?php echo $keterangan_event ?></p>
                        <hr>
						<p><i class="fa fa-thumb-tack"></i> Dilaksanakan pada hari <?php echo $hari_event; ?> 		
						<p><i class="fa fa-calendar"></i> Tanggal <?php echo parse_time($tanggal_event,'d F Y'); ?> pukul <?php echo parse_time($waktu_event,'H:i') ; ?> WIB</p>
						<p><i class="fa fa-chevron-right"></i> Status <span class="label bg-light-blue"><?php echo $status; ?> </span> </p>
                        <div class="space-ten"></div>
                       
                    </div>
					<hr>
					<div class="header">
                            <h4>
                                Lokasi Event
                            </h4>
                        </div>
						<div class="form-group">
                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
							<input type="hidden" name="latitude_event" id="latitude_event" value="<?php echo $latitude_event; ?>">
							<input type="hidden" name="longitude_event" id="longitude_event" value="<?php echo $longitude_event; ?>">
                            </div>
					 <div class="btn-ground">
                        <a href="<?php echo base_url();?>posko/adopsipohon/<?php echo $id_event; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Adopsi Pohon</a>
                        </div>
						
		<script src="<?php echo base_url(); ?>adminBSB/js/maap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
