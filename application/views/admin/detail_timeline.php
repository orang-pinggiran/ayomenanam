							<?php echo $this->session->flashdata('info'); ?>

			 
			 <!-- Body Copy -->
						<div class="row clearfix">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<div class="card">
								<div class="header">
                            <h3><p class="col-teal" align="center">
                           </h3>
                        </div>
							<div class="col-xs-5 col-sm-2">
							<span>					
							<table border="0" width="1350px">
							<tr>
							<td align="left" rowspan="2" width="900px">
							<div class="col-xs-5 col-sm-2">
							<span>					
								<div class="column one single-photo-wrapper image">
							<div class="image_frame scale-with-grid ">
							<div class="image_wrapper">
							<a href="<?php echo base_url('adminBSB/images/'.$foto_timeline); ?>" rel="prettyphoto"><div class="mask"></div>
							<img style="border:2px solid black;" width="900" height="600" src="<?php echo base_url('adminBSB/images/'.$foto_timeline); ?>" 
							class="scale-with-grid wp-post-image" alt="" srcset="<?php echo base_url('adminBSB/images/'.$foto_timeline); ?> 900w, 
							<?php echo base_url('adminBSB/images/'.$foto_timeline); ?> 50w" sizes="(max-width: 900px) 100vw, 900px" /></a></p>
						</div>
							</div>			
								</div>
							</span>
								</div>
							</td>
							<td align="left" width="450px">
								<p align="justify">
								<?php echo $deskripsi_timeline; ?> <br><br>
							   <?php function format_indo1($date){
								$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

								$tahun = substr($date, 0, 4);               
								$bulan = substr($date, 5, 2);
								$tgl   = substr($date, 8, 2);
								$result = $tgl . "&nbsp;" . $BulanIndo[(int)$bulan-1]. "&nbsp;". $tahun;
								return($result);
								}?>
								
								<?php echo format_indo1($tanggal_timeline); ?>
								pukul <?php echo $waktu_timeline; ?> <br>
										</p>
								
							</td>
							</tr>
							<tr>
							<td align="left" width="450px" height="350px"></td>
							</tr>
							</table>
							</span>
								</div>
									<div class="body">
										
                            
						   
										<table border="0" width="1350">
							<tr>
							<td align="right">
                                        <a href="<?php echo base_url();?>admin/timeline" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
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
