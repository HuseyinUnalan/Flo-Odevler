<?php

require_once 'header.php';

$derssor = $db->prepare("SELECT * FROM ders");
$derssor->execute();
?>
<?php if ($kullanicicek["kullanici_durum"] == 1) { ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
      <div class="col-sm-9">
      </div>

      <?php if ($kullanicicek["kullanici_durum"] == 1) { ?>
        <div class="col-sm-12">
          <div class="btn-group float-sm-right">
            <a href="ders-ekle" class="btn btn-dark"> Yeni Ekle </a>
          </div>
        </div>
      <?php } ?>

    </div>
    <!-- End Breadcrumb-->
    <?php
    if (@$_GET['durum'] == "ok") { ?>

      <div class="col-12 col-lg-12">
        <div class="alert alert-success alert-dismissible" role="alert">
          <a href="ders-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Silindi</strong> Ders Kaydı Başarı İle Silidi</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "no") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <a href="ders-listesi"><button type="button" class="close">&times;</button></a>
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
            Ders Listesi
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Ders Adı</th>
                  <?php

                  if ($kullanicicek["kullanici_durum"] == 1) { ?>
                    <th>İşlemler</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>


                <?php

                $say = 0;

                while ($derscek = $derssor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>


                  <?php

                  if ($kullanicicek["kullanici_durum"] == 1) { ?>

                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $derscek["ders_ad"] ?></td>
                      <td>
                        <a href="netting/islem?ders_id=<?php echo $derscek['ders_id']; ?>&derssil=ok"> <button type="button" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash"></i></button> </a>
                      </td>
                    </tr>


                  <?php } else if ($kullanicicek["kullanici_durum"] == 2) { ?>
                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $derscek["ders_ad"] ?></td>

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

<?php } else {
  header("Location:yetkisiz");
} ?>


<?php require_once "footer.php"; ?>