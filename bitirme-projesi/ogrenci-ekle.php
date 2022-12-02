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
            <a href="ogrenci-ekle"><button type="button" class="close">&times;</button></a>
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
            <a href="ogrenci-listesi"><button type="button" class="close">&times;</button></a>
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
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs">Öğrenci Kayıt Formu</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" enctype="multipart/form-data" method="POST">


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label" for="first-name">Öğrenci Fotoğraf Seç
                    </label>
                    <div class="col-lg-9">
                      <input type="file" id="first-name" name="ogrenci_resimyol" class="form-control">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Ad Soyad *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogrenci_adsoyad" type="text" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> T.C. Kimlik No *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogrenci_tc" type="text" required>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Cinsiyet *</label>
                    <div class="col-lg-9">
                      <select name="ogrenci_cinsiyet" class="form-control">
                        <option value="Erkek">Erkek</option>
                        <option value="Kadın">Kadın</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Doğum Tarihi *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogrenci_dogum" type="date" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Adres *</label>
                    <div class="col-lg-9">
                      <textarea name="ogrenci_adres" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Telefon Numarası *</label>
                    <div class="col-lg-9">
                      <input class="form-control" name="ogrenci_telefon" type="phone" required>
                    </div>
                  </div>



                 


                  <button class="btn btn-success" name="ogrencikaydet" style="float: right;"><i class="fa fa-check-square-o"></i> Kaydet</button>

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