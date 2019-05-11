							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PEMETAAN HUTAN
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>posko/editmap">
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Kategori</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <select name="id_kategori" id="id_kategori" class="form-control col-md-3 col-xs-3">
                                                
                                                <?php 
                                                    $kategori = $this->db->query('Select * from tbl_kategori');
                                                    foreach ($kategori->result() as $row ) {
                                                       
                                                ?>
                                                <option value="<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></option>
                                                <?php }?>

                                            </select>
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
                                                <input type="text" id="alamat_map" name="alamat_map" value="<?php echo $alamat_map; ?>" class="form-control" placeholder="Alamat">
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
											<input type="hidden" name="latitude_map" id="latitude_map" value="<?php echo $latitude_map; ?>">
											<input type="hidden" name="longitude_map" id="longitude_map" value="<?php echo $longitude_map; ?>">
                                        </div>
										</div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_map" name="id_map" class="form-control" value="<?php echo $id_map; ?>" placeholder="ID map">										
                                        </div>
                                    </div>
                                </div>
								
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                        <a href="<?php echo base_url();?>posko/map" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
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

		<script src="<?php echo base_url(); ?>adminBSB/js/maps.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
