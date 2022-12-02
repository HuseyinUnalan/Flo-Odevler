<?php

include 'header.php';


$duyurusor = $db->prepare("SELECT * FROM duyuru where duyuru_id=:duyuru_id");
$duyurusor->execute(array(
  'duyuru_id' => $_GET['duyuru_id']
));

$duyurucek = $duyurusor->fetch(PDO::FETCH_ASSOC);



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
            <a href="duyuru-duzenle?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Başarılı!</strong> Duyuru Kaydı Başarı İle Düzenlendi</span>
            </div>
          </div>
        </div>
      <?php } else if (@$_GET['durum'] == "no") { ?>
        <div class="col-12 col-lg-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <a href="duyuru-duzenle?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>"><button type="button" class="close">&times;</button></a>
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
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs"> <?php echo $duyurucek['duyuru_baslik'] ?> Bilgileri Düzenle</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" method="POST" data-parsley-validate enctype="multipart/form-data">






                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Duyuru Başlık *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="duyuru_baslik" value="<?php echo $duyurucek['duyuru_baslik'] ?>" type="text" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Duyuru İçerik *</label>
                    <div class="col-lg-9">
                      <textarea id="summernoteEditor" class="form-control" name="duyuru_icerik" type="text" required>
                      <?php echo $duyurucek['duyuru_icerik'] ?>
                      </textarea>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Duyuru Durum *</label>
                    <div class="col-lg-9">
                      <select name="duyuru_durum" class="form-control">
                        <option value="Aktif">Aktif</option>
                        <option value="Pasif">Pasif</option>
                      </select>
                    </div>
                  </div>






                  <input type="hidden" name="duyuru_id" value="<?php echo $duyurucek['duyuru_id']; ?>">
                  <button class="btn btn-success" name="duyuruduzenle" style="float: right;"><i aria-hidden="true" class="fa fa-edit"></i> Düzenle</button>

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