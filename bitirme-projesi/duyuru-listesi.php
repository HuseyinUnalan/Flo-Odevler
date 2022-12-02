<?php

require_once 'header.php';

$duyurusor = $db->prepare("SELECT * FROM duyuru");
$duyurusor->execute();
?>
<?php if ($kullanicicek["kullanici_durum"] == 1) { ?>


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
          <a href="duyuru-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Silindi</strong> Duyuru Kaydı Başarı İle Silidi</span>
          </div>
        </div>
      </div>
    <?php } else if (@$_GET['durum'] == "no") { ?>
      <div class="col-12 col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <a href="duyuru-listesi"><button type="button" class="close">&times;</button></a>
          <div class="alert-icon contrast-alert">
            <i class="fa fa-check"></i>
          </div>
          <div class="alert-message">
            <span><strong>Hata!</strong> Kayıt Silinemedi</span>
          </div>
        </div>
      </div>
    <?php }  ?>
    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            Duyuru Listesi
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

                while ($duyurucek = $duyurusor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>




                    <tr>
                      <th scope="row"><?php echo $say ?></th>
                      <td><?php echo $duyurucek["duyuru_baslik"] ?></td>
                      <td><?php echo $duyurucek["duyuru_tarih"] ?></td>
                      <td>
                        <a href="duyuru-duzenle?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>" class="btn btn-success"><i aria-hidden="true" class="fa fa-edit"></i> <span class="sr-only"></span><span class="text-muted"></span></a>
                        <a href="netting/islem?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>&duyurusil=ok"> <button type="button" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash"></i></button> </a>
                      
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