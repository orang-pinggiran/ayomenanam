							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
                    <div class="card">
                       
					   
                        <div class="body">

							
								<div class="header">
                            <h2>
                                DATA POHON DONASI
                            </h2>
                        </div>
							<div class="row">
								<div class="col-xs-5 col-sm-2">
									
								</div>
								<div class="col-xs-5 col-sm-9">
									
									<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
									<?php 
                                                    $posko = $this->db->query("Select * from tbl_posko where id_posko='$id_posko'");
                                                    foreach ($posko->result() as $row1 ) {
                                                       
                                                ?>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $row1->nama_posko;?>" disabled />
                                            </div>
											 <?php }?>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jenis pohon</label>
                                    </div>
									<?php 
                                                    $jenis_pohon = $this->db->query("Select * from jenis_pohon where id_jenis_pohon='$id_jenis_pohon'");
                                                    foreach ($jenis_pohon->result() as $row2 ) {
                                                       
                                                ?>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $row2->nama_jenis_pohon;?>" disabled />
                                            </div>
											<?php }?>
                                        </div>
                                    </div>
                                </div>
									
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jumlah pohon</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $jumlah_pohon;?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>	

								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Tanggal donasi</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo parse_time($tgl_donasi,'d F Y'); ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Waktu donasi</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo parse_time($waktu_donasi,'H:i') ; ?> WIB " disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $status;?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										  <textarea rows="4" class="form-control no-resize" disabled><?php echo $keterangan;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
									
								</div>
								 
							</div>
							<table border="0" width="1100">
							<tr>
							<td align="center">
                                        <a href="<?php echo base_url();?>posko/manajemen_donasi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
								</td>
								</tr>
								</table>
					
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
