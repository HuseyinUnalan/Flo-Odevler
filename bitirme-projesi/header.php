<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {

  header("Location:erisim-yok");

}


require_once 'netting/baglan.php';
require_once 'fonksiyon.php';






$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']

));

$say = $kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say == 0) {


  header("Location:login.php?durum=izinsiz");
  exit;
}

$ogrencisor = $db->prepare("SELECT * FROM ogrenci");
$ogrencisor->execute();
$ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC);

$ogrencimesajsay = $db->prepare("SELECT count(mesaj_okuma) as say FROM mesaj where mesaj_okuma=:mesaj_okuma and kullanici_gel=:ogrenci_id");
$ogrencimesajsay->execute(array(
  'mesaj_okuma' => 0,
  'ogrenci_id' =>  $kullanicicek['ogrenci_id']
));
$ogrencisaycek = $ogrencimesajsay->fetch(PDO::FETCH_ASSOC);

$ogretmenmesajsay = $db->prepare("SELECT count(mesaj_okuma) as say FROM mesaj where mesaj_okuma=:mesaj_okuma and kullanici_gel=:ogretmen_id");
$ogretmenmesajsay->execute(array(
  'mesaj_okuma' => 0,
  'ogretmen_id' =>  $kullanicicek['ogretmen_id']
));
$ogretmensaycek = $ogretmenmesajsay->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="tr">


<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Flo Akademi </title>
  <!--favicon-->
  <link rel="icon" href="images\huseyin.png" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet" />
  <!-- Summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css" />

</head>

<style>
  /* Translate */

  #goog-gt-tt {
    display: none !important;
  }

  .goog-te-banner-frame {
    display: none !important;
  }

  .goog-te-menu-value:hover {
    text-decoration: none !important;
  }

  body {
    top: 0 !important;
  }

  #google_translate_element2 {
    display: none !important;
  }

  body.offcanvas-active {
    overflow: hidden;
  }

  .navbar {
    box-shadow: -1px 4px 15px #0000006e;
  }

  .offcanvas-header {
    display: none;
  }

  .screen-overlay {
    width: 0%;
    height: 100%;
    z-index: 30;
    position: fixed;
    top: 0;
    left: 0;
    opacity: 0;
    visibility: hidden;
    background-color: rgba(34, 34, 34, 0.6);
    transition: opacity 0.2s linear, visibility 0.1s, width 1s ease-in;
  }

  .screen-overlay.show {
    transition: opacity 0.5s ease, width 0s;
    opacity: 1;
    width: 100%;
    visibility: visible;
  }

  @media all and (max-width: 992px) {
    .offcanvas-header {
      display: block;
    }

    .mobile-offcanvas {
      visibility: hidden;
      transform: translateX(-100%);
      border-radius: 0;
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      z-index: 1200;
      width: 80%;
      overflow-y: scroll;
      overflow-x: hidden;
      transition: visibility 0.2s ease-in-out, transform 0.2s ease-in-out;
      background-color: #fff !important;
    }

    html:lang(ar) .mobile-offcanvas {
      transform: translateX(100%);
    }

    .mobile-offcanvas.show {
      visibility: visible;
      transform: translateX(0);
    }

    .nav-cont {
      display: block !important;
      padding-right: auto !important;
      padding-left: auto !important;
    }

    .navbar2 {
      box-shadow: 0px 3px 17px #00000047;
    }

    #navbar_main {
      box-shadow: 0px 3px 17px #00000047;
    }

    .dropdown-menu {
      border: none;
    }

    .nav-item {
      border-bottom: 1px solid #eaeaea;
    }
  }
</style>

<body>


  <!-- Start wrapper-->
  <div id="wrapper">

    <nav class="navbar navbar-dark bg-dark navbar-expand-sm">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-list-2">
        <ul class="navbar-nav">

          <?php

          if ($kullanicicek["kullanici_durum"] == 1) { ?>


            <li class="nav-item active">
              <a class="nav-link" href="home"><i aria-hidden="true" class="fa fa-home mr-1"></i>Anasayfa</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Öğrenci İşlemleri
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="ogrenci-ekle">Öğrenci Ekle</a>
                <a class="dropdown-item" href="ogrenci-listesi">Öğrenci Listesi</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Öğretmen İşlemleri
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="ogretmen-ekle">Öğretmen Ekle</a>
                <a class="dropdown-item" href="ogretmen-listesi">Öğretmen Listesi</a>
              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ders İşlemleri
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="ders-ekle">Ders Ekle</a>
                <a class="dropdown-item" href="ders-listesi">Ders Listesi</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Takvim İşlemleri
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="takvim">Takvim</a>
                <a class="dropdown-item" href="takvim-ekle">Takvim Ekle</a>
                <a class="dropdown-item" href="takvim-listesi">Takvim Listesi</a>
              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Duyuru İşlemleri
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="duyurular">Duyurular</a>
                <a class="dropdown-item" href="duyuru-ekle">Duyuru Ekle</a>
                <a class="dropdown-item" href="duyuru-listesi">Duyuru Listesi</a>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="logout">Çıkış Yap</a>
            </li>

          <?php } else if ($kullanicicek["kullanici_durum"] == 2) { ?>


            <li class="nav-item active">
              <a class="nav-link" href="home"><i aria-hidden="true" class="fa fa-home mr-1"></i>Anasayfa</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="ogrenci-listesi">Öğrenci Listesi</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="takvim">Takvim</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="duyurular">Duyurular</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="gelen-mesajlar">Gelen Mesajlar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="ogretmen-giden-mesajlar">Giden Mesajlar</a>
            </li>


          <?php } else if ($kullanicicek["kullanici_durum"] == 3) { ?>

            <li class="nav-item active">
              <a class="nav-link" href="home"><i aria-hidden="true" class="fa fa-home mr-1"></i>Anasayfa</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="ogrenci-<?= seo($kullanicicek['kullanici_adsoyad']) . "-" . $kullanicicek['ogrenci_id'] ?>">Not Listesi</a>
            </li>
            <!-- ogrenci-butun-notlar?ogrenci_id=<?php echo $kullanicicek['ogrenci_id']; ?> -->
            <li class="nav-item">
              <a class="nav-link" href="takvim">Takvim</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="duyurular">Duyurular</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="gelen-mesajlar">Gelen Mesajlar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="ogrenci-giden-mesajlar">Giden Mesajlar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="ogretmen-listesi">Öğretmen Listesi</a>
            </li>


          <?php } ?>

        </ul>


      </div>

      <?php if ($kullanicicek["kullanici_durum"] == 2) { ?>



        <ul class="navbar-nav align-items-center right-nav-link" style="float: right !important;">

     
          <li class="nav-item dropdown-lg">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" href="mesajlar">
              <i class="fa fa-envelope-open-o"></i><span class="badge badge-secondary badge-up"> <?php echo $ogretmensaycek['say'] ?> </span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="<?php echo $kullanicicek["kullanici_resimyol"] ?>" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="<?php echo $kullanicicek["kullanici_resimyol"] ?>" alt="user avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title"><?php echo $kullanicicek["kullanici_adsoyad"] ?> </h6>
                      <p>Branş : <?php echo $kullanicicek["kullanici_brans"] ?></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <a href="logout">
                <li class="dropdown-item"><i class="icon-power mr-2"></i> Çıkış Yap</li>
              </a>
            </ul>
          </li>
        </ul>
      <?php } else if ($kullanicicek["kullanici_durum"] == 3) { ?>





        <ul class="navbar-nav align-items-center right-nav-link" style="float: right !important;">
          <li class="nav-item dropdown-lg">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" href="mesajlar">
              <i class="fa fa-envelope-open-o"></i><span class="badge badge-secondary badge-up"> <?php echo $ogrencisaycek['say'] ?> </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="<?php echo $kullanicicek["kullanici_resimyol"] ?>" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="<?php echo $kullanicicek["kullanici_resimyol"] ?>" alt="user avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title"><?php echo $kullanicicek["kullanici_adsoyad"] ?> </h6>
                      <p>Okul Numarası : <?php echo $kullanicicek["ogrenci_id"] ?></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <a href="logout">
                <li class="dropdown-item"><i class="icon-power mr-2"></i> Çıkış Yap</li>
              </a>
            </ul>
          </li>
        </ul>
      <?php }  ?>
    </nav>


    <div class="clearfix"></div>