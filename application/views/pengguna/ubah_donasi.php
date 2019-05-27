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
                                               <option value="">Pilih</option>
					
													<?php
                                                    $id_posko = $this->db->query('Select * from tbl_posko');
                                                    foreach ($id_posko->result() as $data ) {
														echo "<option value='".$data->id_posko."'>".$data->nama_posko."</option>";
													}
													?>
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
                                           
											 <option value="">Pilih</option>
												</select>

												<div id="loading" style="margin-top: 15px;">
											  <img src="<?php echo base_url(); ?>Green/img/loading.gif" width="18"> <small>Loading...</small>
												</div>
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
			
			 <!-- Load librari/plugin jquery nya -->
	<script src="<?php echo base_url(); ?>adminBSB/js/jquery.min.js"); ?>" type="text/javascript"></script>
	
	<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		// Kita sembunyikan dulu untuk loadingnya
		$("#loading").hide();
		
		$("#id_posko").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#id_jenis_pohon").hide(); // Sembunyikan dulu combobox kota nya
			$("#loading").show(); // Tampilkan loadingnya
		
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url();?>pengguna/listKota", // Isi dengan url/path file php yang dituju
				data: {id_posko : $("#id_posko").val()}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ // Ketika proses pengiriman berhasil
					$("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#id_jenis_pohon").html(response.list_kota).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
	</script>


