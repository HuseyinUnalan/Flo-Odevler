<?php
require_once 'baglan.php';
require_once 'fonksiyon.php';



$tcdogrula = new Kurallar();
$tcdogrula->dogrula();


if ($_POST) {

  $adsoyad = $_POST["adsoyad"];
  $tckimlik = $_POST["tckimlik"];




  $sorgu = $baglan->prepare("insert into kayitlar values (?,?,?)");
  $ekle = $sorgu->execute(array(NULL, "$adsoyad", "$tckimlik"));

  if ($sorgu && $tcdogrula->rule() == true) {
    echo "<script>alert('Geçerli : Geçerli Kimlik Bilgisi'); window.location.href='index.php'; </script>";
  } else {
    echo
    "<script>alert('Geçersiz : Geçersiz Kimlik Bilgisi!'); window.location.href='index.php'; </script>";
  }
}
