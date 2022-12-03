<?php

require_once 'header.php';

$ogretmensor = $db->prepare("SELECT * FROM ogretmen");
$ogretmensor->execute();
?>


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
      <div class="col-sm-9">
      </div>
      <?php if ($kullanicicek["kullanici_durum"] == 1) { ?>

      <div class="col-sm-12">
        <div class="btn-group float-sm-right">
          <a href="ogretmen-ekle" class="btn btn-dark"> Yeni Ekle </a>
        </div>

        <div class="btn-group" style="float: left;">
          <a href="ogretmen-indir.php" class="btn btn-primary"><i class="dwn"></i> Dışa Aktar</a>
        </div>
      </div>
      <?php } ?>
    </div>
    <!-- End Breadcrumb-->
    <?php
    if (@$_GET['durum'] == "ok") { ?>

      <div class="col-12 col-lg-12">
        <div class="alert alert-success alert-dismissible" role="alert">
          <a href="ogretmen-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Silindi</strong> Öğretmen Kaydı Başarı İle Silidi</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "no") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <a href="ogretmen-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Hata!</strong> Kayıt Silinemedi</span>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            Öğrenci Listesi
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fotoğraf</th>
                  <th>Ad Soyad</th>
                  <th>Branş</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>


                <?php

                if ($kullanicicek["kullanici_durum"] == 1) {
                  $say = 0;

                  while ($ogretmencek = $ogretmensor->fetch(PDO::FETCH_ASSOC)) {
                    $say++ ?>




                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><img src="<?php echo $ogretmencek["ogretmen_resimyol"] ?>" class="rounded-circle customer-img" alt="user avatar"></td>
                      <td><?php echo $ogretmencek["ogretmen_adsoyad"] ?></td>
                      <td><?php echo $ogretmencek["ogretmen_brans"] ?></td>
                      <td>
                        <a href="ogretmenduzenle-<?= seo($ogretmencek['ogretmen_adsoyad']) . "-" . $ogretmencek['ogretmen_id'] ?>" class="btn btn-success"><i aria-hidden="true" class="fa fa-edit"></i> <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="ogretmengiris-<?= seo($ogretmencek['ogretmen_adsoyad']) . "-" . $ogretmencek['ogretmen_id'] ?>" class="btn btn-success">Öğretmen Giriş Oluştur <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="netting/islem?ogretmen_id=<?php echo $ogretmencek['ogretmen_id']; ?>&ogretmenkullanicisil=ok"> <button type="button" class="btn btn-danger">Öğretmen Kullanıcı Sil</button></a>
                        <a href="netting/islem?ogretmen_id=<?php echo $ogretmencek['ogretmen_id']; ?>&ogretmensil=ok"> <button type="button" class="btn btn-danger">Öğretmen Bilgileri Sil</button> </a>

                      </td>
                    </tr>


                  <?php } ?>

                  <?php }
                if ($kullanicicek["kullanici_durum"] == 3) {
                  $say = 0;

                  while ($ogretmencek = $ogretmensor->fetch(PDO::FETCH_ASSOC)) {
                    $say++ ?>




                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><img src="<?php echo $ogretmencek["ogretmen_resimyol"] ?>" class="rounded-circle customer-img" alt="user avatar"></td>
                      <td><?php echo $ogretmencek["ogretmen_adsoyad"] ?></td>
                      <td><?php echo $ogretmencek["ogretmen_brans"] ?></td>
                      <td>
                        <a href="ogretmene-mesaj-gonder?kullanici_gel=<?php echo $ogretmencek['ogretmen_id'] ?>" class="btn btn-dark">Mesaj Gönder</a>
                      </td>
                    </tr>

                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php require_once "footer.php"; ?>
