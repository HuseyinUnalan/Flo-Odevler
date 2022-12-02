<?php

require_once 'header.php';

// $mesajsor = $db->prepare("SELECT * FROM mesaj ORDER BY mesaj_id DESC");
// $mesajsor->execute();


$mesajsor = $db->prepare("SELECT * FROM mesaj, kullanici where mesaj.kullanici_gon=kullanici.kullanici_mail ORDER BY mesaj_zaman DESC");
$mesajsor->execute();



?>

<div class="container mt-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Mesaj Tarihi</th>
        <th scope="col">Gönderen</th>
        <th scope="col">Durum</th>
        <th scope="col">Detay</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $say = 0;


      while ($mesajcek = $mesajsor->fetch(PDO::FETCH_ASSOC)) {

       

        $kullanici_gon = $mesajcek["kullanici_gon"];

        if ($mesajcek["kullanici_gel"] == $kullanicicek["ogretmen_id"] || $mesajcek["kullanici_gel"] == $kullanicicek["ogrenci_id"]) {
          $say++;


      ?>
          <tr>
            <th scope="row"><?php echo $say; ?></th>
            <td><?php echo $mesajcek["kullanici_adsoyad"] ?></td>
            <td><?php echo substr($mesajcek["mesaj_zaman"], 0, 10) ?></td>
            <td>
              <?php
              if ($mesajcek["mesaj_okuma"] == 0) { ?>
                Okunmadı
              <?php } else { ?>
                Okundu
              <?php } ?>
            </td>
            <td><a href="mesaj-detay?mesaj_id=<?php echo $mesajcek["mesaj_id"] ?>&$kullanici_gon=<?php echo $mesajcek["mesaj_id"] ?>" class="btn btn-success">Mesajı Oku</a></td>
          </tr>

        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once 'footer.php'; ?>