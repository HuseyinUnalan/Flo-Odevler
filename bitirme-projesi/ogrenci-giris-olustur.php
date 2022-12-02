<?php

include 'header.php';


$ogrencisor = $db->prepare("SELECT * FROM ogrenci where ogrenci_id=:ogrenci_id");
$ogrencisor->execute(array(
  'ogrenci_id' => $_GET['ogrenci_id']
));

$ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC);



?>
<!--End topbar header-->
<?php if ($kullanicicek["kullanici_durum"] == 1) { ?>

<head>

  <!--material datepicker css-->
  <link rel="stylesheet" href="../assets/plugins/material-datepicker/css/bootstrap-material-datetimepicker.min.css">

  <!--Bootstrap Datepicker-->
  <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

</head>
<div class="clearfix"></div>

<div class="content-wrapper">
  <div class="container-fluid">


    <div class="row">

      <?php
      if (@$_GET['durum'] == "ok") { ?>

        <div class="col-12 col-lg-12">
          <div class="alert alert-success alert-dismissible" role="alert">
            <a href="ogrenci-duzenle?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Başarılı!</strong> İşlem Başarılı!</span>
            </div>
          </div>
        </div>
      <?php } else if (@$_GET['durum'] == "no") { ?>
        <div class="col-12 col-lg-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <a href="ogrenci-duzenle?ogrenci_id=<?php echo $ogrencicek['ogrenci_id']; ?>"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Başarısız!</strong> İşlem Başarısız!</span>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
              <li class="nav-item">
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs"> <?php echo $ogrencicek['ogrenci_adsoyad'] ?> Bilgileri Düzenle</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" method="POST" data-parsley-validate enctype="multipart/form-data">



                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Ad Soyad</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_adsoyad" value="<?php echo $ogrencicek['ogrenci_adsoyad'] ?>" type="text" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Kullanıcı Adı (T.C. Kimlik No)</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_mail" value="<?php echo $ogrencicek['ogrenci_tc'] ?>" type="text" required>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Şifre (Telefonun Son 4 Hanesi)</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_password" value="<?php echo substr($ogrencicek['ogrenci_telefon'], 6, 9) ?>" type="text" required>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Okul Numarası</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_okulnumara" value="<?php echo $ogrencicek['ogrenci_id'] ?>" type="text" required>
                    </div>
                  </div>



                  <input class="form-control" name="kullanici_resimyol" value="<?php echo $ogrencicek['ogrenci_resimyol'] ?>" type="hidden" required>


                  <input class="form-control" name="ogrenci_id" value="<?php echo $ogrencicek['ogrenci_id'] ?>" type="hidden" required>
                  <button class="btn btn-success" name="ogrencisifrekaydet" style="float: right;"><i aria-hidden="true" class="fa fa-edit"></i> Kaydet</button>

                </form>
                <!--/row-->
              </div>






            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End container-fluid-->
</div>
<!--End content-wrapper-->
<?php } else {
  header("Location:yetkisiz");
} ?>

<?php require_once 'footer.php'; ?>