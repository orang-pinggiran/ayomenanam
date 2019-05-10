							<?php echo $this->session->flashdata('info'); ?>
							<div class="row clearfix">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="card">

								<div class="body">
									<?php 
									$cek2 = $this->db->query('Select * from tbl_event, tbl_pengguna WHERE tbl_pengguna.id_pengguna=tbl_event.id_pengguna
									AND tbl_event.id_pengguna='.$_SESSION['id_pengguna'].' GROUP BY tbl_event.id_event DESC');
									foreach ($cek2->result() as $row2) {
										?>
												 <!-- Blockquotes -->
            
									<div class="body">
										<blockquote class="m-b-20">
													
													<div class="media">
                                    <div class="media-left">
									<div class="image">
										<img class="bulat" src="<?php echo base_url('adminBSB/images/'.$row2->foto); ?>" width="35" height="35" alt="User" />
									</div>                                        
									</a>
                                    </div>
                                    <div class="media-body">
                                       <div class="row">
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
														<div class="card">
															<div class="header bg-orange">
																<h2>
																	<?php echo $row2->judul_event; ?> 
																	<small><?php echo parse_time($row2->tgl_event,'d F Y'); ?> pukul <?php echo parse_time($row2->jam_event,'H:i') ; ?> WIB oleh <?php echo $row2->nama ; ?></small>
																</h2>
																<ul class="header-dropdown m-r--5">
																	<li class="dropdown">
																		<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
																			<i class="material-icons">more_vert</i>
																		</a>
																		<ul class="dropdown-menu pull-right">
																			<li><a class="modal-view" modal-size="modal-lg" href="<?php echo base_url();?>komunitas/ambilevent/<?php echo $row2->id_event; ?>"; >Ubah</a></li>
																			<li><a href="<?php echo base_url();?>komunitas/hapusevent/<?php echo $row2->id_event; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" >Hapus</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
															<div class="body">
									<div class="media">
                                    <div class="media-left">
									<div class="image">
										<img src="<?php echo base_url('adminBSB/images/'.$row2->poster); ?>" width="55" height="55" alt="User" />
									</div>                                        
									</a>
                                    </div>
                                    <div class="media-body">
                                        <p align="justify">
                                           <?php echo word_limiter($row2->keterangan_event,20) ?>...<a class="modal-view" modal-size="modal-lg" modal-title="Detail Event" href="<?php echo base_url();?>komunitas/detailevent/<?php echo $row2->id_event; ?>"; >Lihat selengkapnya</a> 
                                        </p>	</div>
											</div>																		</div>
														</div>
													</div>
												</div>
												<!-- #END# Colored Card - With Loading -->		
												</div>
											</div>									
										</blockquote>
									</div>
									<hr>
									<!-- #END# Blockquotes -->
									<?php } ?>
										</div>
										</div>
										</div>
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
