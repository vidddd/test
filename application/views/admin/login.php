<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>American Tourister</title>

        <!-- Vendor CSS -->
        <link href="<?php echo base_url('resources/admin/');?>vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/');?>vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="<?php echo base_url('resources/admin/');?>css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/');?>css/app.min.2.css" rel="stylesheet">
    </head>

    <body class="login-content">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
            <img src="<?php echo base_url();?>resources/web/images/logo.png" style="position: absolute; top: -100%; left: 50%; width: 40%; transform: translate(-50%, 0);-webkit-transform: translate(-50%, 0);" />
            <?php echo form_open(base_url('adm-gst'),'id="form-login"');?>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input name="user" type="text" class="form-control" placeholder="Usuario">
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                    <div class="fg-line">
                        <input name="pass" type="password" class="form-control" placeholder="Contraseña">
                    </div>
                </div>

                <div class="clearfix"></div>


                <a href="#" class="btn btn-login btn-dark btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>
            </form>


        </div>


        <!-- Javascript Libraries -->
        <script src="<?php echo base_url('resources/admin/');?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url('resources/admin/');?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url('resources/admin/');?>vendors/bower_components/Waves/dist/waves.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url('resources/admin/');?>js/functions.js"></script>

    </body>
</html>