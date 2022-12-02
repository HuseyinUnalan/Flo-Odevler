<?php

include 'header.php';


$ogretmensor = $db->prepare("SELECT * FROM ogretmen where ogretmen_id=:ogretmen_id");
$ogretmensor->execute(array(
  'ogretmen_id' => $_GET['ogretmen_id']
));

$ogretmencek = $ogretmensor->fetch(PDO::FETCH_ASSOC);



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
            <a href="ogretmen-duzenle?ogretmen_id=<?php echo $ogretmencek['ogretmen_id']; ?>"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Başarılı!</strong> Öğrenci Kaydı Başarı İle Düzenlendi</span>
            </div>
          </div>
        </div>
      <?php } else if (@$_GET['durum'] == "no") { ?>
        <div class="col-12 col-lg-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <a href="ogretmen-duzenle?ogretmen_id=<?php echo $ogretmencek['ogretmen_id']; ?>"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Hata!</strong> Kayıt Düzenlenemedi</span>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
              <li class="nav-item">
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs"> <?php echo $ogretmencek['ogretmen_adsoyad'] ?> Giriş Bilgisi Oluştur</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" method="POST" data-parsley-validate enctype="multipart/form-data">



                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Ad Soyad</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_adsoyad" value="<?php echo $ogretmencek['ogretmen_adsoyad'] ?>" type="text" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Kullanıcı Adı (T.C. Kimlik No)</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_mail" value="<?php echo $ogretmencek['ogretmen_tc'] ?>" type="text" required>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Şifre (Telefonun Son 4 Hanesi)</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_password" value="<?php echo substr($ogretmencek['ogretmen_tel'], 6, 9) ?>" type="phone" required>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Branş</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="kullanici_brans" value="<?php echo $ogretmencek['ogretmen_brans'] ?>" type="text" required>
                    </div>
                  </div>

                  <input class="form-control" name="kullanici_resimyol" value="<?php echo $ogretmencek['ogretmen_resimyol'] ?>" type="hidden" required>


                  <input type="hidden" name="ogretmen_id" value="<?php echo $ogretmencek['ogretmen_id']; ?>">


               
                    <button class="btn btn-success" name="ogretmensifrekaydet" style="float: right;"><i aria-hidden="true" class="fa fa-edit"></i> Kaydet</button>



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