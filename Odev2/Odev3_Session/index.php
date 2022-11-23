<?php
session_start();

$urunler = array(
   array("id" => "urun1", "urun" => "Ülker Çikolatalı Gofret 40 gr", "fiyat" => "10"),
   array("id" => "urun2", "urun" => "Nestle Bitter Çikolata 50 gr", "fiyat" => "20"),
   array("id" => "urun3", "urun" => "Eti Damak Kare Çikolata 60 gr", "fiyat" => "30"),

);
?>
<!DOCTYPE html>
<html lang="tr">

<head>
   <title>Sepet Uygulaması</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="icon" href="huseyi.png">
</head>

<body>

   <div class="container mt-5">
      <table class="table">
         <tr>
            <td>Ürün</td>
            <td>Fiyat</td>
            <td>Adet</td>
            <td>Kaydet</td>
         </tr>

         <?php




         foreach ($urunler as $urun) { ?>
            <tr>
               <td><?php echo $urun["urun"]; ?></td>
               <td><?php echo $urun["fiyat"]; ?> TL</td>

               <form action="islem.php?durum=ok" method="POST">
                  <td>
                     <div class="form-group">
                        <input type="number" name="adet" class="form-control" required>
                     </div>
                  </td>

                  <input type="hidden" name="urun" value="<?php echo $urun["id"] ?>">

                  <td>
                     <button class="btn btn-primary">Kaydet</button>
               </form>
               </td>
            </tr>
         <?php   } ?>






      </table>
   </div>

   <br><br><br><br>


   <?php




   if (@$_SESSION["sepet"] > 0) { ?>
      <div class="container mt-5">
         <table class="table">
            <tr>
               <td>Ürün</td>
               <td>Adet</td>
               <td>Toplam</td>
            </tr>

            <?php
            $sepettoplam = 0;

            foreach ($_SESSION["sepet"] as $id => $adet) {
               $urunsira = array_search($id, array_column($urunler, 'id'));
               $urunad = $urunler[$urunsira]["urun"];
               $urunfiyat = $urunler[$urunsira]["fiyat"];
               $uruntoplam = $adet * $urunfiyat;
               $sepettoplam += $uruntoplam;
            ?>

               <tr>
                  <td><?php echo $urunad ?></td>
                  <td><?php echo $adet ?></td>
                  <td><?php echo $uruntoplam ?> TL</td>
               </tr>
            <?php   } ?>

         </table>
      </div>

      <hr>
      <h4 class="text-center">Sepet Toplamı: <?php echo $sepettoplam ?> TL</h4>
   <?php } else { ?>
      <h1 class="text-center">Sepet Boş!</h1>
   <?php } ?>

   <br><br>
   <div class="container">
      <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
   </div>
   <br><br>
</body>

</html>