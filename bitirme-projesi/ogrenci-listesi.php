<?php

require_once 'header.php';

$ogrencisor = $db->prepare("SELECT * FROM ogrenci");
$ogrencisor->execute();


$notsor = $db->prepare("SELECT * FROM notlar");
$notsor->execute();

$notcek = $notsor->fetch(PDO::FETCH_ASSOC);
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
            <a href="ogrenci-ekle" class="btn btn-dark"> Yeni Ekle </a>
          </div>

          <div class="btn-group" style="float: left;">
            <a href="ogrenci-indir.php" class="btn btn-primary"><i class="dwn"></i> Dışa Aktar</a>
          </div>
        </div>

      <?php } ?>

    </div>
    <!-- End Breadcrumb-->
    <?php
    if (@$_GET['durum'] == "ok") { ?>

      <div class="col-12 col-lg-12">
        <div class="alert alert-success alert-dismissible" role="alert">
          <a href="ogrenci-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Başarılı</strong> İşlem Başarılı!</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "no") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <a href="ogrenci-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Başarısız!</strong> İşlem Başarısız!</span>
          </div>
        </div>
      </div>
    <?php }  ?>
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
                  <th>Okul Numarası</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>


                <?php

                $say = 0;

                while ($ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>


                  <?php

                  if ($kullanicicek["kullanici_durum"] == 1) { ?>

                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><img src="<?php echo $ogrencicek["ogrenci_resimyol"] ?>" class="rounded-circle customer-img" alt="user avatar"></td>
                      <td><?php echo $ogrencicek["ogrenci_adsoyad"] ?></td>
                      <td><?php echo $ogrencicek["ogrenci_id"] ?></td>

                      <td>


                        <a href="ogrenciduzenle-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>"> <button class="btn btn-success">Düzenle</button> </a>

                        <div class="btn-group m-1" role="group">
                          <button type="button" class="btn btn-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Not İşlemleri
                          </button>
                          <div class="dropdown-menu">
                            <a href="ogrencinot-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>" class="dropdown-item">Not Kaydet</a>
                            <a href="ogrenci-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>" class="dropdown-item">Öğrenci Not Listesi </a>

                          </div>
                        </div>

                        <!-- <a href="ogrenci-duzenle?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>" class="btn btn-success"><i aria-hidden="true" class="fa fa-edit"></i> <span class="sr-only"></span><span class="text-muted"></span></a> -->
                        <!-- <a href="ogrenci-not-kaydet?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>" class="btn btn-success">Not Giriş <span class="sr-only"></span><span class="text-muted"></span></a> -->
                        <!-- <a href="ogrenci-butun-notlar?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>" class="btn btn-success">Öğrenci Not Listesi <span class="sr-only"></span><span class="text-muted"></span></a> -->


                        <a href="ogrencigiris-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>" class="btn btn-warning">Öğrenci Giriş Oluştur <span class="sr-only"></span><span class="text-muted"></span></a>

                        <div class="btn-group m-1" role="group">
                          <button type="button" class="btn btn-danger waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Silme İşlemleri
                          </button>
                          <div class="dropdown-menu">
                            <a href="netting/islem?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>&ogrencikullanicisil=ok" class="dropdown-item">Öğrenci Kullanıcı Sil</a>
                            <a href="netting/islem?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>&ogrencisil=ok" class="dropdown-item">Öğrenci Bilgilerini Sil</a>

                          </div>
                        </div>


                      </td>
                    </tr>

                  <?php } else if ($kullanicicek["kullanici_durum"] == 2) {



                  ?>
                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><img src="<?php echo $ogrencicek["ogrenci_resimyol"] ?>" class="rounded-circle customer-img" alt="user avatar"></td>
                      <td><?php echo $ogrencicek["ogrenci_adsoyad"] ?></td>
                      <td><?php echo $ogrencicek["ogrenci_id"] ?></td>
                      <td>
                        <a href="ogrencinot-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>" class="btn btn-success">Not Kaydet <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="ogrenci-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>" class="btn btn-success">Öğrenci Not Listesi <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="ogrenciye-mesaj-gonder?kullanici_gel=<?php echo $ogrencicek['ogrenci_id'] ?>" class="btn btn-dark">Mesaj Gönder</a>
                      </td>


                    </tr>
                  <?php } else if ($kullanicicek["kullanici_durum"] == 3 && $kullanicicek["ogrenci_id"] == $ogrencicek["ogrenci_id"]) {



                  ?>
                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><img src="<?php echo $ogrencicek["ogrenci_resimyol"] ?>" class="rounded-circle customer-img" alt="user avatar"></td>
                      <td><?php echo $ogrencicek["ogrenci_adsoyad"] ?></td>
                      <td><?php echo $ogrencicek["ogrenci_id"] ?></td>
                      <td>
                        <a href="ogrenci-<?= seo($ogrencicek['ogrenci_adsoyad']) . "-" . $ogrencicek['ogrenci_id'] ?>" class="btn btn-success">Notlarım <span class="sr-only"></span><span class="text-muted"></span></a>

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