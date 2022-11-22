<?php

//Başka Yol

@$urun = $_POST["urun"];
@$kg = $_POST["kg"];
@$birimfiyat = $_POST["birimfiyat"];
@$durum = $_POST["durum"];


if ($durum == 1) {
  $toplam = $birimfiyat * $kg;
  $kdv = $toplam * 18 / 100;
  $geneltoplam = $toplam + $kdv;
} else if ($durum == 0 && $urun == "kekik") {
  $fiyat = $birimfiyat * $kg;
  $fark = ($birimfiyat *  10 / 100) * $kg;
  $toplam = ($fiyat - $fark);
  $kdv = $toplam * 18 / 100;
  $geneltoplam = $toplam + $kdv;
} else if ($durum == 0 && $urun == "nane") {
  $fiyat = $birimfiyat * $kg;
  $fark = ($birimfiyat *  20 / 100) *  $kg;
  $toplam = ($fiyat - $fark);
  $kdv = $toplam * 18 / 100;
  $geneltoplam = $toplam + $kdv;
} else if ($durum == 0 && $urun == "feslegen") {
  $fiyat = $birimfiyat * $kg;
  $fark = ($birimfiyat *  10 / 100) *  $kg;
  $toplam = ($fiyat - $fark);
  $kdv = $toplam * 18 / 100;
  $geneltoplam = $toplam + $kdv;
} else if ($durum == 0 && $urun == "reyhan") {
  $fiyat = $birimfiyat * $kg;
  $fark = ($birimfiyat *  25 / 100) *  $kg;
  $toplam = ($fiyat - $fark);
  $kdv = $toplam * 18 / 100;
  $geneltoplam = $toplam + $kdv;
}


?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Aktar 2. Yol</title>
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
    <form action="index-2.php" method="POST">

      <div class="form-group">
        <label>Ürün Seçin</label>
        <select class="form-control" name="urun" required="">
          <option value="nane">Nane</option>
          <option value="kekik">Kekik</option>
          <option value="feslegen">Fesleğen</option>
          <option value="reyhan">Reyhan</option>
        </select>
      </div>

      <div class="form-group">
        <label>Fiyat</label>
        <input type="text" class="form-control" name="birimfiyat" required="">
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
      <li class="list-group-item">Birim Fiyat : <?php echo $birimfiyat ?> TL</li>

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
      <li class="list-group-item">İşlem Tutarı : <?php echo $fiyat ?> TL </li>
      <li class="list-group-item">Tazelik Etkisi : - <?php echo $fark ?> TL </li>
      <?php } ?>

      <li class="list-group-item">Tutar : <?php echo $toplam ?> TL </li>
      <li class="list-group-item">KDV(%18) : <?php echo $kdv ?> TL </li>
      <li class="list-group-item">Ödenecek Tutar: <?php echo $geneltoplam ?> TL </li>

    </ul>


  </div>

  <?php } ?>
  <div class="container mt-5 mb-5">
    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
  </div>
</body>

</html>