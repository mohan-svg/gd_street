<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>GRAD STREET</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    <link rel="icon" href="<?php echo base_url('images/icons/gs_logo_54x54.png') ?>"  />
    
   <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="<?php echo base_url('assets2/lib/bootstrap/css/bootstrap.min.css') ?>" >
   <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>"> -->
  <!--   <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>"> -->
  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('assets2/lib/animate/animate.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets2/lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets2/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets2/lib/magnific-popup/magnific-popup.css') ?>" rel="stylesheet">
  <!-- Data Table -->
  <!-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets2/dataTable/jquery.dataTables.min.css') ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('assets2/css/style.css') ?>" rel="stylesheet">
<style type="text/css">
   /* #nav-menu-container>ul>li>a, ul>li>a, .menu-has-children>ul>li>a {
        font-weight: bold;
    } */

    .row{
      width: 100%;
    }

    @media screen and (min-width: 769px){
      .padding_right_left{
        padding-left:20px; 
        padding-right:20px;
      }
    }
</style>
   
     </head>
  <body>
	   <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="<?php echo site_url('home')?>" class="scrollto">GRAD STREET</a></h1>
       
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo site_url('home')?>">Home</a></li>
         
          <li class="menu-has-children"><a href="#">Universities</a>
            <ul>
              
              <li class="menu-has-children"><a href="#">Country-Wise</a>
                <ul>
                  <li><a href="<?php echo site_url('university')?>">Top Universities in USA</a></li>
                  
                </ul>
              </li>
              <li class="menu-has-children"><a href="#">Course-Wise</a>
                <ul>
                  <li><a href="#">MS Computer Science</a></li>
                  <li><a href="#">MCS Big Data</a></li>
                  <li><a href="#">MS Engineering Management</a></li>
                  <li><a href="#">MS Electrical Engineering</a></li>
                  <li><a href="#">MS Construction Management</a></li>
                </ul>
              </li>

              <li class="menu-has-children"><a href="#">Profile-Wise</a>
                <ul>
                  <li><a href="<?php echo site_url('ms_finders')?>">MS University Finder</a></li>
                  <li><a href="#">MS University Deadlines</a></li>
                  
                </ul>
              </li>
             
            </ul>
          </li>
          <li class="menu-has-children"><a href="#">Services</a>
            <ul>
              <li><a href="<?php echo site_url('university')?>">Apply Now</a></li>
              <li><a href="<?php echo site_url('admit_rejects')?>">Admit-Rejects</a></li>              
              <li><a href="<?php echo site_url('ms_finders')?>">MS University Finder</a></li>
              <li><a href="#">MS University Deadlines</a></li>
              <li><a href="#">GRE Preparation</a></li>
              
            </ul>
          </li>

          <li><a href="<?php  //echo base_url('newscontent/'.$val)?>">University News</a></li>

          <?php if(!($this->session->userdata('logged_in'))){ ?>
            <li><a href="<?php echo site_url('sign_up') ?>">Sign Up</a></li>
          <?php } ?>
          <?php if($this->session->userdata('logged_in')){ ?>
            <li class="menu-has-children"><a href="#"><?php echo $this->session->userdata('name'); ?></a>
              <ul>
                <li><a href="<?php echo site_url('view_profile') ?>">View Profile</a></li>
                
                <li><a href="#">Add New Application</a></li>
                <li><a href="#">Send Your Transcript</a></li>
                <li><a href="#">Send Scores to University</a></li>
                <li><a href="<?php echo site_url('user_logout') ?>">Logout</a></li>
              </ul>
            </li>

          <?php } else{ ?>

          <li><a href="<?php echo site_url('login') ?>">Login</a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </header>
 <!-- Data Table -->
<script src="<?php echo base_url('assets2/dataTable/jquery-3.3.1.js')?>"></script>