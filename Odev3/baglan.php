<?php
session_start();

//PDO Bağlantısı

try {

  $baglan = new PDO("mysql:host=localhost;dbname=kisiler;charset=utf8", "root", "");
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

  echo $e->getMessage();
}

?>
