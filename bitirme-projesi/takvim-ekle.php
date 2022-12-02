<?php require_once 'header.php'; ?>
<!--End topbar header-->

<?php if ($kullanicicek["kullanici_durum"] == 1) { ?>
<div class="content-wrapper">
  <div class="container-fluid">


    <div class="row">
    <?php
      if (@$_GET['durum'] == "ok") { ?>

        <div class="col-12 col-lg-12">
          <div class="alert alert-success alert-dismissible" role="alert">
            <a href="sinif-ekle"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Başarılı!</strong> Takvim Başarılı Bir Şekilde Kayıt Edildi</span>
            </div>
          </div>
        </div>
      <?php } else if (@$_GET['durum'] == "no") { ?>
        <div class="col-12 col-lg-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <a href="sinif-listesi"><button type="button" class="close">&times;</button></a>
            <div class="alert-icon contrast-alert">
              <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
              <span><strong>Hata!</strong> Kayıt Eklenemedi</span>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
              <li class="nav-item">
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs"> Takvim Formu</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" enctype="multipart/form-data" method="POST">




                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">  Başlık *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="takvim_baslik" type="text" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Tarih *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="takvim_tarih" type="datetime-local" required>
                    </div>
                  </div>


                  <button class="btn btn-success" name="takvimkaydet" style="float: right;"><i class="fa fa-check-square-o"></i> Kaydet</button>

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
