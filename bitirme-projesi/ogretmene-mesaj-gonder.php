<?php 

require_once 'header.php';

$kullanicisor = $db->prepare("SELECT * FROM kullanici where ogretmen_id=:ogretmen_id");
$kullanicisor->execute(array(
  'ogretmen_id' => $_GET['kullanici_gel']

));

$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);


?>


<div class="container mt-5">
  <form action="netting/islem.php" data-parsley-validate method="POST">

      <input type="hidden" class="form-control"  value="<?php echo $_GET['kullanici_gel'] ?>" disabled>

    <div class="form-group">
      <label>Gönderilen Kişi Ad Soyad:</label>
      <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" disabled>
    </div>

    
    <div class="form-group">
      <label>Mesaj:</label>
      <textarea class="form-control" name="mesaj_detay" cols="30" rows="5"></textarea>
    </div>
    
    <input type="hidden" name="kullanici_gel" value="<?php echo $_GET["kullanici_gel"] ?>">
    <button type="submit" name="mesajgonder" class="btn btn-primary">Gönder</button>
  </form>
</div>


<?php require_once 'footer.php'; ?>