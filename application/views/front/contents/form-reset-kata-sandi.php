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

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>adminBSB/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>adminBSB/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Ayo Menanam</b></a>
            <small>Gerakan Ayo Menanam - Kabupaten Blitar</small>
        </div>
        <div class="card">
            <div class="body">
				<form action="<?php echo base_url();?>auth/perbaruipassword" method="post" role="form">
                    <?php
							$info = $this->session->flashdata('info');
							if(!empty($info))
							{
								echo $info;
							}
					?>    
					<div class="msg">Hai <?php echo $nama; ?>, buat password baru Anda</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" required>
                            <input type="hidden" class="form-control" name="id_pengguna" id="id_pengguna" value="<?php echo $id_pengguna; ?>" required>
                            <input type="hidden" class="form-control" name="key" id="key" value="<?php echo $key; ?>" required>
                            <input type="hidden" class="form-control" name="hash" id="hash" value="<?php echo $hash; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>adminBSB/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>adminBSB/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>adminBSB/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>adminBSB/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>adminBSB/js/pages/examples/sign-in.js"></script>
</body>

</html>