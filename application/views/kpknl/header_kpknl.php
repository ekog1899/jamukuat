<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="<?= base_url('assets/'); ?>css/bootstrap-datepicker.css" rel="stylesheet"> -->
	<!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>select2/dist/css/select2.css" rel="stylesheet">
  
    <link href="<?= base_url('assets/'); ?>select2/dist/css/select2-bootstrap4.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url('assets');?>/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
    <!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>select2/dist/js/select2.js"></script>
    
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

<!-- menu  -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-balance-scale"></i>
        </div>
        <div class="sidebar-brand-text mx-2">JAMU KUAT</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div id='showmenu'></div>
        
    <!-- <hr class="sidebar-divider mt-3"> -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("kpknl"); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>KPKNL</span>
        </a>
    </li>
    <!-- Divider -->
   

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
