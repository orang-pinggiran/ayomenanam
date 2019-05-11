<?php echo $this->session->flashdata('info'); ?>

<!-- Textarea -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Timeline</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>komunitas/simpantimeline" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" id="deskripsi_timeline" name="deskripsi_timeline" class="form-control no-resize" placeholder="Tulis disini deskripsi timeline"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-12">
                                        <div class="form-group">
                                                <input type="file" id="foto_timeline" name="foto_timeline" class="form-control" placeholder="Foto">
												<input type="hidden" id="id_timeline" name="id_timeline" class="form-control" placeholder="ID timeline">										
												<input type="hidden" id="id_pengguna" name="id_pengguna" class="form-control" placeholder="ID pengguna">
												<input type="hidden" id="tanggal_timeline" name="tanggal_timeline" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Tanggal">										
												<?php
												date_default_timezone_set("Asia/Jakarta");
												?>
												<input type="hidden" id="waktu_timeline" name="waktu_timeline" value="<?php echo date("H:i:sa"); ?>" class="form-control" placeholder="Jam">										
                                        </div>
                                    </div>
                                </div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary pull-right">Bagikan</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Textarea -->

<!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                           

								<div class="body">
									<?php
									$cek = $this->db->query('Select * from tbl_timeline, tbl_pengguna WHERE tbl_pengguna.id_pengguna=tbl_timeline.id_pengguna
									AND tbl_timeline.id_pengguna='.$_SESSION['id_pengguna'].' GROUP BY tbl_timeline.id_timeline DESC ');
									foreach ($cek->result() as $row) {
										?>
												 <!-- Blockquotes -->
            
									<div class="body">
										<blockquote class="m-b-20">
													
													<div class="media">
                                    <div class="media-left">
									<div class="image">
										<img class="bulat" src="<?php echo base_url('adminBSB/images/'.$row->foto); ?>" width="35" height="35" alt="User" />
									</div>                                        
									</a>
                                    </div>
                                    <div class="media-body">
                                       <div class="row">
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
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
            </div>
            <!-- #END# Tabs With Icon Title -->
