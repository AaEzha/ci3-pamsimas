<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?= $title ?? "PAMSIMAS"; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="apple-touch-icon" href="<?= base_url('assets/img/kemenkes.png'); ?>">
	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
	<div class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a href="<?=base_url();?>" class="navbar-brand">PAMSIMAS</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url();?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('about');?>">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('contact');?>">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('cek');?>">Cek Tagihan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('auth');?>">Sign in</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container mt-3">
		<!-- <div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Cerulean</h1>
					<p class="lead">A calm blue sky</p>
				</div>
			</div>
		</div> -->

		<?php $this->load->view($konten ?? "empty"); ?>


		<?php $this->load->view('home/footer'); ?>
