							<?php echo $this->session->flashdata('info'); ?>

                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PROFIL KOMUNITAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/editkomunitas" enctype="multipart/form-data">
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
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
		<?php 
		 $komunitas = $this->db->query('Select * from tbl_komunitas where id_pengguna='.$id_pengguna.'');
		if ($komunitas->num_rows()>0) {
		foreach ($komunitas->result() as $row) {
								?>
    
        <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH STRUKTUR ORGANISASI KOMUNITAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/editstruktur">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Ketua</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_ketua" name="nama_ketua" value="<?=(!empty($row->nama_ketua)) ? $row->nama_ketua : "&minus;";?>" class="form-control" placeholder="Nama Ketua">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama wakil</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_wakil" name="nama_wakil" value="<?=(!empty($row->nama_wakil)) ? $row->nama_wakil : "&minus;";?>" class="form-control" placeholder="Nama wakil">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Sekretaris</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_sekretaris" name="nama_sekretaris" value="<?=(!empty($row->nama_sekretaris)) ? $row->nama_sekretaris : "&minus;";?>" class="form-control" placeholder="Nama sekretaris">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama bendahara</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_bendahara" name="nama_bendahara" value="<?=(!empty($row->nama_bendahara)) ? $row->nama_bendahara : "&minus;";?>" class="form-control" placeholder="Nama bendahara">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="id_komunitas" name="id_komunitas" value="<?=(!empty($row->id_komunitas)) ? $row->id_komunitas : "&minus;";?>" class="form-control" placeholder="ID komunitas">
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?=(!empty($row->id_pengguna)) ? $row->id_pengguna : "&minus;";?>" class="form-control" placeholder="ID pengguna">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="visi" name="visi" value="<?=(!empty($row->visi)) ? $row->visi : "&minus;";?>" class="form-control" placeholder="Visi">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="misi" name="misi" value="<?=(!empty($row->misi)) ? $row->misi : "&minus;";?>" class="form-control" placeholder="Misi">										
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
						 
                    </div>
                </div>
            </div>
			<?php }?>
			<?php
								
							}
							else
							{ 
						?>
						
						<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH STRUKTUR ORGANISASI KOMUNITAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/tambahstruktur">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Ketua</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_ketua" name="nama_ketua" class="form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama wakil</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_wakil" name="nama_wakil" class="form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Sekretaris</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_sekretaris" name="nama_sekretaris" class="form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama bendahara</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_bendahara" name="nama_bendahara" class="form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="id_komunitas" name="id_komunitas" class="form-control" placeholder="-">
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" placeholder="-">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="visi" name="visi" class="form-control" placeholder="-">										
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="misi" name="misi" class="form-control" placeholder="-">										
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
						 
                    </div>
                </div>
            </div>
								
								<?php
							}
							
							?>

            <!-- #END# Horizontal Layout -->
			<?php 
		 $komunitas2 = $this->db->query('Select * from tbl_komunitas where id_pengguna='.$id_pengguna.'');
       if ($komunitas2->num_rows()>0) {
		foreach ($komunitas2->result() as $row2) {
								?>
			        <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH VISI DAN MISI KOMUNITAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/editstruktur">
                                	<div class="row clearfix">
									 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Visi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        <div class="form-line">
										<textarea rows="5" class="form-control no-resize" id="visi" name="visi" placeholder="Visi"><?=(!empty($row2->visi)) ? $row2->visi : "&minus;";?></textarea>										
                                        </div>
										</div>
                                    </div>
                                </div>
								<div class="row clearfix">
								 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Misi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        <div class="form-line">
										<textarea rows="5" class="form-control no-resize" id="misi" name="misi" placeholder="Misi"><?=(!empty($row2->misi)) ? $row2->misi : "&minus;";?></textarea>										
                                        </div>
										</div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_ketua" name="nama_ketua" value="<?=(!empty($row2->nama_ketua)) ? $row2->nama_ketua : "&minus;";?>" class="form-control" placeholder="Nama Ketua">
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_wakil" name="nama_wakil" value="<?=(!empty($row2->nama_wakil)) ? $row2->nama_wakil : "&minus;";?>" class="form-control" placeholder="Nama wakil">
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_sekretaris" name="nama_sekretaris" value="<?=(!empty($row2->nama_sekretaris)) ? $row2->nama_sekretaris : "&minus;";?>" class="form-control" placeholder="Nama sekretaris">
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_bendahara" name="nama_bendahara" value="<?=(!empty($row2->nama_bendahara)) ? $row2->nama_bendahara : "&minus;";?>" class="form-control" placeholder="Nama bendahara">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="id_komunitas" name="id_komunitas" value="<?=(!empty($row2->id_komunitas)) ? $row2->id_komunitas : "&minus;";?>" class="form-control" placeholder="ID komunitas">
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?=(!empty($row2->id_pengguna)) ? $row2->id_pengguna : "&minus;";?>" class="form-control" placeholder="ID pengguna">										
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                        <a href="<?php echo base_url();?>admin/komunitas" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
						
                    </div>
                </div>
            </div>
			<?php }?> 
            <!-- #END# Horizontal Layout -->
				<?php
								
							}
							else
							{ 
								?>
								
			<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH VISI DAN MISI KOMUNITAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/tambahstruktur">
                                	<div class="row clearfix">
									 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Visi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        <div class="form-line">
										<textarea rows="5" class="form-control no-resize" id="visi" name="visi" placeholder="-"></textarea>										
                                        </div>
										</div>
                                    </div>
                                </div>
								<div class="row clearfix">
								 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Misi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        <div class="form-line">
										<textarea rows="5" class="form-control no-resize" id="misi" name="misi" placeholder="-"></textarea>										
                                        </div>
										</div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_ketua" name="nama_ketua" class="form-control" placeholder="-">
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_wakil" name="nama_wakil" class="form-control" placeholder="-">
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_sekretaris" name="nama_sekretaris" class="form-control" placeholder="-">
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="nama_bendahara" name="nama_bendahara" class="form-control" placeholder="-">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <input type="hidden" id="id_komunitas" name="id_komunitas" class="form-control" placeholder="-">
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
										<input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna; ?>" class="form-control" >										
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ubah</button>
                                        <a href="<?php echo base_url();?>admin/komunitas" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
						
                    </div>
                </div>
            </div>
								
								<?php
							}
							
							?>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>adminBSB/js/pages/tables/jquery-datatable.js"></script>
