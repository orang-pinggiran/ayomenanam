							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                                TAMBAH DATA POHON
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>posko/simpanpohon" enctype="multipart/form-data">
                                
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
                                        <label>Jumlah</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_pohon" name="id_pohon" class="form-control" placeholder="ID pohon">										
										 <?php 
                                            $posko = $this->db->query('Select * from tbl_posko
											WHERE id_pengguna='.$_SESSION['id_pengguna'].'');
                                            foreach ($posko->result() as $row3 ) {
                                                       
                                                ?>
										<input type="hidden" id="id_posko" name="id_posko" value="<?php echo $row3->id_posko; ?>" class="form-control" placeholder="ID posko">										
                                                <?php }?>
                                        </div>
                                    </div>
                                </div>
								
						        <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambah</button>
                                        <a href="<?php echo base_url();?>posko/daftar_pohon" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
