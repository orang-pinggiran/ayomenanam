							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                                UBAH DATA DONASI POHON
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>pengguna/editdonasi">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama posko</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <select name="id_posko" id="id_posko" class="form-control col-md-3 col-xs-3">
                                                
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
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <select name="id_jenis_pohon" id="id_jenis_pohon" class="form-control col-md-3 col-xs-3">
                                                
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
                                        <label>Jumlah pohon</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jumlah_pohon" name="jumlah_pohon" value="<?php echo $jumlah_pohon; ?>" class="form-control" placeholder="Jumlah pohon">
												<input type="hidden" id="id_donasi" name="id_donasi" value="<?php echo $id_donasi; ?>" class="form-control" placeholder="ID donasi">										
												<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="ID pengguna">										
												<input type="hidden" id="status" name="status" value="<?php echo $status; ?>" class="form-control" placeholder="Status">										
												<input type="hidden" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>" class="form-control" placeholder="Keterangan">										
												<input type="hidden" id="tgl_donasi" name="tgl_donasi" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Tanggal">										
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
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                        <a href="<?php echo base_url();?>pengguna/manajemen_donasi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->

