<?php echo $this->session->flashdata('info'); ?>
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PROFIL PENGGUNA
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFIL
                                    </a>
                                </li>
								<li role="presentation">
                                    <a href="#struktur_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">group</i> STRUKTUR
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">vpn_key</i> UBAH PASSWORD
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                             <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
							   <!-- Horizontal Layout -->
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="body">
													   <div class="row">
															<div class="col-xs-5 col-sm-2">
																<span>
																	 <img src="<?php echo base_url('adminBSB/images/'.$foto); ?>" width='150' height='160' />
																</span>
															</div>
															<div class="col-xs-5 col-sm-9">
																
																<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama Lengkap</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	 <input type="text" class="form-control" value="<?php echo $nama; ?>" disabled />
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Alamat</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	 <input type="text" class="form-control" value="<?php echo $alamat; ?>" disabled />
																		</div>
																	</div>
																</div>
															</div>
																
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>No. Telepon</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	 <input type="text" class="form-control" value="<?php echo $tlp; ?>" disabled />
																		</div>
																	</div>
																</div>
															</div>	

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Email</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	 <input type="text" class="form-control" value="<?php echo $email; ?>" disabled />
																		</div>
																	</div>
																</div>
															</div>
																
															</div>
														</div>
														<div class="row clearfix">
														<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
															<a href="<?php echo base_url();?>komunitas/ambilpengguna/<?php echo $id_pengguna; ?>" modal-size="modal-lg" class="btn btn-primary m-t-15 waves-effect modal-view">Ubah</a>
														</div>
													</div>
													</div>

											</div>
										</div>
										<!-- #END# Horizontal Layout -->
                                </div>
								
								<div role="tabpanel" class="tab-pane fade" id="struktur_with_icon_title">
							   <!-- Horizontal Layout -->
								   <?php 
								$cek = $this->db->query('Select * from tbl_komunitas, tbl_pengguna where tbl_komunitas.id_pengguna=tbl_pengguna.id_pengguna
								AND tbl_pengguna.id_pengguna='.$id_pengguna.'');
								if ($cek->num_rows()>0) {
								foreach ($cek->result() as $row) {
									?>
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="body">
													   <div class="row">
															<div class="col-xs-5 col-sm-9">
																<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama ketua</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="<?php echo $row->nama_ketua;?>" disabled />
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama wakil</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="<?php echo $row->nama_wakil;?>" disabled />
																		</div>
																	</div>
																</div>
															</div>
																
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama sekretaris</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="<?php echo $row->nama_sekretaris;?>" disabled />
																		</div>
																	</div>
																</div>
															</div>	

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama bendahara</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="<?php echo $row->nama_bendahara;?>" disabled />
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Visi</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	  <textarea rows="5" class="form-control no-resize" disabled><?php echo $row->visi;?></textarea>
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Misi</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	  <textarea rows="5" class="form-control no-resize" disabled><?php echo $row->misi;?></textarea>
																		</div>
																	</div>
																</div>
															</div>
															
															
																
															</div>
														</div>
														<div class="row clearfix">
														<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
															<a href="<?php echo base_url();?>komunitas/ambilkomunitas/<?php echo $id_pengguna; ?>" modal-size="modal-lg" class="btn btn-primary m-t-15 waves-effect modal-view">Ubah</a>
														</div>
													</div>
													</div>

											</div>
										</div>
										<!-- #END# Horizontal Layout -->
										<?php
											}
												}
													else
												{ 
										?>
													<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="body">
													   <div class="row">
															<div class="col-xs-5 col-sm-9">
																<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama ketua</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="-" disabled />
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama wakil</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="-" disabled />
																		</div>
																	</div>
																</div>
															</div>
																
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama sekretaris</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="-" disabled />
																		</div>
																	</div>
																</div>
															</div>	

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Nama bendahara</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	<input type="text" class="form-control" value="-" disabled />
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Visi</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	  <textarea rows="5" class="form-control no-resize" disabled>-</textarea>
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label>Misi</label>
																</div>
																<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
																	<div class="form-group">
																<div class="form-line disabled">                                                
																	  <textarea rows="5" class="form-control no-resize" disabled>-</textarea>
																		</div>
																	</div>
																</div>
															</div>
															
															
																
															</div>
														</div>
														<div class="row clearfix">
														<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
															<a href="<?php echo base_url();?>komunitas/ambilkomunitas/<?php echo $id_pengguna; ?>" modal-size="modal-lg" class="btn btn-primary m-t-15 waves-effect modal-view">Ubah</a>
														</div>
													</div>
													</div>

											</div>
										</div>
										<!-- #END# Horizontal Layout -->
										<?php
										}
										?>
                                </div>
                               
								<!-- password -->

							   <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <form class="form-horizontal" method="POST" action="<?php echo base_url();?>komunitas/editpassword">
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Password sekarang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password sekarang">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Password baru</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password_baru" name="password_baru" class="form-control" placeholder="Password baru">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Konfirmasi password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<input type="hidden" id="nama" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="Nama lengkap">
                                <input type="hidden" id="alamat" name="alamat" value="<?php echo $alamat; ?>" class="form-control" placeholder="Alamat">
                                <input type="hidden" id="tlp" name="tlp" value="<?php echo $tlp; ?>" class="form-control" placeholder="Nomor telepon">
                                <input type="hidden" id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email">
                                <input type="hidden" id="foto" name="foto" value="<?php echo $foto; ?>" class="form-control" placeholder="Foto">
                                <input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="ID pengguna">										
                                <input type="hidden" id="level" name="level" value="<?php echo $level; ?>" class="form-control" placeholder="Level">										
                                       
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
