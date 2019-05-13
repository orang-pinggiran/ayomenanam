
<div class="container-fluid">
<!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">timeline</i> TIMELINE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">event</i> EVENT
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
								<div class="body">
									<?php
									$cek = $this->db->query('Select * from tbl_timeline, tbl_pengguna WHERE tbl_pengguna.id_pengguna=tbl_timeline.id_pengguna GROUP BY 
									tbl_timeline.id_timeline DESC');
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
                                           <?php echo word_limiter($row->deskripsi_timeline,20) ?>...<a class="modal-view" modal-size="modal-lg" modal-title="Detail Timeline" href="<?php echo base_url();?>pengguna/detailtimeline/<?php echo $row->id_timeline; ?>"; >Lihat selengkapnya</a> 
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
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    								<div class="body">
							
									
									<?php 
									$cek2 = $this->db->query('Select * from tbl_event, tbl_pengguna WHERE tbl_pengguna.id_pengguna=tbl_event.id_pengguna GROUP BY tbl_event.id_event DESC');
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
                                           <?php echo word_limiter($row2->keterangan_event,20) ?>...<a class="modal-view" modal-size="modal-lg" modal-title="Detail Event" href="<?php echo base_url();?>pengguna/detailevent/<?php echo $row2->id_event; ?>"; >Lihat selengkapnya</a> 
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
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
</div>
