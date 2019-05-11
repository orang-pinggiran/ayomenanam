
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="<?php echo base_url('adminBSB/images/'.$foto_timeline); ?>" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
					<?php
						$cek = $this->db->query('Select * from tbl_timeline, tbl_pengguna WHERE tbl_pengguna.id_pengguna='.$id_pengguna.' group by tbl_pengguna.id_pengguna');
						foreach ($cek->result() as $row) {
						?>
                         <p><i class="fa fa-user"></i> Oleh <?php echo $row->nama; ?> 
						<?php } ?>
                </p>
                <hr>
                <p><i class="fa fa-calendar"></i> Diterbitkan <?php echo parse_time($row->tanggal_timeline,'d F Y'); ?> pukul <?php echo parse_time($row->waktu_timeline,'H:i') ; ?> WIB</p>
					
                <hr>
                        <p align="justify"><?php echo $deskripsi_timeline ?></p>
                        
                        <div class="space-ten"></div>
                       
                    </div>