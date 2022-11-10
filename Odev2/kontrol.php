<?php

session_start();

$adet = $_POST["adet"];
$urunad = $_POST["urunad"];
$urunfiyat = $_POST["urunfiyat"];


if (strlen($adet) < 0) {
  echo header("Location:index.php");
  die();
}

if ($adet <= 0) {
  echo header("Location:index.php");
} else {
  $dosya = fopen("urunler.txt", "abt");
  $sonuc = fwrite($dosya, "$urunad | $urunfiyat | $adet\n");
  fclose($dosya);
}




if ($sonuc) {
  echo header("Location:index.php");
} else {
  echo header("Location:index.php");
}


// $urunad = $_POST["urunad"]; ile denicem

// else if ($adet >= 0 && $urunad == $_POST["urunad"] && $urunfiyat == $_POST["urunfiyat"]) {
//   $dosya = fopen("urunler-listesi.txt", "abt");
//   $sonuc = fwrite($dosya, $_POST['urunad'] . " | " . $_POST["urunfiyat"] . " | " . "$adet" . "\n" );
//   fclose($dosya);
// }