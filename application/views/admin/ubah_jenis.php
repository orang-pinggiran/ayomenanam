							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card no-shadow">
                        <div class="header">
                            <h2>
                                UBAH NAMA JENIS POHON
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/editjenis">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama jenis pohon</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_jenis_pohon" name="nama_jenis_pohon" value="<?php echo $nama_jenis_pohon; ?>" class="form-control" placeholder="Nama jenis pohon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
				
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_jenis_pohon" name="id_jenis_pohon" value="<?php echo $id_jenis_pohon; ?>" class="form-control" placeholder="ID jenis pohon">										
                                        </div>
                                    </div>
                                </div>
								
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                        <a href="<?php echo base_url();?>admin/jenis_pohon" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->

