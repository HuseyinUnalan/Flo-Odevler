<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'netting/baglan.php';
require_once 'fonksiyon.php';



?>

<!DOCTYPE html>
<html lang="tr">


<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Flo Akademi Giriş Paneli </title>
	<!--favicon-->
	<link rel="icon" href="images\huseyin.png" type="image/x-icon">
	<!-- Bootstrap core CSS-->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!-- animate CSS-->
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
	<!-- Icons CSS-->
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<!-- Custom Style-->
	<link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-dark">
	<!-- Start wrapper-->
	<div id="wrapper">
		<div class="card card-authentication1 mx-auto my-5">
			<div class="card-body">
				<div class="card-content p-2">
				
					<div class="card-title text-uppercase text-center py-3">Giriş Ekranı</div>

					<form action="netting/islem.php" method="POST">

						<div class="form-group">
							<label for="exampleInputUsername" class="">Kullanıcı Adı</label>
							<div class="position-relative has-icon-right">
								<input type="text" name="kullanici_mail" class="form-control input-shadow" placeholder="Kullanıcı Adı Giriniz">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="">Şifre</label>
							<div class="position-relative has-icon-right">
								<input type="password" name="kullanici_password" class="form-control input-shadow" placeholder="Şifre Giriniz">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>

						<button class="btn btn-primary btn-login text-uppercase fw-bold" name="admingiris" type="submit">Giriş Yap</button>



					</form>

				</div>
			</div>
		</div>

		<!--Start Back To Top Button-->
		<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
		<!--End Back To Top Button-->
	</div>
	<!--wrapper-->

	<!-- Bootstrap core JavaScript-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from codervent.com/rukada/color-admin/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Jan 2019 10:38:45 GMT -->

</html>