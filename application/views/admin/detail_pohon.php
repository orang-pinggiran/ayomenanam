
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <div class="row">
                    <div class="col-md-12 product_content">
					<?php 
						$nama_posko = $this->db->query('Select * from tbl_posko where id_posko='.$id_posko.'');
						foreach ($nama_posko->result() as $row ) {												   
					?>
						<h4>Detail Data Pohon</h4>
                         <p><i class="fa fa-institution"></i> Posko <?php echo strtolower($row->nama_posko); ?> 
						<?php } ?>
					</p>
					<?php 
						$nama_jenis_pohon = $this->db->query('Select * from jenis_pohon where id_jenis_pohon='.$id_jenis_pohon.'');
						foreach ($nama_jenis_pohon->result() as $row2 ) {												   
					?>
                <p><i class="fa fa-tree"></i> Jenis pohon <?php echo strtolower($row2->nama_jenis_pohon); ?></p>
						<?php } ?>
                <p><i class="fa fa-chevron-circle-right"></i> Jumlah pohon <?php echo $jumlah; ?></p>
				<hr>
					<div class="header">
                            <h4>
                                Lokasi Posko
                            </h4>
                        </div>
						<div class="form-group">
                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
							<?php 
							$alamat_posko = $this->db->query('Select * from tbl_posko where id_posko='.$id_posko.'');
							foreach ($alamat_posko->result() as $row3 ) {												   
							?>
							<input type="hidden" name="latitude_posko" id="latitude_posko" value="<?php echo $row3->latitude_posko; ?>">
							<input type="hidden" name="longitude_posko" id="longitude_posko" value="<?php echo $row3->longitude_posko; ?>">
							<?php } ?>
                            </div>
                    </div>

		<script src="<?php echo base_url(); ?>adminBSB/js/map.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
