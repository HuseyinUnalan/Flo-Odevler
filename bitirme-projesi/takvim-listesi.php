<?php

require_once 'header.php';

$takvimsor = $db->prepare("SELECT * FROM takvim");
$takvimsor->execute();
?>

<?php if ($kullanicicek["kullanici_durum"] == 1) { ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
      <div class="col-sm-9">
      </div>
      <div class="col-sm-12">
        <div class="btn-group float-sm-right">
          <a href="takvim-ekle" class="btn btn-dark"> Yeni Ekle </a>
        </div>

      </div>
    </div>
    <!-- End Breadcrumb-->
    <?php
    if (@$_GET['durum'] == "ok") { ?>

      <div class="col-12 col-lg-12">
        <div class="alert alert-success alert-dismissible" role="alert">
          <a href="takvim-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Silindi</strong> Takvim Kaydı Başarı İle Silidi</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "no") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <a href="takvim-listesi"><button type="button" class="close">&times;</button></a>
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
            Takvim Listesi
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Başlık</th>
                  <th>Tarih</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>


                <?php

                $say = 0;

                while ($takvimcek = $takvimsor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>


                  <tr>
                    <th scope="row"><?php echo $say ?></th>
                    <td><?php echo $takvimcek["takvim_baslik"] ?></td>
                    <td><?php echo $takvimcek["takvim_tarih"] ?></td>

                    <td>
                      <a href="netting/islem?takvim_id=<?php echo $takvimcek['takvim_id']; ?>&takvimsil=ok"> <button type="button" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash"></i></button> </a>
                    </td>
                  </tr>


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