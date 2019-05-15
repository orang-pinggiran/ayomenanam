﻿							<?php echo $this->session->flashdata('info'); ?>

        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					
					<div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>DAFTAR TIMELINE</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <a href="<?php echo base_url();?>admin/tambahtimeline" modal-size="modal-lg" class="btn bg-deep-orange waves-effect modal-view">
                                        <i class="material-icons">add</i>
                                        <span>TAMBAH</span>
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
                                            <th>Penerbit</th>
                                            <th>Gambar </th>
                                            <th>Tanggal terbit</th>
                                            <th>Jam terbit</th>
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
                                            <td align="center"><img src="<?php echo base_url('adminBSB/images/'.$row->foto_timeline); ?>" width='60' height='60' /></td>
                                            <td><?php echo ($row->tanggal_timeline != '0000-00-00' ? date('d-m-Y', strtotime($row->tanggal_timeline)) : "-" ); ?></td>
                                            <td><?php echo $row->waktu_timeline; ?></td>
											<td>
											<a href="<?php echo base_url();?>admin/detailtimeline/<?php echo $row->id_timeline; ?>" modal-size="modal-lg" modal-title="Detail Timeline" class="btn btn-warning btn-xs modal-view"><i class="material-icons">search</i><span>Detail</span></a>
											<a href="<?php echo base_url();?>admin/ambiltimeline/<?php echo $row->id_timeline; ?>" modal-size="modal-lg" class="btn btn-info btn-xs modal-view"><i class="material-icons">create</i><span>Ubah</span></a>
											<a href="<?php echo base_url();?>admin/hapustimeline/<?php echo $row->id_timeline; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" class="btn btn-danger btn-xs"><i class="material-icons">delete</i><span>Hapus</span></a>

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
