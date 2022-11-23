<?php

require_once 'baglan.php';

?>


<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Form Sayfası</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="huseyin.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <?php require_once 'menu.php'; ?>
  
  <div class="container mt-5">

    <h2>Kayıt Formu</h2>
    <hr>
    <form action="islem.php" method="POST">

      <div class="form-group">
        <label>Adınız Soyadınız:</label>
        <input type="text" class="form-control" placeholder="Ad Soyad" name="adsoyad">
      </div>

      <div class="form-group">
        <label>Telefon:</label>
        <input type="text" class="form-control" placeholder="Telefon Numarası" name="telefon">
      </div>

      <button type="submit" class="btn btn-primary">Bilgileri Kaydet</button>
    </form>

    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>

  </div>

</body>

</html>
