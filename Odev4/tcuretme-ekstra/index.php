<?php

$sayi1 = rand(1, 9);
$sayi2 = rand(0,9);
$sayi3 = rand(0,9);
$sayi4 = rand(0,9);
$sayi5 = rand(0,9);
$sayi6 = rand(0,9);
$sayi7 = rand(0,9);
$sayi8 = rand(0,9);
$sayi9 = rand(0,9);
$sayi10 = rand(0,9);
$sayi11 = rand(0,9);




$sayi10 = ((($sayi1 + $sayi3 + $sayi5 + $sayi7 + $sayi9) * 7) - ($sayi2 + $sayi4 + $sayi6 + $sayi8)) % 10;

$sayi11 = ($sayi1 + $sayi2 + $sayi3 + $sayi4 + $sayi5 + $sayi6 + $sayi7 + $sayi8 + $sayi9 + $sayi10) % 10;




?>




<!DOCTYPE html>
<html lang="tr">

<head>
  <title>T.C. Kimlik Numarası Üret</title>
  <link rel="icon" type="image/x-icon" href="huseyin.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container text-center mt-5">
    <h2>T.C. Kimlik Numarası Üret</h2>


    <h1>

      <?php
      if (isset($_POST["button"])) {
        echo $sayi1 . $sayi2 . $sayi3 . $sayi4 . $sayi5 . $sayi6 . $sayi7 . $sayi8 . $sayi9 . $sayi10 . $sayi11;
      } else {
        echo "Butona Basın";
      }
      ?>


    </h1>

    <form action="" method="POST">
      <button type="submit" name="button" class="btn btn-primary btn-md mt-5">T.C. Üret</button>
    </form>


    <br><br>  
    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
  </div>

</body>

</html>