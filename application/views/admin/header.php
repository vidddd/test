<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>American Tourister</title>

        <!-- Vendor CSS -->
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/animate.css/animate.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/bower_components/chosen/chosen.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/vendors/summernote/dist/summernote.css')?>" rel="stylesheet">

        <!-- CSS -->
        <link href="<?php echo base_url('resources/admin/css/app.min.1.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/css/app.min.2.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/admin/css/custom.css')?>" rel="stylesheet">

    </head>
    <body class="sw-toggled">
        <input type="hidden" id="base_admin" value="<?php echo base_url('adm-gst')?>">
        <input type="hidden" id="section" value="<?php echo $this->uri->segment(2);?>">
        <header id="header" class="clearfix" data-current-skin="sod">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="<?php echo base_url('adm-gst/dashboard')?>"><img src="<?php echo base_url('/resources/web/images/logo_1.png')?>" alt="" width="70" ></a>
                </li>

               <!--  <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>


                    </ul>
                </li> -->
            </ul>


            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                    <input type="text">
                </div>
            </div>
        </header>