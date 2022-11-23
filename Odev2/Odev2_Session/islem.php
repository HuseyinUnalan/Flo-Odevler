<?php
session_start();

$adet = $_POST["adet"];
$urun = $_POST["urun"];
$urunid = $_GET["urunid"];

if ($_GET["durum"] == "ok") {
  if ($adet > 0) {
    $_SESSION["sepet"][$urun] = $adet;
  }
  header("Location:index.php");
} else {
  header("Location:index.php");
}
