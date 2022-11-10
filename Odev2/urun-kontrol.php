<?php
session_start();

$adet = $_POST["adet"];
$urunad = $_POST["urunad"];
$urunfiyat = $_POST["urunfiyat"];


// if (strlen($adet) < 0) {
//   echo "<script>
//   alert('Ürün Eklemelisizin!');
//   window.top.location = 'index.php';
// </script>";
// die();
// } 


$dosya = fopen("urunler.txt", "abt");
$sonuc = fwrite($dosya, "$urunad | $urunfiyat | $adet\n");
fclose($dosya);

if ($sonuc) {
  echo "<script>
  alert('Başarılı: $urunad Kayıt Edildi!');
  window.top.location = 'urun-ekle.php';
</script>";
} else {
  echo header("Location:index.php");
}
