<?php

require_once 'header.php';



$mesajsor = $db->prepare("SELECT * FROM mesaj, kullanici where mesaj.kullanici_gon=kullanici.kullanici_mail and mesaj_id=:mesaj_id ");
$mesajsor->execute(array(
  'mesaj_id' => $_GET['mesaj_id']
  ));
$mesajcek = $mesajsor->fetch(PDO::FETCH_ASSOC);

if ($mesajcek["mesaj_okuma"] == 0) {

  $mesajguncelle = $db->prepare("UPDATE mesaj SET
  
  
  mesaj_okuma=:mesaj_okuma
  
  WHERE mesaj_id={$_GET["mesaj_id"]}");
  
  $update = $mesajguncelle->execute(array(
    'mesaj_okuma' => 1
  ));
  
  }
  

?>


<div class="container mt-5">
  <form action="netting/islem.php" data-parsley-validate method="POST">


    <div class="form-group">
      <label>Mesaj Gönderen Kişi Ad Soyad:</label>
      <input type="text" class="form-control" value="<?php echo $mesajcek["kullanici_adsoyad"] ?>" disabled>
    </div>


    <div class="form-group">
      <label>Mesaj Detayı</label>
      <textarea name="" class="form-control" cols="30" rows="4" disabled><?php echo $mesajcek["mesaj_detay"] ?></textarea>
    </div>

    <div class="form-group">
      <label>Mesaj Gönderilme Tarihi</label>
      <input type="text" class="form-control" value="<?php echo $mesajcek["mesaj_zaman"] ?>" disabled>
    </div>



   
  </form>
</div>


<?php require_once 'footer.php'; ?>