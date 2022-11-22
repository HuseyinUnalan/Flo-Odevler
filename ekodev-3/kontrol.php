<?php
require_once ('fonksiyon.php');
require_once ('baglan.php');


$adsoyad = guvenlik($_POST["adsoyad"]);
$email = guvenlik($_POST["email"]);
$telefon = guvenlik($_POST["telefon"]);



$sorgu = $baglan->prepare("insert into kayitlar values (?,?,?,?)");
$ekle = $sorgu->execute(array(NULL, "$adsoyad", "$email", "$telefon"));


if ($sorgu) {
  echo "<script>
  alert('Başarılı: $adsoyad Kayıt Edildi!');
  window.top.location = 'index.php';
</script>";
} else {
  echo "<script>
  alert('Hata: $adsoyad Kayıt Edilemedi!');
  window.top.location = 'index.php';
</script>";
}
