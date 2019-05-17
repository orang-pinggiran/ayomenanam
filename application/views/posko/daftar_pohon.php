							<?php echo $this->session->flashdata('info'); ?>

        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
						<div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>DAFTAR POHON</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <a href="<?php echo base_url();?>posko/tambahpohon" modal-size="modal-lg" class="btn bg-deep-orange waves-effect modal-view">
                                        <i class="material-icons">add</i>
                                        <span>TAMBAH</span>
                                    </a>
									<a href="<?php echo base_url();?>posko/grafikpohon" class="btn btn-info waves-effect">
                                        <i class="material-icons">trending_down</i>
                                        <span>LIHAT GRAFIK</span>
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
                                            <th>Jenis pohon</th>
                                            <th>Jumlah</th>
                                           <th>Aksi</th>
											
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
										<?php
										$cek = $this->db->query('Select * from tbl_pohon, tbl_posko, jenis_pohon
										WHERE tbl_pohon.id_jenis_pohon=jenis_pohon.id_jenis_pohon
										AND tbl_pohon.id_posko=tbl_posko.id_posko AND tbl_posko.id_pengguna='.$_SESSION['id_pengguna'].' ');
										$no = 1;
										foreach ($cek->result() as $row) {
										?>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_jenis_pohon; ?></td>
                                            <td><?php echo $row->jumlah; ?></td>
                                            <td>
											<a href="<?php echo base_url();?>posko/ambilpohon/<?php echo $row->id_pohon; ?>" modal-size="modal-lg" class="btn btn-info btn-xs modal-view"><i class="material-icons">create</i><span>Ubah</span></a>
											<a href="<?php echo base_url();?>posko/hapuspohon/<?php echo $row->id_pohon; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" class="btn btn-danger btn-xs"><i class="material-icons">delete</i><span>Hapus</span></a>

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
