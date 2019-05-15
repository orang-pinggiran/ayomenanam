							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PROFIL POSKO
                            </h2>
                        </div>
                        <div class="body">
                           <div class="row">
								<div class="col-xs-5 col-sm-2">
									<span>
										 <img src="<?php echo base_url('adminBSB/images/'.$foto); ?>" width='150' height='160' />
									</span>
								</div>
								<div class="col-xs-5 col-sm-9">
									
									<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama pengguna</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $nama; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $alamat; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
									
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No. Telepon</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $tlp; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>	

								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $email; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
									
								</div>
								 
							</div>
							<?php 
							$cek = $this->db->query('Select * from tbl_posko where id_pengguna='.$id_pengguna.'');
                            if ($cek->num_rows()>0) {
							foreach ($cek->result() as $row) {
								?>
								<div class="header">
                            <h2>
                                DETAIL DATA POSKO
                            </h2>
                        </div>
							<div class="body">
                           <div class="row">
								<div class="col-xs-5 col-sm-2">
									<span>
									</span>
								</div>

								<div class="col-xs-5 col-sm-9">
									
									<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $row->nama_posko; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
							
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No. Telepon</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $row->tlp_posko; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>	
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $row->alamat_posko; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
											<input type="hidden" name="latitude_posko" id="latitude_posko" value="<?php echo $row->latitude_posko; ?>">
											<input type="hidden" name="longitude_posko" id="longitude_posko" value="<?php echo $row->longitude_posko; ?>">
                                        </div>
										</div>
                                </div>
								
								</div>
							</div>
							
								<?php
								}
							}
							else
							{
								?>
									<div class="header">
                            <h2>
                                DETAIL DATA POSKO
                            </h2>
                        </div>
							<div class="body">
                           <div class="row">
								<div class="col-xs-5 col-sm-2">
									<span>
									</span>
								</div>
								<div class="col-xs-5 col-sm-9">
									
									<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="-" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No. Telepon</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="-" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>	
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="-" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div id="map" style="width:100%; height:300px; border:1px solid green;"></div>
											<input type="hidden" name="latitude_posko" id="latitude_posko">
											<input type="hidden" name="longitude_posko" id="longitude_posko">
                                        </div>
										</div>
                                </div>
								
								</div>
							</div>
							
							<?php
							}
							
							?>

								
									
								</div>
								<table border="0" width="1000">
							<tr>
							<td align="right">
                                        <a href="<?php echo base_url();?>admin/posko" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
								</td>
								</tr>
								</table> 
							</div>
							
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
	
			<script src="<?php echo base_url(); ?>adminBSB/js/map.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>

