
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
							
									<?php function format_indo1($date){
											$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

											$tahun = substr($date, 0, 4);               
											$bulan = substr($date, 5, 2);
											$tgl   = substr($date, 8, 2);
											$result = $tgl . "&nbsp;" . $BulanIndo[(int)$bulan-1]. "&nbsp;". $tahun;
											return($result);
											}?>
									<?php 
									$cek = $this->db->query('Select * from tbl_timeline, tbl_pengguna WHERE tbl_pengguna.id_pengguna=tbl_timeline.id_pengguna ');
									foreach ($cek->result() as $row) {
										?>
												 <!-- Blockquotes -->
            
									<div class="body">
										<blockquote class="m-b-25">
									<div class="media">
                                    <div class="media-left">
									<div class="image">
										<img src="<?php echo base_url('adminBSB/images/'.$row->foto); ?>" width="35" height="35" alt="User" />
									</div>                                        
									</a>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><?php echo $row->nama; ?></h6>
                                        
										<p><?php echo format_indo1($row->tanggal_timeline); ?> pukul <?php echo $row->waktu_timeline ; ?> </p>
                                        <p align="justify">
                                           <?php echo word_limiter($row->deskripsi_timeline,20) ?>...<a href="#"; >Lihat selengkapnya</a> 
                                        </p>
										<table border="0" width="800" align="center">
										<tr>
										<td align="center">
											<div class="column one single-photo-wrapper image">
										<div class="image_frame scale-with-grid ">
										<div class="image_wrapper">
										<a href="<?php echo base_url('adminBSB/images/'.$row->foto_timeline); ?>" rel="prettyphoto"><div class="mask"></div>
										<img style="border:2px solid black;" width="600" height="400" src="<?php echo base_url('adminBSB/images/'.$row->foto_timeline); ?>" 
										class="scale-with-grid wp-post-image" alt="" srcset="<?php echo base_url('adminBSB/images/'.$row->foto_timeline); ?> 1198w, 
										<?php echo base_url('adminBSB/images/'.$row->foto_timeline); ?> 50w" sizes="(max-width: 1198px) 100vw, 1198px" /></a></p>
									</div>
										</div>			
											</div>
											</td>
											</tr>
											</table>
												</div>
											</div>										
											</blockquote>
									</div>
									<hr>
									<!-- #END# Blockquotes -->
									<?php } ?>
										
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <b>Profile Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                    <b>Message Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <b>Settings Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
</div>