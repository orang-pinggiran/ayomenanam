﻿							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                                UBAH DATA ADOPSI POHON
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>komunitas/editadopsi">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jenis adopsi</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="form-group">
                                            <select name="jenis_adopsi" id="jenis_adopsi" class="form-control col-md-4 col-xs-4">
                                                <option value="Tanam bersama">Tanam bersama</option>
                                                <option value="Titip Tanam">Titip tanam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="form-group">
                                            <select name="id_posko" id="id_posko" class="form-control col-md-4 col-xs-4">
                                                
                                                <?php 
                                                    $posko = $this->db->query('Select * from tbl_posko');
                                                    foreach ($posko->result() as $row ) {
                                                       
                                                ?>
                                                <option value="<?php echo $row->id_posko;?>"><?php echo $row->nama_posko;?></option>
                                                <?php }?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jenis pohon</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="form-group">
                                            <select name="id_jenis_pohon" id="id_jenis_pohon" class="form-control col-md-4 col-xs-4">
                                                
                                                <?php 
                                                    $jenis = $this->db->query('Select * from jenis_pohon');
                                                    foreach ($jenis->result() as $row2 ) {
                                                       
                                                ?>
                                                <option value="<?php echo $row2->id_jenis_pohon;?>"><?php echo $row2->nama_jenis_pohon;?></option>
                                                <?php }?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama pohon</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_pohon" name="nama_pohon" value="<?php echo $nama_pohon; ?>" class="form-control" placeholder="Nama pohon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jumlah pohon</label>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jumlah_pohon" name="jumlah_pohon" value="<?php echo $jumlah_pohon; ?>" class="form-control" placeholder="Jumlah pohon">
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
										<input type="hidden" id="waktu_adopsi" name="waktu_adopsi" value="<?php echo date("H:i:sa"); ?>" class="form-control" placeholder="Jam">										
 										<input type="hidden" id="id_adopsi" name="id_adopsi" value="<?php echo $id_adopsi; ?>" class="form-control" placeholder="ID adopsi">										
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="ID pengguna">										
										<input type="hidden" id="id_event" name="id_event" value="<?php echo $id_event; ?>" class="form-control" placeholder="ID event">										
										<input type="hidden" id="status_adopsi" name="status_adopsi" value="<?php echo $status_adopsi; ?>" class="form-control" placeholder="Status Adopsi">										
										<input type="hidden" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>" class="form-control" placeholder="Keterangan">										
										<input type="hidden" id="tgl_adopsi" name="tgl_adopsi" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Tanggal">										
                                       </div>
                                    </div>
                                </div>
						        <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                        <a href="<?php echo base_url();?>komunitas/adopsi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <!-- #END# Horizontal Layout -->
