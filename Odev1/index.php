<?php

require_once 'header.php';

$agil = 12;
$kapasite = 40;
$koyun = 580;

$toplamkapasite = $agil * $kapasite;


echo   "<b>Toplam Ağıl : </b> " . $agil . "<br>";
echo "<b>Toplam Kapasite : </b> " . $toplamkapasite . "<br>";
echo "<b>Toplam Koyun : </b> " . $koyun . "<br><hr>";



if ($agil > 0 && $kapasite > 0 && $koyun > 0) {

  if ($koyun > $kapasite) {
    echo $agil . ". Ağıl : " . $kapasite . "<br>";
    $koyun = $koyun - $kapasite;
    $agil--;

    $i = 1;
    while ($i <= $agil) {

      if ($koyun > $kapasite) {
        echo $agil . ". Ağıl : " . $kapasite . "<br>";
        $koyun = $koyun - $kapasite;

        $agil--;
      } else if ($koyun < 0) {
        echo $agil . ". Ağıl : " . "0" . "<br>";
        $koyun = $koyun - $kapasite;
        $agil--;
      } else {
        echo $agil . ". Ağıl : " . $koyun . "<br>";
        $koyun = $koyun - $kapasite;
        $agil--;
      }
    }
  }



  echo "<br> <hr>";


  if ($koyun > 0) {
    echo $koyun . " Tane Koyun Dışarıda Kaldı ";
  } 
} else if ($agil <= 0 && $koyun <= 0 && $kapasite <= 0) {
  echo "Ortada Hiç Bir Şey Yok";
} else if ($agil <= 0) {
  echo "Ortada Ağıl Yok";
} else if ($koyun <= 0) {
  echo "Ortada Koyun Yok";
} else if ($kapasite <= 0) {
  echo "Kapasite Yok";
}



?>






<hr>
<a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" target="_blank"><img width="25" src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt=""></a>
<hr>
<h4>Ödev Konusu : </h4>
<p>
  Bir dizi değişken içerisinde tanımlanan Ağıl Sayısı, Ağıl Kapasitesi ve Toplam Koyun sayılarına göre; tüm
  koyunları ağıl kapasitelerini aşmayacak şekilde ve verilen sayıdaki ağıla sondan başa doğru yerleştir.
  Sonuçların ölçülebilmesi amacıyla, her ağıldaki toplam koyun sayısını ve varsa artan koyun sayısını
  hesaplayarak ekrana yazdır. Eğer boş kalan ağıllar varsa 0 (sıfır) değerle ekrana yazdır.
</p>
</div>

</body>

</html>