<?php

require_once 'header.php';

// $mesajsor = $db->prepare("SELECT * FROM mesaj ORDER BY mesaj_id DESC");
// $mesajsor->execute();


$mesajsor = $db->prepare("SELECT * FROM mesaj, kullanici, ogrenci where mesaj.kullanici_gon=kullanici.kullanici_mail and mesaj.kullanici_gel=ogrenci.ogrenci_id ORDER BY mesaj_zaman DESC");
$mesajsor->execute();




?>

<div class="container mt-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Mesaj Gönderilen Kişi </th>
        <th scope="col">Mesaj Tarih</th>
        <th scope="col">Detay</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $say = 0;

      while ($mesajcek = $mesajsor->fetch(PDO::FETCH_ASSOC)) {
        $say++;


        $kullanici_gon = $mesajcek["kullanici_gon"];

        if ($mesajcek["kullanici_gon"] == $kullanicicek["kullanici_mail"] || $mesajcek["kullanici_gon"] == $kullanicicek["kullanici_mail"]) {


      ?>
          <tr>
            <th scope="row"><?php echo $say ?></th>
            <td><?php echo $mesajcek["ogrenci_adsoyad"] ?></td>
            <td><?php echo substr($mesajcek["mesaj_zaman"], 0, 10) ?></td>
            <td><a href="mesaj-detay?mesaj_id=<?php echo $mesajcek["mesaj_id"] ?>&$kullanici_gon=<?php echo $mesajcek["mesaj_id"] ?>" class="btn btn-success">Mesajı Oku</a></td>
          </tr>

        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once 'footer.php'; ?>