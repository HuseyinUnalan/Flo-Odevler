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
              <span><strong>Başarılı!</strong> Öğretmen Kaydı Başarı İle Düzenlendi</span>
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
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs"> <?php echo $ogretmencek['ogretmen_adsoyad'] ?> Bilgileri Düzenle</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" method="POST" data-parsley-validate enctype="multipart/form-data">


                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Fotoğraf
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="300" src="<?php echo $ogretmencek['ogretmen_resimyol']; ?>">
                    </div>
                  </div>

                  <input class="form-control" name="eski_yol" value="<?php echo $ogretmencek['ogretmen_resimyol'] ?>" type="hidden">

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yeni Fotoğraf Seç
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="first-name" name="ogretmen_resimyol" class="form-control">
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Ad Soyad *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogretmen_adsoyad" value="<?php echo $ogretmencek['ogretmen_adsoyad'] ?>" type="text" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> T.C. Kimlik Numarası*</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogretmen_tc" value="<?php echo $ogretmencek['ogretmen_tc'] ?>" type="text" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Telefon Numarası *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogretmen_tel" value="<?php echo $ogretmencek['ogretmen_tel'] ?>" type="text" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Branş *</label>
                    <div class="col-lg-9">
                      <select name="ogretmen_brans" class="form-control">

                        <option value="<?php echo $ogretmencek["ogretmen_brans"] ?>"><?php echo $ogretmencek["ogretmen_brans"] ?></option>

                        <?php
                        $derssor = $db->prepare("SELECT * FROM ders");
                        $derssor->execute();
                        while ($derscek = $derssor->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                          <option value="<?php echo $derscek["ders_ad"] ?>"><?php echo $derscek["ders_ad"] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>




                  <input type="hidden" name="ogretmen_id" value="<?php echo $ogretmencek['ogretmen_id']; ?>">
                  <button class="btn btn-success" name="ogretmenduzenle" style="float: right;"><i aria-hidden="true" class="fa fa-edit"></i> Düzenle</button>

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