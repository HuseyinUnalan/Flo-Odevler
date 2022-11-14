<?php

require_once 'baglan.php';

if ($_POST) {
  $adsoyad = $_POST["adsoyad"];
  $telefon = $_POST["telefon"];
  $sorgu = $baglan->prepare("insert into kayitlar values (?,?,?)");
  $ekle = $sorgu->execute(array(NULL, "$adsoyad", "$telefon"));
  if ($sorgu) {
    echo
    "<script> window.location.href='index.php'; </script>";
  } else {
    echo
    "<script>alert('Hata : Kayıt Yapılamadı!'); window.location.href='index.php'; </script>";
  }
}


if ($_GET['sil'] == "ok") {
  $sil = $baglan->prepare("DELETE FROM kayitlar WHERE id=:id");
  $kontrol = $sil->execute(array('id' => $_GET['id']));
  if ($kontrol) {
    //  echo "<script>alert('Kayıt Silindi!'); window.location.href='liste.php?sil=ok'; </script>";
    header("location:liste.php?sil=ok");
  } else {
    header("location:liste.php?sil=no");
  }
}
