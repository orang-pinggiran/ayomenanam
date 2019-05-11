							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
                    <div class="card">
                        <div class="header">
                            <h2>
                                ISI JUMLAH POHON
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>posko/simpandonasi">
                      
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jumlah pohon</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jumlah_pohon" name="jumlah_pohon" class="form-control" placeholder="Jumlah pohon">
												<input type="hidden" id="id_donasi" name="id_donasi" class="form-control" placeholder="ID donasi">										
												<input type="hidden" id="id_pengguna" name="id_pengguna" class="form-control" placeholder="ID pengguna">										
												<input type="hidden" id="tgl_donasi" name="tgl_donasi" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Tanggal">										
												<input type="hidden" id="status" name="status" value="Terdaftar" class="form-control" placeholder="Status">										
												<input type="hidden" id="id_posko" name="id_posko" value="<?php echo $id_posko; ?>" class="form-control" placeholder="Nama Posko">										
												<input type="hidden" id="id_jenis_pohon" name="id_jenis_pohon" value="<?php echo $id_jenis_pohon; ?>" class="form-control" placeholder="Nama Jenis Pohon">										
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<?php
										date_default_timezone_set("Asia/Jakarta");
										?>
										<input type="hidden" id="waktu_donasi" name="waktu_donasi" value="<?php echo date("H:i:sa"); ?>" class="form-control" placeholder="Jam">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">										
                                        </div>
                                    </div>
                                </div>
						        <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambah</button>
                                        <a href="<?php echo base_url();?>posko/donasi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
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
