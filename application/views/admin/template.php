<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Ayo Menanam | Kabupaten Blitar</title>
        <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>Green/img/plant.png" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>adminBSB/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url(); ?>adminBSB/plugins/node-waves/waves.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>adminBSB/plugins/morrisjs/morris.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="<?php echo base_url(); ?>adminBSB/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>adminBSB/css/style.css" rel="stylesheet">
        
		<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo base_url(); ?>adminBSB/css/themes/all-themes.css" rel="stylesheet" />

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery/jquery.min.js"></script>

		<!-- JQuery DataTable Css -->
		<link href="<?php echo base_url(); ?>adminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

		<!-- Map Css -->
        <link href="<?php echo base_url(); ?>adminBSB/css/map.css" rel="stylesheet">

		
    </head>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        
		
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>admin">AYO MENANAM</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       
                        <!-- Notifications -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">notifications</i>
                                <span class="label-count">7</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">NOTIFICATIONS</li>
                                <li class="body">
                                    <ul class="menu">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">person_add</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>12 new members joined</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 14 mins ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-cyan">
                                                    <i class="material-icons">add_shopping_cart</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>4 sales made</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 22 mins ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-red">
                                                    <i class="material-icons">delete_forever</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>Nancy Doe</b> deleted account</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 3 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-orange">
                                                    <i class="material-icons">mode_edit</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>Nancy</b> changed name</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 2 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-blue-grey">
                                                    <i class="material-icons">comment</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>John</b> commented your post</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 4 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">cached</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>John</b> updated status</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 3 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-purple">
                                                    <i class="material-icons">settings</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>Settings updated</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> Yesterday
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);">View All Notifications</a>
                                </li>
                            </ul>
                        </li>
                        <!-- #END# Notifications -->
            
                        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
				<?php $foto = $this->db->query('Select * from tbl_pengguna where level='.$_SESSION['level'].'');
                                                    foreach ($foto->result() as $row1 ) {
                                                       
                                                ?>
                <div class="user-info">
                    <div class="image">
                        <img src="<?php echo base_url('adminBSB/images/'.$row1->foto); ?>" width="48" height="48" alt="User" />
													<?php } ?>
					</div>
                    <div class="info-container">
					<?php 
                                                    $pengguna = $this->db->query('Select * from tbl_pengguna where level='.$_SESSION['level'].'');
                                                    foreach ($pengguna->result() as $row ) {
                                                       
                                                ?>
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row->nama;?></div>
						<?php }?>
                        <div class="email"><?php echo $email; ?></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url();?>admin/profil/<?php echo $row->id_pengguna; ?>"><i class="material-icons">person</i>Profil</a></li>
                                <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="material-icons">input</i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MENU</li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/pengguna">
                                <i class="material-icons">person</i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/komunitas">
                                <i class="material-icons">group</i>
                                <span>Komunitas</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">business_center</i>
                                <span>Bank Pohon</span>
                            </a>
							 <ul class="ml-menu">
                                <li>
                                    <a href="<?php echo base_url();?>admin/jenis_pohon">Jenis Pohon</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/daftar_pohon">Daftar Pohon</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/posko">Daftar Posko</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="<?php echo base_url();?>admin/event">
                                <i class="material-icons">event</i>
                                <span>Event</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url();?>admin/timeline">
                                <i class="material-icons">view_list</i>
                                <span>Timeline</span>
                            </a>
                        </li>                        
						                       
						<li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">shopping_basket</i>
                                <span>Transaksi Pohon</span>
                            </a>
							 <ul class="ml-menu">
                                <li>
                                    <a href="<?php echo base_url();?>admin/donasi">Donasi Pohon</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/adopsi">Adopsi Pohon</a>
                                </li>
                            </ul>
                        </li>                       
						<li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">map</i>
                                <span>Pemetaan Hutan</span>
                            </a>
							 <ul class="ml-menu">
                                <li>
                                    <a href="<?php echo base_url();?>admin/kategori">Kategori</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/map">Map</a>
                                </li>
                            </ul>
                        </li>                       

                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; Diskominfo Kabupaten Blitar
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
			
            <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <ul class="demo-choose-skin">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <?php
     $this->load->view($content);?>
            
        </section>


        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <!--script src="<?php echo base_url(); ?>adminBSB/plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>adminBSB/plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js 
        <script src="<?php echo base_url(); ?>adminBSB/plugins/flot-charts/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>adminBSB/plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>adminBSB/plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>adminBSB/plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="<?php echo base_url(); ?>adminBSB/plugins/flot-charts/jquery.flot.time.js"></script>
-->
        <!-- Sparkline Chart Plugin Js -->
        <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>adminBSB/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>adminBSB/js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>adminBSB/js/demo.js"></script>

	
		
    </body>

</html>