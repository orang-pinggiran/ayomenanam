
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <div class="row">
					<?php 
                    $poster = $this->db->query("Select * from tbl_event where id_event='$id_event'");
                    foreach ($poster->result() as $row1 ) {       
                    ?>
                    <div class="col-md-6 product_img">
                        <img src="<?php echo base_url('adminBSB/images/'.$row1->poster); ?>" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
						<h5>Detail Event</h5>
						<hr>
						<p><i class="fa fa-asterisk"></i> Nama event <?php echo $row1->judul_event ?></p>
                         <p><i class="fa fa-thumb-tack"></i> Lokasi <?php echo $row1->tempat_event; ?></p>
                         <p><i class="fa fa-calendar"></i> Tanggal <?php echo parse_time($row1->tanggal_event,'d F Y'); ?>,
						 pukul <?php echo parse_time($row1->waktu_event,'H:i') ; ?> WIB</p>
						<?php }?>
						<hr>
						<h5>Detail Adopsi</h5>
						<hr>
						
						<?php
						$pohon = $this->db->query('Select * from jenis_pohon WHERE id_jenis_pohon='.$id_jenis_pohon.' ');
						foreach ($pohon->result() as $row2) {
						?>
                         <p><i class="glyphicon glyphicon-shopping-cart"></i> Jenis adopsi <?php echo strtolower($jenis_adopsi); ?> </p>
                        <?php
						$posko = $this->db->query('Select * from tbl_posko WHERE id_posko='.$id_posko.' ');
						foreach ($posko->result() as $row4) {
						?>
						 <p><i class="fa fa-university"></i> Ambil dari posko <?php echo $row4->nama_posko; ?> </p>
						<?php } ?>
						 <p><i class="fa fa-tree"></i> Nama pohon <b><?php echo $nama_pohon; ?> </b> jenis pohon <?php echo strtolower($row2->nama_jenis_pohon); ?> dengan jumlah <?php echo $jumlah_pohon; ?></p>
						<?php }?>
                        <p><i class="fa fa-calendar"></i> Tanggal adopsi <?php echo parse_time($tgl_adopsi,'d F Y'); ?>, 
						pukul <?php echo parse_time($waktu_adopsi,'H:i') ; ?> WIB</p>
						<p><i class="fa fa-chevron-right"></i> Status <span class="label bg-light-blue"><?php echo strtolower($status_adopsi); ?> </span> </p>

                        <hr>
                        <div class="space-ten"></div>

					<div class="header">
                            <h5>
                                Lokasi Event
                            </h5>
                        </div>
					</div>
				      <div class="col-md-12 product_img">
						<div class="form-group">
                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
							<?php 
								$lokasi = $this->db->query("Select * from tbl_event where id_event='$id_event'");
								foreach ($lokasi->result() as $row3 ) {       
								?>
							<input type="hidden" name="latitude_event" id="latitude_event" value="<?php echo $row3->latitude_event; ?>">
							<input type="hidden" name="longitude_event" id="longitude_event" value="<?php echo $row3->longitude_event; ?>">
                            </div>
								<?php } ?>
								</div>
		<script src="<?php echo base_url(); ?>adminBSB/js/maap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
