<?php require_once('baglan.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body style="text-align:center">

   <?php
   include_once("menu.php");
   ?>

   <table border='1' width='100%'>
      <tr>
         <td>S.No</td>
         <td>Adı Soyadı</td>
         <td>E-mail Adresi</td>
         <td>Telefon No</td>
      </tr>
      <?php
      $sorgu = $baglan->query("SELECT * FROM kayitlar", PDO::FETCH_NUM);
      $sorgu->execute();
      $kayitsayisi = $sorgu->rowCount();


      foreach ($sorgu as $veri) { ?>

         <tr>
            <td><?php echo $veri[0] ?> </td>
            <td><?php echo $veri[1] ?></td>
            <td><?php echo $veri[2] ?></td>
            <td><?php echo $veri[3] ?></td>
         </tr>
      <?php }  ?>
   </table>

</body>

</html>