							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                               UBAH DATA EVENT
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>komunitas/editevent" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Judul event</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="judul_event" name="judul_event" value="<?php echo $judul_event; ?>" class="form-control" placeholder="Judul event">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Tempat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tempat_event" name="tempat_event" value="<?php echo $tempat_event; ?>" class="form-control" placeholder="Tempat">
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
											<input type="text" name="latitude_event" id="latitude_event" value="<?php echo $latitude_event; ?>">
											<input type="text" name="longitude_event" id="longitude_event" value="<?php echo $longitude_event; ?>">
                                        </div>
										</div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Hari</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="hari_event" name="hari_event" value="<?php echo $hari_event; ?>" class="form-control" placeholder="Hari">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Tanggal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" id="tanggal_event" name="tanggal_event" value="<?php echo $tanggal_event; ?>" class="form-control" placeholder="Tanggal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Pukul</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" id="waktu_event" name="waktu_event" value="<?php echo $waktu_event; ?>" class="form-control" placeholder="Pukul">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
									 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Keterangan</label>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        <div class="form-line">
										<textarea rows="5" class="form-control no-resize" id="keterangan_event" name="keterangan_event" placeholder="Keterangan"><?php echo $keterangan_event; ?></textarea>										
                                        </div>
										</div>
                                    </div>
                                </div>	
								<div class="row clearfix">
									 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Status</label>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<div class="demo-radio-button">
										<input name="status_event" type="radio" class="with-gap" id="radio_3" value="Belum berlangsung" />
										<label for="radio_3">Belum berlangsung</label>
										<input name="status_event" type="radio" id="radio_4" class="with-gap" value="Berlangsung" />
										<label for="radio_4">Berlangsung</label>
										<input name="status_event" type="radio" id="radio_5" class="with-gap" value="Selesai" />
										<label for="radio_5">Selesai</label>
									</div>
										</div>
                                    </div>
                                </div>	
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Poster</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" id="poster" name="poster" value="<?php echo $poster; ?>" class="form-control" placeholder="Poster">
                                            </div>
												 <div>
										<?php 
										if ($poster == '') {
												# code...
										} else {
											?>
											*) Poster sebelumnya <br> 
											<img src="<?= base_url('adminBSB/images/'.$poster) ?>" width='90' height='90'>
											<?php
										}
										?>
									</div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_event" name="id_event" value="<?php echo $id_event; ?>" class="form-control" placeholder="ID event">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										
										 <input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="ID pengguna">
										 <input type="hidden" id="tgl_event" name="tgl_event" value="<?php echo $tgl_event; ?>" class="form-control" placeholder="Tanggal">
										 <input type="hidden" id="jam_event" name="jam_event" value="<?php echo $jam_event; ?>" class="form-control" placeholder="Jam">
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
            <!-- #END# Horizontal Layout -->

    



    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>adminBSB/js/pages/tables/jquery-datatable.js"></script>

		<script src="<?php echo base_url(); ?>adminBSB/js/maap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
