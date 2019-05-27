							<?php echo $this->session->flashdata('info'); ?>

        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR ADOPSI
								
						<ul class="nav navbar-right panel_toolbox">
									</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul event</th>
                                            <th>Ambil dari posko</th>
                                            <th>Jenis pohon</th>
                                            <th>Jumlah pohon</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
											
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
										<?php
										$cek = $this->db->query('Select * from tbl_adopsi, tbl_pengguna, tbl_posko, jenis_pohon,tbl_event
										WHERE tbl_event.id_event=tbl_adopsi.id_event AND tbl_pengguna.id_pengguna=tbl_adopsi.id_pengguna
										AND tbl_adopsi.id_posko=tbl_posko.id_posko AND tbl_adopsi.id_jenis_pohon=jenis_pohon.id_jenis_pohon
										AND tbl_adopsi.id_pengguna='.$_SESSION['id_pengguna'].' ');
										$no = 1;
										foreach ($cek->result() as $row) {
										?>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->judul_event; ?></td>
                                            <td><?php echo $row->nama_posko; ?></td>
                                            <td><?php echo $row->nama_jenis_pohon; ?></td>
                                            <td><?php echo $row->jumlah_pohon; ?></td>
                                            <?php 
											if ($row->status_adopsi=="Terdaftar") {
												?>
												<td> <span class="label label-info">Terdaftar</span></td>
											<?php } else if ($row->status_adopsi=="Disetujui") {
											?>
											<td> <span class="label label-success">Disetujui</span></td>
											<?php } else if ($row->status_adopsi=="Ditolak") {
											?>
											<td> <span class="label label-danger">Ditolak</span></td>
											<?php }
											?>
											
											<?php 
											if ($row->status_adopsi=="Disetujui") {
												?>
											<td>
											<a href="<?php echo base_url();?>komunitas/detailadopsi/<?php echo $row->id_adopsi; ?>" modal-size="modal-lg" modal-title="Detail Adopsi" class="btn btn-warning btn-xs modal-view"><i class="material-icons">search</i><span>Detail</span></a>
											<a href="<?php echo base_url();?>komunitas/sertifikatadopsi/<?php echo $row->id_adopsi; ?>" modal-size="modal-lg" class="btn bg-light-green btn-xs modal-view"><i class="material-icons">class</i><span>Sertifikat</span></a>
											<a href="<?php echo base_url();?>komunitas/ambiladopsi/<?php echo $row->id_adopsi; ?>" modal-size="modal-lg"  class="btn btn-info btn-xs modal-view"><i class="material-icons">create</i><span>Ubah</span></a>
											<a href="<?php echo base_url();?>komunitas/hapusadopsi/<?php echo $row->id_adopsi; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" class="btn btn-danger btn-xs"><i class="material-icons">delete</i><span>Hapus</span></a>

											</td>
											<?php } else {
											?>
											<td>
											<a href="<?php echo base_url();?>komunitas/detailadopsi/<?php echo $row->id_adopsi; ?>" modal-size="modal-lg" modal-title="Detail Adopsi" class="btn btn-warning btn-xs modal-view"><i class="material-icons">search</i><span>Detail</span></a>
											<a href="<?php echo base_url();?>komunitas/ambiladopsi/<?php echo $row->id_adopsi; ?>" modal-size="modal-lg"  class="btn btn-info btn-xs modal-view"><i class="material-icons">create</i><span>Ubah</span></a>
											<a href="<?php echo base_url();?>komunitas/hapusadopsi/<?php echo $row->id_adopsi; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" class="btn btn-danger btn-xs"><i class="material-icons">delete</i><span>Hapus</span></a>

											</td>
											<?php }
											?>
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
