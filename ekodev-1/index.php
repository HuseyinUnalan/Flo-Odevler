<?php



@$urun = $_POST["urun"];
@$kg = $_POST["kg"];
@$durum = $_POST["durum"];

function otBirimFiyat($urun)
{
	if ($urun == "kekik") {
		echo 50;
	} else if ($urun == "nane") {
		echo 75;
	} else if ($urun == "feslegen") {
		echo 100;
	} else if ($urun == "reyhan") {
		echo 90;
	}
}

function toplamTutar($urun, $kg)
{
	if ($urun == "kekik") {
		echo 50 * $kg;
	} else if ($urun == "nane") {
		echo 75 * $kg;
	} else if ($urun == "feslegen") {
		echo 100 * $kg;
	} else if ($urun == "reyhan") {
		echo 90 * $kg;
	}
}



function tazelikEtkisi($urun, $durum, $kg)
{
	if ($durum == 1 && $urun == "kekik") {
		echo 50 * $kg;
	} else if ($durum == 1 && $urun == "nane") {
		echo 75 * $kg;
	} else if ($durum == 1 && $urun == "feslegen") {
		echo 100 * $kg;
	} else if ($durum == 1 && $urun == "reyhan") {
		echo 90 * $kg;
	} else if ($durum == 0 && $urun == "kekik") {
		echo (50 * $kg) * 10 / 100;
	} else if ($durum == 0 && $urun == "nane") {
		echo (75 * $kg) * 20 / 100;
	} else if ($durum == 0 && $urun == "feslegen") {
		echo (100 * $kg) * 10 / 100;
	} else if ($durum == 0 && $urun == "reyhan") {
		echo (90 * $kg) * 25 / 100;
	}
}

function tazelikSonrasıTutar($urun, $durum, $kg)
{
	if ($durum == 1 && $urun == "kekik") {
		echo 50 * $kg;
	} else if ($durum == 1 && $urun == "nane") {
		echo 75 * $kg;
	} else if ($durum == 1 && $urun == "feslegen") {
		echo 100 * $kg;
	} else if ($durum == 1 && $urun == "reyhan") {
		echo 90 * $kg;
	} else if ($durum == 0 && $urun == "kekik") {
		echo (50 * $kg)  -  (50 * $kg) * 10 / 100;
	} else if ($durum == 0 && $urun == "nane") {
		echo (75 * $kg)  - (75 * $kg) * 20 / 100;
	} else if ($durum == 0 && $urun == "feslegen") {
		echo (100 * $kg)  - (100 * $kg) * 10 / 100;
	} else if ($durum == 0 && $urun == "reyhan") {
		echo (90 * $kg)  - (90 * $kg) * 25 / 100;
	}
}

function kdv($urun, $durum, $kg)
{
	if ($durum == 1 && $urun == "kekik") {
		echo (50 * $kg) * 18 / 100;
	} else if ($durum == 1 && $urun == "nane") {
		echo (75 * $kg) * 18 / 100;
	} else if ($durum == 1 && $urun == "feslegen") {
		echo (100 * $kg) * 18 / 100;
	} else if ($durum == 1 && $urun == "reyhan") {
		echo (90 * $kg) * 18 / 100;
	} else if ($durum == 0 && $urun == "kekik") {
		echo ((50 * $kg)  -  (50 * $kg) * 10 / 100) * 18 / 100;
	} else if ($durum == 0 && $urun == "nane") {
		echo ((75 * $kg)  - (75 * $kg) * 20 / 100) * 18 / 100;
	} else if ($durum == 0 && $urun == "feslegen") {
		echo ((100 * $kg)  - (100 * $kg) * 10 / 100) * 18 / 100;
	} else if ($durum == 0 && $urun == "reyhan") {
		echo ((90 * $kg)  - (90 * $kg) * 25 / 100) * 18 / 100;
	}
}

function genelToplam($urun, $durum, $kg)
{
	if ($durum == 1 && $urun == "kekik") {
		echo (50 * $kg) + ((50 * $kg) * 18 / 100);
	} else if ($durum == 1 && $urun == "nane") {
		echo (75 * $kg) + ((75 * $kg) * 18 / 100);
	} else if ($durum == 1 && $urun == "feslegen") {
		echo (100 * $kg) + ((100 * $kg) * 18 / 100);
	} else if ($durum == 1 && $urun == "reyhan") {
		echo (90 * $kg) + ((90 * $kg) * 18 / 100);
	} else if ($durum == 0 && $urun == "kekik") {
		echo (((50 * $kg)  -  (50 * $kg) * 10 / 100) * 18 / 100) + ((50 * $kg)  -  (50 * $kg) * 10 / 100);
	} else if ($durum == 0 && $urun == "nane") {
		echo (((75 * $kg)  - (75 * $kg) * 20 / 100) * 18 / 100) + ((75 * $kg)  - (75 * $kg) * 20 / 100);
	} else if ($durum == 0 && $urun == "feslegen") {
		echo (((100 * $kg)  - (100 * $kg) * 10 / 100) * 18 / 100) + ((100 * $kg)  - (100 * $kg) * 10 / 100);
	} else if ($durum == 0 && $urun == "reyhan") {
		echo (((90 * $kg)  - (90 * $kg) * 25 / 100) * 18 / 100) + ((90 * $kg)  - (90 * $kg) * 25 / 100);
	}
}



?>

<!DOCTYPE html>
<html lang="tr">

<head>
	<title>Aktar 1. Yol</title>
	<meta charset="utf-8">
	<link rel="icon" href="huseyin.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

	<div class="container mt-5">
		<form action="index.php" method="POST">

			<div class="form-group">
				<label>Ürün Seçin</label>
				<select class="form-control" name="urun" required="">
					<option value="kekik">Kekik / 50 TL</option>
					<option value="nane">Nane / 75 TL</option>
					<option value="feslegen">Fesleğen / 100 TL</option>
					<option value="reyhan">Reyhan / 90 TL</option>
				</select>
			</div>


			<div class="form-group">
				<label>Kg</label>
				<input type="text" class="form-control" name="kg" required="">
			</div>

			<div class="form-group">
				<label>Durum</label>
				<select class="form-control" name="durum" required="">
					<option value="1">Taze</option>
					<option value="0">Taze Değil</option>
				</select>
			</div>





			<button type="submit" class="btn btn-primary">Hesapla</button>
		</form>
	</div>

	<?php

	if (@$urun != "") { ?>



	<div class="container mt-5 mb-5">
		<ul class="list-group">
			<li class="list-group-item">Tür : <?php echo $urun; ?></li>
			<li class="list-group-item">Miktar : <?php echo $kg ?> Kg</li>
			<li class="list-group-item">Birim Fiyat : <?php echo otBirimFiyat($urun) ?> TL</li>

			<li class="list-group-item">Tazelik Durumu :
				<?php
				if ($durum == 1) { ?>
				Taze
				<?php } else { ?>
				Taze Değil
				<?php } ?>
			</li>
			<?php

        //Ürün Taze Değilse Çalışacak
			if ($_POST['durum'] == 0) { ?>
			<li class="list-group-item">İşlem Tutarı : <?php toplamTutar($urun, $kg) ?> TL </li>
			<li class="list-group-item">Tazelik Etkisi : - <?php echo tazelikEtkisi($urun, $durum, $kg) ?> TL </li>
			<?php } ?>

			<li class="list-group-item">Tutar : <?php echo tazelikSonrasıTutar($urun, $durum, $kg); ?> </li>
			<li class="list-group-item">KDV(%18) : <?php echo kdv($urun, $durum, $kg) ?> TL </li>
			<li class="list-group-item">Ödenecek Tutar: <?php echo genelToplam($urun, $durum, $kg) ?> TL </li>

		</ul>


	</div>

	<?php } ?>
	<div class="container mt-5 mb-5">
		<a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
	</div>
</body>

</html>