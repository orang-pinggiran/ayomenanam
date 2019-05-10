							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>DATA PEMETAAN HUTAN</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <a href="<?php echo base_url();?>admin/tambahmap" class="btn bg-deep-orange waves-effect">
                                        <i class="material-icons">add</i>
                                        <span>TAMBAH</span>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/peta-pemetaan" class="btn btn-info waves-effect">
                                        <i class="material-icons">map</i>
                                        <span>LIHAT PETA</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="body">
						 <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
											
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
										<?php
										$no = 1;
										foreach ($data->result() as $row) {
										?>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_kategori; ?></td>
                                            <td><?php echo $row->alamat_map; ?></td>
                                            <td>
											<a href="<?php echo base_url();?>admin/detailmap/<?php echo $row->id_map; ?>" class="btn btn-warning btn-xs"><i class="material-icons">search</i><span>Detail</span></a>
											<a href="<?php echo base_url();?>admin/ambilmap/<?php echo $row->id_map; ?>" class="btn btn-info btn-xs"><i class="material-icons">create</i><span>Ubah</span></a>
											<a href="<?php echo base_url();?>admin/hapusmap/<?php echo $row->id_map; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" class="btn btn-danger btn-xs"><i class="material-icons">delete</i><span>Hapus</span></a>

											</td>
                                       </tr>
                                        <?php }?>
                                       
                                    </tbody>
                                </table>
                            </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                            <div id="map" style="width:120%; height:520px; border:1px solid green;"></div>
											<?php
										foreach ($data->result() as $row) {
										?>
											<input type="text" name="latitude_map" id="latitude_map" value="<?php echo $row->latitude_map; ?>">
											<input type="text" name="longitude_map" id="longitude_map" value="<?php echo $row->longitude_map; ?>" >
											                                        <?php }?>

                                        </div>
										
										</div>
                                </div>
						        <div class="row clearfix">
                               
                                    </div>
									
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
	
		<script src="<?php echo base_url(); ?>adminBSB/js/mapp.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initAutocomplete" async defer></script>
	

