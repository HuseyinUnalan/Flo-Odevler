<?php

require_once 'header.php';
$notsor = $db->prepare("SELECT * FROM notlar, ogrenci, kullanici where ogrenci.ogrenci_id = notlar.ogrenci_id and kullanici.ogrenci_id = ogrenci.ogrenci_id");
$notsor->execute();

// $ogrencisor = $db->prepare("SELECT * FROM ogrenci, kullanici where ogrenci.ogrenci_id = kullanici.ogrenci_id");
// $ogrencisor->execute();

// $ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC);
?>


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
      <div class="col-sm-9">
      </div>
    </div>
    <!-- End Breadcrumb-->
  
    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            Ders Not Listesi
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Ders</th>
                  <th>Vize 1</th>
                  <th>Vize 2</th>
                  <th>Final</th>
                  <th>Ortalama</th>
                </tr>
              </thead>
              <tbody>


                <?php

                $say = 0;

                while ($notcek = $notsor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>




                  <tr>
                    <th scope="row"><?php echo $say ?></th>
                    <td><?php echo $notcek["not_ders"] ?></td>
                    <td><?php echo $notcek["not_vize1"] ?></td>
                    <td><?php echo $notcek["not_vize2"] ?></td>
                    <td><?php echo $notcek["not_final"] ?></td>
                    <td><?php echo $notcek["not_ort"] ?></td>
                   

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



<?php require_once "footer.php"; ?>