<?php

include 'header.php';


$ogrencisor = $db->prepare("SELECT * FROM ogrenci where ogrenci_id=:ogrenci_id");
$ogrencisor->execute(array(
  'ogrenci_id' => @$_GET['ogrenci_id']
));

$ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC);


$notsor = $db->prepare("SELECT * FROM notlar where not_id=:not_id");
$notsor->execute(array(
  'not_id' => $_GET['not_id']
));

$notcek = $notsor->fetch(PDO::FETCH_ASSOC);



?>
<!--End topbar header-->


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


      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
              <li class="nav-item">
                <a href="javascript:void();" data-target="#tab1" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs"> Not Düzenleme Formu</span></a>
              </li>

            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active" id="tab1">

                <form action="netting/islem.php" method="POST" data-parsley-validate enctype="multipart/form-data">





                  <?php $ort = ($notcek["not_vize1"] * 30 / 100) + ($notcek["not_vize2"] * 30 / 100) + ($notcek["not_final"] * 40 / 100); ?>





                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Ortalama</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" value="<?php echo $ort ?>" disabled>
                    </div>
                  </div>

                  <input type="hidden" class="form-control" name="not_ort" value="<?php echo $ort ?>">



                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Ders </label>
                    <div class="col-lg-9">
                      <select name="not_ders" class="form-control">

                        <option value="<?php echo $notcek["not_ders"] ?>"><?php echo $notcek["not_ders"] ?></option>

                      </select>
                    </div>
                  </div>








                  <input type="hidden" name="ogrenci_id" value="<?php echo $ogrencicek['ogrenci_id']; ?>">
                  <input type="hidden" name="not_id" value="<?php echo $notcek['not_id']; ?>">



                  <button class="btn btn-success" name="notortalamakaydet" style="float: right;"><i aria-hidden="true" class="fa fa-edit"></i> Kaydet</button>

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

<?php require_once 'footer.php'; ?>