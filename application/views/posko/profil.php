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
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">settings</i> UBAH PROFIL
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
													</div>

											</div>
										</div>
										<!-- #END# Horizontal Layout -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                    <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/editprofil" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="Nama lengkap">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" class="form-control" placeholder="Alamat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nomor telepon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tlp" name="tlp" value="<?php echo $tlp; ?>" class="form-control" placeholder="Nomor telepon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Foto</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" id="foto" name="foto" value="<?php echo $foto; ?>" class="form-control" placeholder="Foto">
                                            </div>
											 <div>
										<?php 
										if ($foto == '') {
												# code...
										} else {
											?>
											*) Foto sebelumnya <br> 
											<img src="<?= base_url('adminBSB/images/'.$foto) ?>" width='90' height='90'>
											<?php
										}
										?>
									</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="password" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="ID pengguna">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="level" name="level" value="<?php echo $level; ?>" class="form-control" placeholder="Level">										
                                        </div>
                                    </div>
                                </div>
								
								
								
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                               
								<!-- password -->

							   <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/editpassword">
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