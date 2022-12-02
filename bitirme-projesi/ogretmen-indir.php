<?php

require_once 'netting/baglan.php';

// Fetch records from database 
$ogretmensor = $db->prepare("SELECT * FROM ogretmen ORDER BY ogretmen_id ASC");
$ogretmensor->execute();
if ($ogretmensor->fetchColumn() > 0) {
  $delimiter = ",";
  $filename = "ogretmen-listesi_" . date('Y-m-d') . ".csv";

  // Create a file pointer 
  $f = fopen('php://memory', 'w');

  // Set column headers 
  $fields = array(' ID | Ad Soyad | Branş  ');
  fputcsv($f, $fields, $delimiter,);

  // Output each row of the data, format line as csv and write to file pointer 
  while ($ogretmencek = $ogretmensor->fetch(PDO::FETCH_ASSOC)) {
    $lineData = array($ogretmencek['ogretmen_id'], $ogretmencek['ogretmen_adsoyad'], $ogretmencek['ogretmen_brans']);
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
