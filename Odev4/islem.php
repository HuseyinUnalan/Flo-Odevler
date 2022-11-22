<?php
require_once 'baglan.php';
require_once 'fonksiyon.php';





if ($_POST) {
  $adsoyad = $_POST["adsoyad"];
  $tckimlik = $_POST["tckimlik"];

  $sorgu = $baglan->prepare("insert into kayitlar values (?,?,?)");
  $ekle = $sorgu->execute(array(NULL, "$adsoyad", "$tckimlik"));



  if ($sorgu && $kuralBir == true && $kuralIki == true && $kuralUc == true && $kuralDort == true) {

    echo "<script>alert('Geçerli : Geçerli Kimlik Bilgisi'); window.location.href='index.php'; </script>";
  } else {
    echo
    "<script>alert('Geçersiz : Geçersiz Kimlik Bilgisi!'); window.location.href='index.php'; </script>";
  }
}
