<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="huseyin.png">
</head>

<body>

  <div class="container">
    <br><br><br>


    <?php



    $dosya = fopen("urunler.txt", "rb");
    while (!feof($dosya)) {
      $satirlar[] = fgets($dosya);
    }
    fclose($dosya);


    ?>
    <a href="urun-ekle.php" target="_blank"> <button class="btn btn-warning text-white"> Ürün Ekle</button> </a>
    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
    <br><br><br>
    <table class="table">
      <thead>
        <tr>
          <th>Ürün Sıra</th>
          <th>Ürün Adı</th>
          <th>Ürün Fiyatı</th>
          <th>Adet</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sayi = 0;
        foreach ($satirlar as $satir) {
          $veri = explode(" | ", $satir);
          if (count($veri) == 3 && $veri[2] == 0) {
            $sayi++;
        ?>

            <tr>
              <form action="kontrol.php" method="POST">
                <td>
                  <?php echo $sayi ?>
                </td>
                <td>
                  <input type="hidden" name="urunad" value="<?php echo $veri[0] ?>">
                  <?php echo $veri[0] ?>
                </td>

                <td>
                  <input type="hidden" name="urunfiyat" value="<?php echo $veri[1] ?>">
                  <?php echo $veri[1] ?>
                  TL
                </td>

                <td><input type="number" name="adet"> </td>

                <td><input type="submit" class="btn btn-primary" value="Ürünü Sepete Ekle"></td>

            </tr>
            </form>
        <?php }
        } ?>






      </tbody>

    </table>


    <br><br>


    <br><br>
    <?php
    $sayac = 0;
    $satirlar = array();
    $dosya = fopen("urunler.txt", "rb");
    while (!feof($dosya)) {
      $satirlar[] = fgets($dosya);
    }
    fclose($dosya);




    echo "<table class='table'>
    <thead> 
    <tr>
      <td>Sepet Sıra</td>
      <td>Ürün Adı</td>
      <td>Adet</td>
      <td>Toplam</td>
      </tr>
      </thead>";



    foreach ($satirlar as $satir) {
      $veri = explode(" | ", $satir);
      if (count($veri) == 3 && $veri[2] > 0) {
        $sayac++;
        $toplam = $veri[1] * $veri[2];

        @$geneltoplam += $toplam;




        // $geneltoplam = count($veri) * $toplam;

        echo "<tr>
            <td>$sayac</td>
            <td>$veri[0]</td>
            <td>$veri[2]</td>
            <td>$toplam TL</td>
            
            </tr>
            ";
      }
    }

    if (@$geneltoplam > 0) {
      echo "<tfoot>
    <tr>
    <th>Genel Toplam</th>
    <th></th>
    <th></th>
    <th>$geneltoplam TL</th>
    </tr>
    </tfoot>";
      echo "</table>";
    } else {
      echo "
      <tr>
      <td><h1>Sepet Boş</h1></td>
      <td></td>
      <td></td>
      <td></td>
      </tr>";
    }
    ?>



  </div>


</body>

</html>