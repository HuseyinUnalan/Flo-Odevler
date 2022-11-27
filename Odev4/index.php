<?php

require_once 'baglan.php';

?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>T.C. Kimlik Geçerlilik Durumu Sorgulama</title>
  <link rel="icon" href="huseyin.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-5">
    <form action="islem.php" method="POST">

      <div class="form-group">
        <label>Ad Soyad</label>
        <input type="text" class="form-control" name="adsoyad">
      </div>
      <div class="form-group">
        <label for="pwd">T.C. Kimlik</label>
        <input type="number" class="form-control" name="tckimlik">
      </div>

      <button type="submit" class="btn btn-primary">Doğrula ve Kaydet</button>
    </form>
  </div>


  <div class="container mt-5">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Ad Soyad</th>
          <th>T.C. Kimlik</th>
          <th>Durum</th>
        </tr>
      </thead>
      <tbody>

        <?php

      


        $sorgu = $baglan->query("SELECT * FROM kayitlar", PDO::FETCH_ASSOC);
        $sorgu->execute();
        $kayitsayisi = $sorgu->rowCount();



        foreach ($sorgu as $satir) {


      

          if (strlen($satir["tckimlik"]) == 11) {
            $tekhanelertoplamı = (substr($satir["tckimlik"], 0, 1) + substr($satir["tckimlik"], 2, 1) + substr($satir["tckimlik"], 4, 1) +
              substr($satir["tckimlik"], 6, 1) + substr($satir["tckimlik"], 8, 1));
          }
          if (strlen($satir["tckimlik"]) == 11) {
            $cifthanelerintoplamı = (substr($satir["tckimlik"], 1, 1) + substr($satir["tckimlik"], 3, 1) + substr($satir["tckimlik"], 5, 1) +
              substr($satir["tckimlik"], 7, 1));
          }

          if (strlen($satir["tckimlik"]) == 11) {
            $hanelerintoplam =  (substr($satir["tckimlik"], 0, 1) + substr($satir["tckimlik"], 1, 1) + substr($satir["tckimlik"], 2, 1) +
              substr($satir["tckimlik"], 3, 1) + substr($satir["tckimlik"], 4, 1) + substr($satir["tckimlik"], 5, 1) + substr($satir["tckimlik"], 6, 1) +
              substr($satir["tckimlik"], 7, 1) + substr($satir["tckimlik"], 8, 1) + substr($satir["tckimlik"], 9, 1));
          }


          $kuralBir = (($tekhanelertoplamı * 7) - $cifthanelerintoplamı) % 10 == substr($satir["tckimlik"], 9, 1);
          $kuralIki = $hanelerintoplam % 10 == substr($satir["tckimlik"], 10, 1);
          $kuralUc = strlen($satir["tckimlik"]) == 11;
          $kuralDort = substr($satir["tckimlik"], 0, 1) != 0;

          ?>
          <tr>
            <td><?php echo $satir["id"] ?></td>
            <td><?php echo $satir["adsoyad"] ?></td>
            <td><?php echo $satir["tckimlik"] ?></td>
            <td>
              <?php
              if ($kuralBir == true && $kuralIki == true && $kuralUc == true && $kuralDort == true) {
                echo "T.C. Kimlik Geçerli";
              } else {
                echo "T.C. Kimlik Geçersiz";
              }


              ?>
            </td>
          </tr>

          <?php } ?>


        </tbody>
      </table>
    </div>
    <div class="container mt-5 mb-5">
      <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
    </div>
  </body>

  </html>