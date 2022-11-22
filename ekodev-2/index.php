<?php

$DMR = 1500;
$KRM = 5000;
$BKR = 3000;
$KMR = 500;

@$ad = $_POST["ad"];
@$soyad = $_POST["soyad"];
@$temizlikoranı = $_POST["temizlikoranı"];
@$tanebuyuklugu = $_POST["tanebuyuklugu"];
@$cevherkodu = $_POST["cevherkodu"];
@$miktar = $_POST["miktar"];



function cevherFiyat($cevherkodu)
{
  if ($cevherkodu == "DMR") {
    echo $DMR = 1500;
  } else if ($cevherkodu == "KRM") {
    echo $KRM = 5000;
  } else if ($cevherkodu == "BKR") {
    echo $BKR = 3000;
  } else if ($cevherkodu == "KMR") {
    echo $KMR = 500;
  }
}



function taneEtkisi($cevherkodu, $tanebuyuklugu)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo 1500 * 15 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo 5000 * 15 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo 3000 * 15 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo 500 * 15 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo 1500 * 10 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo 5000 * 10 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo 3000 * 10 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo 500 * 10 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo 0;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo 0;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo 0;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo 0;
  }
}



function taneSonrasıFiyat($cevherkodu, $tanebuyuklugu)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo 1500 - (1500 * 15 / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo 5000 - (5000 * 15 / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo 3000 - (3000 * 15 / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo 500 - (500 * 15 / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo 1500 - (1500 * 10 / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo 5000 - (5000 * 10 / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo 3000 - (3000 * 10 / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo 500 - (500 * 10 / 100);
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo 0;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo 0;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo 0;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo 0;
  }
}


function temizlikEtkisi($cevherkodu, $tanebuyuklugu, $temizlikoranı)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo ((500 - (500 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo ((500 - (500 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo 1500 * $temizlikoranı / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo 5000 * $temizlikoranı / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo 3000 * $temizlikoranı / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo 500 * $temizlikoranı / 100;
  }
}


function temizlikEtkisiSonrası($cevherkodu, $tanebuyuklugu, $temizlikoranı)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo (1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo (5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo (3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo (500 - (500 * 15 / 100)) - ((500 - (500 * 15 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo (1500 - (1500 * 10 / 100)) - ((1500 - (1500 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo (5000 - (5000 * 10 / 100)) - ((5000 - (5000 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo (3000 - (3000 * 10 / 100)) - ((3000 - (3000 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo (500 - (500 * 10 / 100)) - ((500 - (500 * 10 / 100)) * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo 1500 - (1500 * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo 5000 - (5000 * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo 3000 - (3000 * $temizlikoranı / 100);
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo 500 - (500 * $temizlikoranı / 100);
  }
}

function toplam($cevherkodu, $tanebuyuklugu, $temizlikoranı, $miktar)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo ((500 - (500 * 15 / 100)) - ((500 - (500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 10 / 100)) - ((1500 - (1500 * 10 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 10 / 100)) - ((5000 - (5000 * 10 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 10 / 100)) - ((3000 - (3000 * 10 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo ((500 - (500 * 10 / 100)) - ((500 - (500 * 10 / 100)) * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo (1500 - (1500 * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo (5000 - (5000 * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo (3000 - (3000 * $temizlikoranı / 100)) * $miktar;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo (500 - (500 * $temizlikoranı / 100)) * $miktar;
  }
}


function kdv($cevherkodu, $tanebuyuklugu, $temizlikoranı, $miktar)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo (((1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo (((5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo (((3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo (((500 - (500 * 15 / 100)) - ((500 - (500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo (((1500 - (1500 * 10 / 100)) - ((1500 - (1500 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo (((5000 - (5000 * 10 / 100)) - ((5000 - (5000 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo (((3000 - (3000 * 10 / 100)) - ((3000 - (3000 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo (((500 - (500 * 10 / 100)) - ((500 - (500 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo ((500 - (500 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  }
}



function genelToplam($cevherkodu, $tanebuyuklugu, $temizlikoranı, $miktar)
{
  if ($tanebuyuklugu == 1 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + (((1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + (((5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + (((3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 1 && $cevherkodu == "KMR") {
    echo (500 - (500 * $temizlikoranı / 100)) * $miktar + (((500 - (500 * 15 / 100)) - ((500 - (500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + (((1500 - (1500 * 10 / 100)) - ((1500 - (1500 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + (((5000 - (5000 * 10 / 100)) - ((5000 - (5000 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + (((3000 - (3000 * 10 / 100)) - ((3000 - (3000 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 2 && $cevherkodu == "KMR") {
    echo (500 - (500 * $temizlikoranı / 100)) * $miktar + (((500 - (500 * 10 / 100)) - ((500 - (500 * 10 / 100)) * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "DMR") {
    echo ((1500 - (1500 * 15 / 100)) - ((1500 - (1500 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + ((1500 - (1500 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KRM") {
    echo ((5000 - (5000 * 15 / 100)) - ((5000 - (5000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + ((5000 - (5000 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "BKR") {
    echo ((3000 - (3000 * 15 / 100)) - ((3000 - (3000 * 15 / 100)) * $temizlikoranı / 100)) * $miktar + ((3000 - (3000 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  } else if ($tanebuyuklugu == 3 && $cevherkodu == "KMR") {
    echo (500 - (500 * $temizlikoranı / 100)) * $miktar + ((500 - (500 * $temizlikoranı / 100)) * $miktar) * 8 / 100;
  }
}






?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Maden</title>
  <meta charset="utf-8">
  <link rel="icon" href="huseyin.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-5 mb-5">
    <form action="index.php" method="POST">


      <label>* Müşterinin</label>
      <hr>
      <div class="form-group">
        <label>Müşterinin Adı</label>
        <input type="text" class="form-control" name="ad" required="">
      </div>

      <div class="form-group">
        <label>Müşterinin Soyadı</label>
        <input type="text" class="form-control" name="soyad" required="">
      </div>

      <br>

      <label>* Cevherin</label>
      <hr>
      <div class="form-group">
        <label>Cevher Kodu</label>
        <select class="form-control" name="cevherkodu" required="">
          <option value="DMR">Demir</option>
          <option value="KRM">Krom</option>
          <option value="BKR">Bakır</option>
          <option value="KMR">Kömür</option>
        </select>
      </div>

      <div class="form-group">
        <label>Tane Büyüklüğü</label>
        <select class="form-control" name="tanebuyuklugu" required="">
          <option value="1">Erik</option>
          <option value="2">Portakal</option>
          <option value="3">Karpuz</option>
        </select>
      </div>

      <div class="form-group">
        <label>Temizlik Oranı</label>
        <input type="text" class="form-control" name="temizlikoranı" required="">
      </div>

      <div class="form-group">
        <label>Miktar (Ton)</label>
        <input type="text" class="form-control" name="miktar" required="">
      </div>








      <button type="submit" class="btn btn-primary">Hesapla</button>
    </form>
  </div>

  <?php

  if (@$ad != "") { ?>

  <?php


  ?>

  <div class="container mt-5 mb-5">
    <ul class="list-group">

      <li class="list-group-item">Alıcı : <?php echo $ad; ?> <?php echo $soyad; ?></li>
      <br><br>
      <li class="list-group-item">Cevher Türü :

        <?php

        if ($cevherkodu == "DMR") {
          echo "Demir";
        } else if ($cevherkodu == "KRM") {
          echo "Krom";
        } else if ($cevherkodu == "BKR") {
          echo "Bakır";
        } else if ($cevherkodu == "KMR") {
          echo "Kömür";
        }


        ?>


      </li>

      <li class="list-group-item">Normal Birim Fiyat : <?php echo cevherFiyat($cevherkodu); ?> TON/TL</li>

      <li class="list-group-item">Tane :

        <?php

        if ($tanebuyuklugu == 1) {
          echo "Erik (-%15)";
        } else if ($tanebuyuklugu == 2) {
          echo "Portakal (-%10)";
        } else if ($tanebuyuklugu == 3) {
          echo "Karpuz (-%0)";
        }


        ?>

      </li>

      <li class="list-group-item">

        <?php
        if ($tanebuyuklugu == 1) {
          echo "Erik";
        } else if ($tanebuyuklugu == 2) {
          echo "Portakal";
        } else if ($tanebuyuklugu == 3) {
          echo "Karpuz";
        }
        ?> Fiyat :
        <?php
        taneSonrasıFiyat($cevherkodu, $tanebuyuklugu);
        ?>
        TON/TL

      </li>

      <li class="list-group-item">Temizlik : <?php echo $temizlikoranı ?> , Etkisi : - <?php temizlikEtkisi($cevherkodu, $tanebuyuklugu, $temizlikoranı) ?> TON/TL</li>

      <br><br>
      <label for="">Temizlik Etkisi Sonrası</label>
      <br>
      <li class="list-group-item">Birim Fiyat : <?php temizlikEtkisiSonrası($cevherkodu, $tanebuyuklugu, $temizlikoranı) ?> TON/TL </li>
      <li class="list-group-item">Toplam : <?php toplam($cevherkodu, $tanebuyuklugu, $temizlikoranı, $miktar) ?> TL </li>
      <li class="list-group-item">KDV(%8) : <?php kdv($cevherkodu, $tanebuyuklugu, $temizlikoranı, $miktar) ?> TL </li>
      <li class="list-group-item">Genel Toplam : <?php genelToplam($cevherkodu, $tanebuyuklugu, $temizlikoranı, $miktar) ?> TL</li>






    </ul>


  </div>

  <?php } ?>
  <div class="container mt-5 mb-5">
    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" style="float: right;" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
  </div>
</body>

</html>