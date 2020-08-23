<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Grad Street</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('admin_panel/favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('admin_panel/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('admin_panel/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('admin_panel/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url('admin_panel/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url('admin_panel/css/style.css')?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('admin_panel/css/themes/all-themes.css')?>" rel="stylesheet" />
<style type="text/css">
    @media (max-width: 767px){

        .navbar .navbar-header {
                width: calc(60%);

        }

        .f-right{
            float: right;
        }

        .top-margin{
        top:0px;
    }
    .navbar .navbar-nav{
        margin-top: 0px;
    }

    }

    .top-margin{
        top:-15px;
    }


</style>


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



<nav class="navbar">
       <div class="container-fluid" style="margin-bottom:10px;">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo site_url('/admin/');?>"><b>Grad Street</b></a>
            </div>
            
                <ul class="nav navbar-nav navbar-right f-right" style="padding-right:20px;">

                    <?php if($this->session->userdata('logged_in'))
                    {?>
                    <!-- Call Search -->
                     <li class="top-margin" style="padding-right: 10px; text-align: center; "><a  name="username" href="#">
                                    <i class="material-icons">account_circle</i><br>
                    <?php echo $this->session->userdata('name');?></a></li>
                    <li><a type="button" name="signout" href="<?php echo site_url('admin_login/logout/');?>" class="btn btn-block btn-success btn-flat">Sign Out</a></li>
                    <!-- #END# Call Search -->
                    <?php }?>
                </ul>
                <div style="clear: both;"></div>
            
        </div>
</nav>