							<?php echo $this->session->flashdata('info'); ?>

			 
			 <!-- Body Copy -->
						<div class="row clearfix">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<div class="card">
								
								<div class="header">
                            <h3><p class="col-teal" align="center">
								<?php echo $judul_event; ?>
                           </h3>
                        </div>
							<table border="0" width="1350">
							<tr>
							<td align="center">
								<div class="column one single-photo-wrapper image">
							<div class="image_frame scale-with-grid ">
							<div class="image_wrapper">
							<a href="<?php echo base_url('adminBSB/images/'.$poster); ?>" rel="prettyphoto"><div class="mask"></div>
							<img style="border:2px solid black;" width="1198" height="480" src="<?php echo base_url('adminBSB/images/'.$poster); ?>" 
							class="scale-with-grid wp-post-image" alt="" srcset="<?php echo base_url('adminBSB/images/'.$poster); ?> 1198w, 
							<?php echo base_url('adminBSB/images/'.$poster); ?> 50w" sizes="(max-width: 1198px) 100vw, 1198px" /></a></p>
						</div>
							</div>			
								</div>
								</td>
								</tr>
								</table>
							
									<div class="body">
										<p align="justify">
											<?php echo $keterangan_event; ?>										
										</p>
                            <h4><p class="col-teal">
								Kapan dan di mana? <br></p>
                           </h4>
						   <p align="justify">
							   <?php function format_indo1($date){
								$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

								$tahun = substr($date, 0, 4);               
								$bulan = substr($date, 5, 2);
								$tgl   = substr($date, 8, 2);
								$result = $tgl . "&nbsp;" . $BulanIndo[(int)$bulan-1]. "&nbsp;". $tahun;
								return($result);
								}?>
								Hari <?php echo $hari_event; ?>, <?php echo format_indo1($tanggal_event); ?> <br>
								Pukul <?php echo $waktu_event; ?> <br>
								Di <?php echo $tempat_event; ?>
										</p>
										<table border="0" width="1350">
							<tr>
							<td align="center">
                                        <a href="<?php echo base_url();?>admin/event" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
								</td>
								</tr>
								</table>
                        </div>
						
								</div>
							</div>
						</div>
						<!-- #END# Body Copy -->

    



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
