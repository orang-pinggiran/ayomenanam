							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETAIL DATA PEMETAAN HUTAN
                            </h2>
                        </div>
                        <div class="body">
                           <div class="row">
								
								<div class="col-xs-5 col-sm-9">
									
									<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Kategori</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled"> 
										<?php
										$data = $this->db->query("select * from tbl_kategori where id_kategori=$id_kategori");
										foreach ($data->result() as $row){
										?>
										 <input type="text" class="form-control" value="<?php echo $row->nama_kategori; ?>" disabled />
										<?php }
										?>
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
										 <input type="text" class="form-control" value="<?php echo $alamat_map; ?>" disabled />
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
											<input type="hidden" name="latitude_map" id="latitude_map" value="<?php echo $latitude_map; ?>">
											<input type="hidden" name="longitude_map" id="longitude_map" value="<?php echo $longitude_map; ?>">
                                        </div>
										</div>
                                </div>
								
								</div>
							</div>
								<table border="0" width="900">
							<tr>
							<td align="right">
                                        <a href="<?php echo base_url();?>admin/map" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
								</td>
								</tr>
								</table>
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

		<script src="<?php echo base_url(); ?>adminBSB/js/maps.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
