							<?php echo $this->session->flashdata('info'); ?>

				<?php
				foreach ($data->result() as $row) {
				?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2 align="center"><b>
                                Posko <?php echo $row->nama_posko; ?>
                            </h2></b>
                        </div>
                        <div class="body">
						 <div class="banner-img" align="center">
						<img src="<?php echo base_url('Green/img/plant.png'); ?>" width='100' height='100' />
                        </div>
                        <h4 align="center">Jenis Pohon <?php echo $row->nama_jenis_pohon; ?> </h4>
						<hr>
						<p align="center">
						<a href="<?php echo base_url();?>pengguna/tambahdonasi/<?php echo $row->id_pohon; ?>" modal-size="modal-lg"  class="btn bg-light-green waves-effect modal-view"><span>DONASI</span></a>
                        </p>
						</div>
                    </div>
                </div>
				<?php }?>
