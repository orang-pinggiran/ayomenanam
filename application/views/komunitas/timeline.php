<?php echo $this->session->flashdata('info'); ?>

<!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
				<div class="body">
					<div class="col-xs-12 col-sm-6 align-left">
                           <a href="<?php echo base_url();?>komunitas/tambahtimeline" modal-size="modal-lg" class="btn bg-deep-orange waves-effect modal-view">
                               <i class="material-icons">add</i>
                                  <span>TAMBAH</span>
                           </a>
						<hr>
                    </div>

						
                    </div>                           

								<div class="container-fluid mt-5 mb-5">
								<div class="col-md-8 offset-md-6">
									<ul class="timeline">
									<?php
									$cek = $this->db->query('Select * from tbl_timeline, tbl_pengguna WHERE tbl_pengguna.id_pengguna=tbl_timeline.id_pengguna
									AND tbl_timeline.id_pengguna='.$_SESSION['id_pengguna'].' GROUP BY tbl_timeline.id_timeline DESC ');
									foreach ($cek->result() as $row) {
										?>
										<li>
										<div class="media">
													<div class="media-left">
													<div class="image">
														<img class="bulat" src="<?php echo base_url('adminBSB/images/'.$row->foto); ?>" width="35" height="35" alt="User" />
													</div>                                        
													</a>
													</div>
													<div class="media-body">
													   <div class="row">
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																		<div class="card">
																			<div class="header bg-light-blue">
																				<h2>
																					<?php echo $row->nama; ?> 
																					<small><?php echo parse_time($row->tanggal_timeline,'d F Y'); ?> pukul <?php echo parse_time($row->waktu_timeline,'H:i') ; ?> WIB</small>
																				</h2>
																				<ul class="header-dropdown m-r--5">
																					<li class="dropdown">
																						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
																							<i class="material-icons">more_vert</i>
																						</a>
																						<ul class="dropdown-menu pull-right">
																							<li><a class="modal-view" modal-size="modal-lg" modal-title="Ubah Timeline" href="<?php echo base_url();?>komunitas/ubahtimeline/<?php echo $row->id_timeline; ?>"; >Ubah</a></li>
																							<li><a href="<?php echo base_url();?>komunitas/hapustimeline/<?php echo $row->id_timeline; ?>" onclick="return confirm('anda yakin akan menghapus data ini');" >Hapus</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																			<div class="body">
													<div class="media">
													<div class="media-left">
													<div class="image">
														<img src="<?php echo base_url('adminBSB/images/'.$row->foto_timeline); ?>" width="55" height="55" alt="User" />
													</div>                                        
													</a>
													</div>
													<div class="media-body">
														<p align="justify">
														   <?php echo word_limiter($row->deskripsi_timeline,20) ?>...<a class="modal-view" modal-size="modal-lg" modal-title="Detail Timeline" href="<?php echo base_url();?>komunitas/detailtimeline/<?php echo $row->id_timeline; ?>"; >Lihat selengkapnya</a> 
														</p>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- #END# Colored Card - With Loading -->		
								</div>
							</div>	
						</li>
							<?php } ?>
					</ul>
				</div>
			</div>
                  
                                
                                
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
