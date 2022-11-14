<?php

require_once 'baglan.php';
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Liste Sayfası</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="huseyin.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
  .border {
    text-align: center;
  }
</style>

<body>

  <div class="container mt-5">
    <table class="table">
      <thead>
        <tr>
          <th>Ad Soyad</th>
          <th>Telefon</th>
          <th>İşlem</th>
        </tr>
      </thead>
      <tbody>


        <?php


        $sirano = 0;
        $sorgu = $baglan->query("SELECT * FROM kayitlar", PDO::FETCH_ASSOC);
        $sorgu->execute();
        $kayitsayisi = $sorgu->rowCount();
        $sirano++;

        foreach ($sorgu as $satir) {

        ?>

          <tr>
            <td><?php echo $satir["adsoyad"] ?></td>
            <td><?php echo $satir["telefon"] ?></td>
            <td><a href="islem.php?id=<?php echo $satir["id"]; ?>&sil=ok">Sil</a></td>
          </tr>


        <?php } ?>



      </tbody>
    </table>

    <p class="border">Sistemde Toplam - <b><?php echo $kayitsayisi ?> </b> - Kişi Var.</p>

    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>

  </div>

</body>

</html>