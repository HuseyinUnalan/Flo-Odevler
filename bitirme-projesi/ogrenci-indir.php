<?php

require_once 'netting/baglan.php';

// Fetch records from database 
$ogrencisor = $db->prepare("SELECT * FROM ogrenci ORDER BY ogrenci_id ASC");
$ogrencisor->execute();
if ($ogrencisor->fetchColumn() > 0) {
  $delimiter = ",";
  $filename = "ogrenci-listesi_" . date('Y-m-d') . ".csv";

  // Create a file pointer 
  $f = fopen('php://memory', 'w');

  // Set column headers 
  $fields = array(' ID | Ad Soyad | T.C. |  Okul Numarası | Cinsiyet | Doğum Tarihi | Adres | Telefon ');
  fputcsv($f, $fields, $delimiter,);

  // Output each row of the data, format line as csv and write to file pointer 
  while ($ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC)) {
    $lineData = array($ogrencicek['ogrenci_id'], $ogrencicek['ogrenci_adsoyad'], $ogrencicek['ogrenci_tc'], $ogrencicek['ogrenci_id'], $ogrencicek['ogrenci_cinsiyet'], $ogrencicek['ogrenci_dogum'], $ogrencicek['ogrenci_adres'], $ogrencicek['ogrenci_telefon'],);
    fputcsv($f, $lineData, $delimiter);
  }

  // Move back to beginning of file 
  fseek($f, 0);

  // Set headers to download file rather than displayed 
  // header('Content-Type: text/csv;charset=UTF-8'); 
  // header('Content-Disposition: attachment; filename="' . $filename . '";'); 
  header('Content-Encoding: UTF-8');
  header('Content-type: text/csv; charset=UTF-8');
  header('Content-Disposition: attachment; filename="' . $filename . '";');
  echo "\xEF\xBB\xBF"; // UTF-8 BOM
  //output all remaining data on a file pointer 
  fpassthru($f);
}
exit;
