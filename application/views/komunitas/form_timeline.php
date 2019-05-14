							<?php echo $this->session->flashdata('info'); ?>
							

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                                TAMBAH TIMELINE
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>komunitas/simpantimeline" enctype="multipart/form-data">
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Gambar</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" id="foto_timeline" name="foto_timeline" class="form-control" placeholder="Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
									 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Deskripsi</label>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        <div class="form-line">
										<textarea rows="5" class="form-control no-resize" id="deskripsi_timeline" name="deskripsi_timeline" placeholder="Deskripsi"></textarea>										
                                        </div>
										</div>
                                    </div>
                                </div>	
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_timeline" name="id_timeline" class="form-control" placeholder="ID timeline">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										
										 <input type="hidden" id="id_pengguna" name="id_pengguna" class="form-control" placeholder="ID pengguna">
										                                     </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="tanggal_timeline" name="tanggal_timeline" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Tanggal">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<?php
										date_default_timezone_set("Asia/Jakarta");
										?>
										<input type="hidden" id="waktu_timeline" name="waktu_timeline" value="<?php echo date("H:i:sa"); ?>" class="form-control" placeholder="Jam">										
                                        </div>
                                    </div>
                                </div>
						        <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambah</button>
                                        <a href="<?php echo base_url();?>komunitas/timeline" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
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
