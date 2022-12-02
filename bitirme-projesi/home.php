<?php


require_once "header.php";

$ogrencisor = $db->prepare("SELECT count(*) as totalogrenci FROM ogrenci");
$ogrencisor->execute();
$ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC);


$ogretmensor = $db->prepare("SELECT count(*) as totalogretmen FROM ogretmen");
$ogretmensor->execute();
$ogretmencek = $ogretmensor->fetch(PDO::FETCH_ASSOC);

$derssor = $db->prepare("SELECT count(*) as totalders FROM ders");
$derssor->execute();
$derscek = $derssor->fetch(PDO::FETCH_ASSOC);
?>


<div class="content-wrapper">
  <div class="container-fluid">

    <!--Start Dashboard Content-->

    <?php if ($kullanicicek["kullanici_durum"] == 1) { ?>

      <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-4">
          <div class="card gradient-bloody">
            <div class="card-body">
              <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-white">Öğrenci Sayısı</p>
                  <h4 class="text-white line-height-5"><?php echo $ogrencicek['totalogrenci'] ?></h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                  <i class="fa fa-users text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4">
          <div class="card gradient-scooter">
            <div class="card-body">
              <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-white">Öğretmen Sayısı</p>
                  <h4 class="text-white line-height-5"><?php echo $ogretmencek['totalogretmen'] ?></h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                  <i class="fa fa-users text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
          <div class="card gradient-ohhappiness">
            <div class="card-body">
              <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-white">Ders Sayısı</p>
                  <h4 class="text-white line-height-5"><?php echo $derscek["totalders"] ?></h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                  <i class="fa fa-pie-chart text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Row-->

      <div class="row">

        <div class="col-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              Öğrenci Cinsiyet Dağılımı
            </div>
            <div class="card-body">
              <canvas id="dashboard-chart-2"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!--End Row-->

    <?php } ?>


    <?php if ($kullanicicek["kullanici_durum"] == 2 || $kullanicicek["kullanici_durum"] == 3) {

      $mesajsor = $db->prepare("SELECT * FROM mesaj, kullanici where mesaj.kullanici_gon=kullanici.kullanici_mail ORDER BY mesaj_zaman DESC");
      $mesajsor->execute();
    ?>

      <div class="container mt-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mesaj Tarihi</th>
              <th scope="col">Gönderen</th>
              <th scope="col">Durum</th>
              <th scope="col">Detay</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $say = 0;


            while ($mesajcek = $mesajsor->fetch(PDO::FETCH_ASSOC)) {



              $kullanici_gon = $mesajcek["kullanici_gon"];

              if ($mesajcek["kullanici_gel"] == $kullanicicek["ogretmen_id"] || $mesajcek["kullanici_gel"] == $kullanicicek["ogrenci_id"]) {
                $say++;


            ?>
                <tr>
                  <th scope="row"><?php echo $say; ?></th>
                  <td><?php echo $mesajcek["kullanici_adsoyad"] ?></td>
                  <td><?php echo substr($mesajcek["mesaj_zaman"], 0, 10) ?></td>
                  <td>
                    <?php
                    if ($mesajcek["mesaj_okuma"] == 0) { ?>
                      Okunmadı
                    <?php } else { ?>
                      Okundu
                    <?php } ?>
                  </td>
                  <td><a href="mesaj-detay?mesaj_id=<?php echo $mesajcek["mesaj_id"] ?>&$kullanici_gon=<?php echo $mesajcek["mesaj_id"] ?>" class="btn btn-success">Mesajı Oku</a></td>
                </tr>

              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>



    <?php } ?>

    <!--End Dashboard Content-->

  </div>
  <!-- End container-fluid-->

</div>
<!--End content-wrapper-->

<?php

require_once "footer.php";

$kadinogrencisor = $db->prepare("SELECT count(*) as totalkadinogrenci FROM ogrenci WHERE ogrenci_cinsiyet=:ogrenci_cinsiyet");
$kadinogrencisor->execute(array(
  'ogrenci_cinsiyet' => "Kadın"
));
$kadinogrencicek = $kadinogrencisor->fetch(PDO::FETCH_ASSOC);

$erkekogrencisor = $db->prepare("SELECT count(*) as totalerkekogrenci FROM ogrenci WHERE ogrenci_cinsiyet=:ogrenci_cinsiyet");
$erkekogrencisor->execute(array(
  'ogrenci_cinsiyet' => "Erkek"
));
$erkekogrencicek = $erkekogrencisor->fetch(PDO::FETCH_ASSOC);

?>

<script type="text/javascript">
  var ctx = document.getElementById("dashboard-chart-2").getContext('2d');

  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Erkek", "Kız"],
      datasets: [{
        backgroundColor: [
          '#5e72e4',
          '#ff2fa0'
        ],
        hoverBackgroundColor: [
          '#5e72e4',
          '#ff2fa0'
        ],
        data: [<?php echo $erkekogrencicek['totalerkekogrenci'] ?>, <?php echo $kadinogrencicek['totalkadinogrenci'] ?>],
        borderWidth: [1, 1]
      }]
    },
    options: {
      cutoutPercentage: 25,
      legend: {
        position: 'right',
        display: true,
        labels: {
          boxWidth: 12
        }
      },
      tooltips: {
        displayColors: false,
      }
    }
  });
</script>