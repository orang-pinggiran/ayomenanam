							<?php echo $this->session->flashdata('info'); ?>


		<?php 
		 $komunitas = $this->db->query('Select * from tbl_posko where id_pengguna='.$id_pengguna.'');
		if ($komunitas->num_rows()>0) {
		foreach ($komunitas->result() as $row) {
								?>
    
        <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                                UBAH DATA POSKO
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>posko/editposko">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_posko" name="nama_posko" value="<?php echo $row->nama_posko; ?>" class="form-control" placeholder="Nama posko">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No. telepon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tlp_posko" name="tlp_posko" value="<?php echo $row->tlp_posko; ?>" class="form-control" placeholder="Nomor telepon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="alamat_posko" name="alamat_posko" value="<?php echo $row->alamat_posko; ?>" class="form-control" placeholder="Alamat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label></label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
											<font color="red"><i><b>*)tandai alamat pada map diatas</i></b></font>
											<input type="hidden" name="latitude_posko" id="latitude_posko" value="<?php echo $row->latitude_posko; ?>">
											<input type="hidden" name="longitude_posko" id="longitude_posko" value="<?php echo $row->longitude_posko; ?>">
                                        </div>
										</div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_posko" name="id_posko" value="<?php echo $row->id_posko; ?>" class="form-control" placeholder="ID posko">										
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $row->id_pengguna; ?>" class="form-control" placeholder="ID pengguna">										
                                        </div>
                                    </div>
                                </div>
								
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
						 
                    </div>
                </div>
            </div>
			<?php }?>
			<?php
								
							}
							else
							{ 
						?>
						
						<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA POSKO
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>posko/saveposko">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_posko" name="nama_posko" class="form-control" placeholder="Nama posko">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No. telepon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tlp_posko" name="tlp_posko" class="form-control" placeholder="Nomor telepon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="alamat_posko" name="alamat_posko" class="form-control" placeholder="Alamat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label></label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
											<font color="red"><i><b>*)tandai alamat pada map diatas</i></b></font>
											<input type="hidden" name="latitude_posko" id="latitude_posko" >
											<input type="hidden" name="longitude_posko" id="longitude_posko" >
                                        </div>
										</div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_posko" name="id_posko" class="form-control" placeholder="ID posko">										
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="ID pengguna">										
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
						 
                    </div>
                </div>
            </div>
								
								<?php
							}
							
							?>


	
		<script src="<?php echo base_url(); ?>adminBSB/js/map.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>

