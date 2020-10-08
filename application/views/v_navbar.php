<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Selamat datang</title>
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/datatables.min.css"/>
		<style>
		.footer {
		  position: fixed;
		  left: 0;
		  bottom: 0;
		  width: 100%;
		  background-color: #3cb371;
		  color: white;
		  text-align: center;
		}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light mb-4 text-white" style="background-color: #3cb371;">
		  <a class="navbar-brand" href="http://rdpian.my.id">
		  SPPD</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link text-white" href="/appsurat">Beranda <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-white" href="<?php echo base_url();?>index.php/surat_keluar/tambah_sk">Tambah Surat Perintah <span class="sr-only">(current)</span></a>
		      </li>
		    </ul>
		  <div><a href="<?php echo base_url();?>index.php/app/pembuat" class="text-decoration-none text-white">Tentang Pembuat</a></div>
		  </div>
		</nav>