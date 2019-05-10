							<?php echo $this->session->flashdata('info'); ?>

<script type="text/javascript">

function print1(strid)
{
if(confirm("Do you want to print?"))
{
var values = document.getElementById(strid);
var printing =
window.open('','','left=0,top=0,width=900,height=650,toolbar=0,scrollbars=0,sta­?tus=0');
printing.document.write(values.innerHTML);
printing.document.close();
printing.focus();
printing.print();
printing.close();
}
}
</script>

                 <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
				<div id="print2">
                       <div class="header" align="center">
                               <div class="font-42">SERTIFIKAT WALI POHON</div></p>
                        </div>
                    <div class="body">
                        <div class="row">
						   <?php 
							$cek = $this->db->query('Select * from tbl_pengguna, tbl_adopsi where tbl_pengguna.id_pengguna=tbl_adopsi.id_pengguna
							AND tbl_pengguna.id_pengguna='.$id_pengguna.' GROUP BY tbl_pengguna.id_pengguna ');
							foreach ($cek->result() as $row) {
								?>
								<div class="col-xs-5 col-sm-2">
									<span>
										 <img src="<?php echo base_url('adminBSB/images/'.$row->foto); ?>" width='150' height='160' />
									</span>
								</div>
								<div class="col-xs-5 col-sm-9">
									
									<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <div class="form-group">
									<div class="form-line disabled">                                                
										 <input type="text" class="form-control" value="<?php echo $row->nama; ?>" disabled />
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
										 <input type="text" class="form-control" value="<?php echo $row->alamat; ?>" disabled />
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
										 <input type="text" class="form-control" value="<?php echo $row->tlp; ?>" disabled />
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
										 <input type="text" class="form-control" value="<?php echo $row->email; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
									
								</div>
								 <?php
								}
							
								?>
						</div>
					</div>
				</div>
				<table border="0" width="1100">
							<tr>
							<td align="center">
                                        <a href="<?php echo base_url();?>admin/adopsi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                        <button type="submit" name="printbutton" onclick="return print1('print2')" class="btn btn-primary m-t-15 waves-effect">Cetak</button>
								</td>
								</tr>
								</table>
			</div>					
		</div>
	</div>
   
							
					
               
            <!-- #END# Horizontal Layout -->

    



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
