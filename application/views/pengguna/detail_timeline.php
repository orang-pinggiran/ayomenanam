﻿
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
                <p><i class="fa fa-calendar"></i> Diterbitkan <?php echo parse_time($tanggal_timeline,'d F Y'); ?> pukul <?php echo parse_time($waktu_timeline,'H:i') ; ?> WIB</p>
					
                <hr>
                        <p align="justify"><?php echo $deskripsi_timeline ?></p>
                        
                        <div class="space-ten"></div>
                       
                    </div>
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.3"></script>					
			<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>
			
