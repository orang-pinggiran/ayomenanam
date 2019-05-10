							<?php echo $this->session->flashdata('info'); ?>

        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR EVENT
								
						<ul class="nav navbar-right panel_toolbox">
                                    <a href="<?php echo base_url();?>admin/tambahevent" class="btn bg-deep-orange waves-effect">
									<i class="material-icons">add</i>
                                    <span>TAMBAH</span></a></ul>  							
									</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama komunitas</th>
                                            <th>Judul event</th>
                                            <th>Tanggal event</th>
                                            <th>Status</th>
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
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->judul_event; ?></td>
                                            <td><?php echo ($row->tanggal_event != '0000-00-00' ? date('d-m-Y', strtotime($row->tanggal_event)) : "-" ); ?></td>
                                            <?php 
											if ($row->status=="Belum berlangsung") {
												?>
												<td> <span class="label label-info">Belum berlangsung</span></td>
											<?php } else if ($row->status=="Berlangsung") {
											?>
											<td> <span class="label label-success">Berlangsung</span></td>
											<?php } else if ($row->status=="Selesai") {
											?>
											<td> <span class="label label-danger">Selesai</span></td>
											<?php }
											?>
											<td>
											<a href="<?php echo base_url();?>admin/detailevent/<?php echo $row->id_event; ?>" class="btn btn-warning btn-xs"><i class="material-icons">search</i><span>Detail</span></a>
											<a href="<?php echo base_url();?>admin/ambilevent/<?php echo $row->id_event; ?>" class="btn btn-info btn-xs"><i class="material-icons">create</i><span>Ubah</span></a>
											<a href="<?php echo base_url();?>admin/hapusevent/<?php echo $row->id_event; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" class="btn btn-danger btn-xs"><i class="material-icons">delete</i><span>Hapus</span></a>

											</td>
                                       </tr>
                                        <?php }?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>
 

    



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
