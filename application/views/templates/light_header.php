<!doctype html>
<html lang="en">
<head>
        <meta name="robots" content="index, follow"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>Lightweight Admin Template</title>


        <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('css/fontawesome-all.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('css/bootadmin.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('css/datatables.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('css/bootstrap-datepicker.css')?>">
        <!-- bootstrap-datepicker.css.map -->

</head>

<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary ">
    <a class="sidebar-toggle mr-2" href="#"><i class="fa fa-bars"></i></a>
    <img src="<?= base_url('vendor/img/logo1.jpg')?>" class="img-logo">
    <a class="navbar-brand" href="#">SIM RS Berlian Kasih</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$namauser[0]['nama_user']; ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="#" class="dropdown-item">Profile</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>