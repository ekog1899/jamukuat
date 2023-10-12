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
    <link href="<?= base_url('assets/bootstrap-5.2.0-beta1/css/bootstrap.min.css'); ?>" rel="stylesheet">
   
    <!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/bootstrap-5.2.0-beta1/js/bootstrap.bundle.min.js'); ?>"></script>

</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

<!-- menu  -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('help'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Panduan</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div id='showmenu'></div>
        
    <!-- <hr class="sidebar-divider mt-3"> -->
    <li class="nav-item">
        <a class="nav-link" href="#kpknl"> <i class="fas fa-fw fa-folder"></i><span>MEMULAI</span> </a> 
    </li>
    <li class="nav-item  ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_2" aria-expanded="false" aria-controls="collapseUtilities"><i class="fas fa-folder"></i><span>MENU</span></a>
        <div id="menu_2" class="collapse" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item " href="#Dashboard">Dashboard</a>
                <a class="collapse-item " href="#pks">PKS</a>
                <a class="collapse-item " href="#Perkara_Eksekusi">Perkara Eksekusi</a>
                <a class="collapse-item " href="#Data_Eksekusi">- Data Eksekusi</a>
                <a class="collapse-item " href="#Data_Eksekusi_HT">- Data Eksekusi HT</a>
                <a class="collapse-item " href="#Pengamanan">Pengamanan</a>
                <a class="collapse-item " href="#ATR_BPN">ATR/BPN</a>
                <a class="collapse-item " href="#KPKNL">KPKNL</a>
                <a class="collapse-item " href="#Disdukcapil">Disdukcapil</a>
                <a class="collapse-item " href="#bkd">BKD</a>
                <a class="collapse-item " href="#E_Tiket">E-Tiket</a>
                <a class="collapse-item " href="#Pengguna">Pengguna</a>
                <a class="collapse-item " href="#Profil">- Profil</a>
                <a class="collapse-item " href="#Manajemen_Pengguna">- Manajemen Pengguna</a>
                <a class="collapse-item " href="#Manajemen_Mitra">- Manajemen Mitra</a>
            </div>
        </div>
    </li>
   

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
