<?php

require_once 'header.php';
$notsor = $db->prepare("SELECT * FROM notlar where ogrenci_id=:ogrenci_id");
$notsor->execute(array(
  'ogrenci_id' => $_GET['ogrenci_id']
));

$ogrencisor = $db->prepare("SELECT * FROM ogrenci where ogrenci_id=:ogrenci_id");
$ogrencisor->execute(array(
  'ogrenci_id' => $_GET['ogrenci_id']
));

$ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC);


$ogretmensor = $db->prepare("SELECT * FROM ogretmen");
$ogretmensor->execute();
$ogretmencek = $ogretmensor->fetch(PDO::FETCH_ASSOC);
?>


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
      <div class="col-sm-9">
      </div>
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
            <span><strong>Silindi</strong> Öğrenci Kaydı Başarı İle Silidi</span>
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
            <span><strong>Hata!</strong> Kayıt Silinemedi</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "notno") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <a href="ogrenci-duzenle?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Hata!</strong> Not Girilmedi</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "notok") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-success alert-dismissible" role="alert">
          <a href="ogrenci-duzenle?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Başarılı </strong> Not Başarı İle Girildi</span>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <?php echo $ogrencicek["ogrenci_adsoyad"] ?> Ders Not Listesi
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Ad Soyad</th>
                  <th>Ders</th>
                  <th>Vize 1</th>
                  <th>Vize 2</th>
                  <th>Final</th>
                  <th>Ortalama</th>
                  <th>Harf Notu</th>
                  <th>Durum</th>

                  <th>Kayıt Tarih</th>
                  <?php if ($kullanicicek["kullanici_durum"] == 1 || $kullanicicek["kullanici_durum"] == 2) { ?>
                    <th>İşlemler</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>


                <?php

                $say = 0;

                while ($notcek = $notsor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>


                  <?php

                  if ($kullanicicek["kullanici_durum"] == 1) { ?>
                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $ogrencicek["ogrenci_adsoyad"] ?></td>
                      <td><?php echo $notcek["not_ders"] ?></td>
                      <?php if ($notcek["not_vize1"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_vize1"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_vize2"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_vize2"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_final"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_final"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_ort"] <= 0) { ?>
                        <td>Sonuclandırılmadı</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_ort"] ?></td>
                      <?php } ?>


                      <td>

                        <?php
                        if ($notcek["not_ort"] <= 49 && $notcek["not_ort"] > 0) {
                          echo "FF";
                        } else if ($notcek["not_ort"] > 49 && $notcek["not_ort"] <= 59) {
                          echo "DD";
                        } else if ($notcek["not_ort"] > 59 && $notcek["not_ort"] <= 69) {
                          echo "CC";
                        } else if ($notcek["not_ort"] > 69 && $notcek["not_ort"] <= 79) {
                          echo "BC";
                        } else if ($notcek["not_ort"] > 79 && $notcek["not_ort"] <= 89) {
                          echo "BB";
                        } else if ($notcek["not_ort"] > 89 && $notcek["not_ort"] <= 100) {
                          echo "AA";
                        } else if ($notcek["not_ort"] <= 0) {
                          echo "Sonuçlandırılmadı";
                        } else if ($notcek["not_ort"] <= 0 || $notcek["not_final"] <= 0 || $notcek["not_vize1"] <= 0 && $notcek["not_vize2"] <= 0) {
                          echo "Sonuçlandırılmadı";
                        }
                        ?>

                      </td>
                      <td>

                        <?php
                        if ($notcek["not_ort"] <= 49 && $notcek["not_ort"] > 0) {
                          echo "Kaldı";
                        } else if ($notcek["not_ort"] > 49) {
                          echo "Geçti";
                        } else if ($notcek["not_ort"] = 49) {
                          echo "Sonuçlandırılmadı";
                        } else if ($notcek["not_ort"] <= 0 || $notcek["not_final"] <= 0 || $notcek["not_vize1"] <= 0 && $notcek["not_vize2"] <= 0) {
                          echo "Sonuçlandırılmadı";
                        }
                        ?>

                      </td>
                      <td><?php echo substr($notcek["not_tarih"], 0, 10) ?></td>



                      <td>
                        <a href="notduzenle-<?= seo($notcek['ogrenci_id']) . "-" . $notcek['not_id'] ?>" class="btn btn-success">Not Düzenle <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="notsonuclandır-<?= seo($notcek['ogrenci_id']) . "-" . $notcek['not_id'] ?>" class="btn btn-success">Öğrenci Not Sonuçlandır <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="netting/islem?not_id=<?php echo $notcek['not_id']; ?>&notsil=ok"> <button type="button" class="btn btn-danger"> Sil</button> </a>

                        <!-- ogrenci-not-sonuclandır?not_id=<?php echo $notcek['not_id']; ?> -->
                        <!-- ogrenci-not?not_id=<?php echo $notcek['not_id']; ?> -->
                      </td>

                    </tr>

                  <?php } else if ($kullanicicek["kullanici_durum"] == 2 && $kullanicicek["kullanici_brans"] == $notcek["not_ders"]) {



                  ?>

                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $ogrencicek["ogrenci_adsoyad"] ?></td>
                      <td><?php echo $notcek["not_ders"] ?></td>
                      <?php if ($notcek["not_vize1"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_vize1"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_vize2"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_vize2"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_final"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_final"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_ort"] <= 0) { ?>
                        <td>Sonuclandırılmadı</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_ort"] ?></td>
                      <?php } ?>
                      <td>

                        <?php
                        if ($notcek["not_ort"] <= 49 && $notcek["not_ort"] > 0) {
                          echo "FF";
                        } else if ($notcek["not_ort"] > 49 && $notcek["not_ort"] <= 59) {
                          echo "DD";
                        } else if ($notcek["not_ort"] > 59 && $notcek["not_ort"] <= 69) {
                          echo "CC";
                        } else if ($notcek["not_ort"] > 69 && $notcek["not_ort"] <= 79) {
                          echo "BC";
                        } else if ($notcek["not_ort"] > 79 && $notcek["not_ort"] <= 89) {
                          echo "BB";
                        } else if ($notcek["not_ort"] > 89 && $notcek["not_ort"] <= 100) {
                          echo "AA";
                        } else if ($notcek["not_ort"] == 0) {
                          echo "Sonuçlandırılmadı";
                        }
                        ?>

                      </td>
                      <td>

                        <?php
                        if ($notcek["not_ort"] <= 49 && $notcek["not_ort"] > 0) {
                          echo "Kaldı";
                        } else if ($notcek["not_ort"] > 49) {
                          echo "Geçti";
                        } else if ($notcek["not_ort"] = 49) {
                          echo "Sonuçlandırılmadı";
                        }
                        ?>

                      </td>
                      <td><?php echo substr($notcek["not_tarih"], 0, 10) ?></td>

                      <td>
                        <a href="notduzenle-<?= seo($notcek['ogrenci_id']) . "-" . $notcek['not_id'] ?>" class="btn btn-success">Not Düzenle <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="notsonuclandır-<?= seo($notcek['ogrenci_id']) . "-" . $notcek['not_id'] ?>" class="btn btn-success">Öğrenci Not Sonuçlandır <span class="sr-only"></span><span class="text-muted"></span></a>
                      </td>

                    </tr>

                  <?php } else if ($kullanicicek["kullanici_durum"] == 3 && $kullanicicek["ogrenci_id"] == $ogrencicek["ogrenci_id"]) {

                  ?>

                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $ogrencicek["ogrenci_adsoyad"] ?></td>
                      <td><?php echo $notcek["not_ders"] ?></td>
                      <?php if ($notcek["not_vize1"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_vize1"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_vize2"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_vize2"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_final"] <= 0) { ?>
                        <td>Not Girilmedi</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_final"] ?></td>
                      <?php } ?>
                      <?php if ($notcek["not_ort"] <= 0) { ?>
                        <td>Sonuclandırılmadı</td>
                      <?php } else { ?>
                        <td><?php echo $notcek["not_ort"] ?></td>
                      <?php } ?>


                     
                        <td><?php echo $notcek["not_ort"] ?></td>
                        <td>

                          <?php
                          if ($notcek["not_ort"] <= 49 && $notcek["not_ort"] > 0) {
                            echo "FF";
                          } else if ($notcek["not_ort"] > 49 && $notcek["not_ort"] <= 59) {
                            echo "DD";
                          } else if ($notcek["not_ort"] > 59 && $notcek["not_ort"] <= 69) {
                            echo "CC";
                          } else if ($notcek["not_ort"] > 69 && $notcek["not_ort"] <= 79) {
                            echo "BC";
                          } else if ($notcek["not_ort"] > 79 && $notcek["not_ort"] <= 89) {
                            echo "BB";
                          } else if ($notcek["not_ort"] > 89 && $notcek["not_ort"] <= 100) {
                            echo "AA";
                          } else if ($notcek["not_ort"] == 0) {
                            echo "Sonuçlandırılmadı";
                          }
                          ?>

                        </td>

                        <td>

                          <?php
                          if ($notcek["not_ort"] <= 49 && $notcek["not_ort"] > 0) {
                            echo "Kaldı";
                          } else if ($notcek["not_ort"] > 49) {
                            echo "Geçti";
                          } else if ($notcek["not_ort"] = 49) {
                            echo "Sonuçlandırılmadı";
                          }
                          ?>

                        </td>
                        <td><?php echo substr($notcek["not_tarih"], 0, 10) ?></td>

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