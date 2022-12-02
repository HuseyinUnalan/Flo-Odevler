<?php

require_once 'baglan.php';


if (isset($_POST['admingiris'])) {

	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_password = md5($_POST['kullanici_password']);

	$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,

	));

	echo $say = $kullanicisor->rowCount();

	if ($say == 1) {

		$_SESSION['kullanici_mail'] = $kullanici_mail;

		header("Location:../home");
		exit;
	} else {

		header("Location:../login?durum=no");
		exit;
	}
}




if (isset($_POST['ogrencisifrekaydet'])) {


	$kaydet = $db->prepare("INSERT INTO kullanici SET
		kullanici_mail=:kullanici_mail,
		kullanici_password=:kullanici_password,
		kullanici_durum=:kullanici_durum,
		ogrenci_id=:ogrenci_id,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_okulnumara=:kullanici_okulnumara,
		kullanici_resimyol=:kullanici_resimyol





		");
	$insert = $kaydet->execute(array(
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_password' => md5($_POST['kullanici_password']),
		'kullanici_durum' => 3,
		'ogrenci_id' => $_POST['ogrenci_id'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_okulnumara' => $_POST['kullanici_okulnumara'],
		'kullanici_resimyol' => $_POST['kullanici_resimyol']



	));

	if ($insert) {

		Header("Location:../ogrenci-listesi?durum=ok");
	} else {

		Header("Location:../ogrenci-listesi?durum=no");
	}
}



if (isset($_POST['ogretmensifrekaydet'])) {


	$kaydet = $db->prepare("INSERT INTO kullanici SET
		kullanici_mail=:kullanici_mail,
		kullanici_password=:kullanici_password,
		kullanici_durum=:kullanici_durum,
		ogretmen_id=:ogretmen_id,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_brans=:kullanici_brans,
		kullanici_resimyol=:kullanici_resimyol
		



		");
	$insert = $kaydet->execute(array(
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_password' => md5($_POST['kullanici_password']),
		'kullanici_durum' => 2,
		'ogretmen_id' => $_POST['ogretmen_id'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_brans' => $_POST['kullanici_brans'],
		'kullanici_resimyol' => $_POST['kullanici_resimyol']



	));

	if ($insert) {

		Header("Location:../ogretmen-listesi?durum=ok");
	} else {

		Header("Location:../ogretmen-listesi?durum=no");
	}
}





if (isset($_POST['ogrencikaydet'])) {


	$uploads_dir = '../images/ogrenciresimler';
	@$tmp_name = $_FILES['ogrenci_resimyol']["tmp_name"];
	@$name = $_FILES['ogrenci_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1 = rand(20000, 32000);
	$benzersizsayi2 = rand(20000, 32000);
	$benzersizsayi3 = rand(20000, 32000);
	$benzersizsayi4 = rand(20000, 32000);
	$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
	$refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	$kaydet = $db->prepare("INSERT INTO ogrenci SET
		ogrenci_adsoyad=:ogrenci_adsoyad,
			ogrenci_tc=:ogrenci_tc,
			ogrenci_cinsiyet=:ogrenci_cinsiyet,
			ogrenci_dogum=:ogrenci_dogum,
			ogrenci_adres=:ogrenci_adres,
			ogrenci_telefon=:ogrenci_telefon,
			ogrenci_resimyol=:resimyol	
		
		");
	$insert = $kaydet->execute(array(
		'ogrenci_adsoyad' => $_POST['ogrenci_adsoyad'],
		'ogrenci_tc' => $_POST['ogrenci_tc'],
		'ogrenci_cinsiyet' => $_POST['ogrenci_cinsiyet'],
		'ogrenci_dogum' => $_POST['ogrenci_dogum'],
		'ogrenci_adres' => $_POST['ogrenci_adres'],
		'ogrenci_telefon' => $_POST['ogrenci_telefon'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../ogrenci-ekle?durum=ok");
	} else {

		Header("Location:../ogrenci-ekle?durum=no");
	}
}





if (isset($_POST['ogrenciduzenle'])) {


	if ($_FILES['ogrenci_resimyol']["size"] > 0) {


		$uploads_dir = '../images/ogrenciresimler';
		@$tmp_name = $_FILES['ogrenci_resimyol']["tmp_name"];
		@$name = $_FILES['ogrenci_resimyol']["name"];
		$benzersizsayi1 = rand(20000, 32000);
		$benzersizsayi2 = rand(20000, 32000);
		$benzersizsayi3 = rand(20000, 32000);
		$benzersizsayi4 = rand(20000, 32000);
		$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
		$refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle = $db->prepare("UPDATE ogrenci SET
			ogrenci_adsoyad=:ogrenci_adsoyad,
			ogrenci_tc=:ogrenci_tc,
			ogrenci_cinsiyet=:ogrenci_cinsiyet,
			ogrenci_dogum=:ogrenci_dogum,
			ogrenci_adres=:ogrenci_adres,
			ogrenci_telefon=:ogrenci_telefon,
			ogrenci_resimyol=:resimyol	
			WHERE ogrenci_id={$_POST['ogrenci_id']}");
		$update = $duzenle->execute(array(
			'ogrenci_adsoyad' => $_POST['ogrenci_adsoyad'],
			'ogrenci_tc' => $_POST['ogrenci_tc'],
			'ogrenci_cinsiyet' => $_POST['ogrenci_cinsiyet'],
			'ogrenci_dogum' => $_POST['ogrenci_dogum'],
			'ogrenci_adres' => $_POST['ogrenci_adres'],
			'ogrenci_telefon' => $_POST['ogrenci_telefon'],
			'resimyol' => $refimgyol
		));


		$ogrenci_id = $_POST['ogrenci_id'];

		if ($update) {

			$resimsilunlink = $_POST['eski_yol'];
			unlink("../$resimsilunlink");

			Header("Location:../ogrenci-duzenle?ogrenci_id=$ogrenci_id&durum=ok");
		} else {

			Header("Location:../ogrenci-duzenle?durum=no");
		}
	} else {

		$duzenle = $db->prepare("UPDATE ogrenci SET
			ogrenci_adsoyad=:ogrenci_adsoyad,
			ogrenci_tc=:ogrenci_tc,
			ogrenci_cinsiyet=:ogrenci_cinsiyet,
			ogrenci_dogum=:ogrenci_dogum,
			ogrenci_adres=:ogrenci_adres,
			ogrenci_telefon=:ogrenci_telefon
			
		
			
			
			WHERE ogrenci_id={$_POST['ogrenci_id']}");
		$update = $duzenle->execute(array(
			'ogrenci_adsoyad' => $_POST['ogrenci_adsoyad'],
			'ogrenci_tc' => $_POST['ogrenci_tc'],
			'ogrenci_cinsiyet' => $_POST['ogrenci_cinsiyet'],
			'ogrenci_dogum' => $_POST['ogrenci_dogum'],
			'ogrenci_adres' => $_POST['ogrenci_adres'],
			'ogrenci_telefon' => $_POST['ogrenci_telefon']


		));

		$ogrenci_id = $_POST['ogrenci_id'];

		if ($update) {

			Header("Location:../ogrenci-duzenle?ogrenci_id=$ogrenci_id&durum=ok");
		} else {

			Header("Location:../ogrenci-duzenle?durum=no");
		}
	}
}


if ($_GET['ogrencisil'] == "ok") {


	$sil = $db->prepare("DELETE from ogrenci where ogrenci_id=:ogrenci_id");
	$kontrol = $sil->execute(array(
		'ogrenci_id' => $_GET['ogrenci_id']
	));

	if ($kontrol) {

		$resimsilunlink = $_GET['ogrenci_resimyol'];
		unlink("../$resimsilunlink");

		Header("Location:../ogrenci-listesi?durum=ok");
	} else {

		Header("Location:../ogrenci-listesi?durum=no");
	}
}



if ($_GET['ogrencikullanicisil'] == "ok") {


	$sil = $db->prepare("DELETE from kullanici where ogrenci_id=:ogrenci_id");
	$kontrol = $sil->execute(array(
		'ogrenci_id' => $_GET['ogrenci_id']
	));

	if ($kontrol) {



		Header("Location:../ogrenci-listesi?durum=ok");
	} else {

		Header("Location:../ogrenci-listesi?durum=no");
	}
}

if ($_GET['ogretmenkullanicisil'] == "ok") {


	$sil = $db->prepare("DELETE from kullanici where ogretmen_id=:ogretmen_id");
	$kontrol = $sil->execute(array(
		'ogretmen_id' => $_GET['ogretmen_id']
	));

	if ($kontrol) {



		Header("Location:../ogretmen-listesi?durum=ok");
	} else {

		Header("Location:../ogretmen-listesi?durum=no");
	}
}


if (isset($_POST['ogretmenkaydet'])) {


	$uploads_dir = '../images/ogretmenresimler';
	@$tmp_name = $_FILES['ogretmen_resimyol']["tmp_name"];
	@$name = $_FILES['ogretmen_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1 = rand(20000, 32000);
	$benzersizsayi2 = rand(20000, 32000);
	$benzersizsayi3 = rand(20000, 32000);
	$benzersizsayi4 = rand(20000, 32000);
	$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
	$refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	$kaydet = $db->prepare("INSERT INTO ogretmen SET
		ogretmen_adsoyad=:ogretmen_adsoyad,
			ogretmen_brans=:ogretmen_brans,
			ogretmen_tc=:ogretmen_tc,
			ogretmen_tel=:ogretmen_tel,
			ogretmen_resimyol=:resimyol	
		
		");
	$insert = $kaydet->execute(array(
		'ogretmen_adsoyad' => $_POST['ogretmen_adsoyad'],
		'ogretmen_brans' => $_POST['ogretmen_brans'],
		'ogretmen_tc' => $_POST['ogretmen_tc'],
		'ogretmen_tel' => $_POST['ogretmen_tel'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../ogretmen-ekle?durum=ok");
	} else {

		Header("Location:../ogretmen-ekle?durum=no");
	}
}





if (isset($_POST['ogretmenduzenle'])) {


	if ($_FILES['ogretmen_resimyol']["size"] > 0) {


		$uploads_dir = '../images/ogretmenresimler';
		@$tmp_name = $_FILES['ogretmen_resimyol']["tmp_name"];
		@$name = $_FILES['ogretmen_resimyol']["name"];
		$benzersizsayi1 = rand(20000, 32000);
		$benzersizsayi2 = rand(20000, 32000);
		$benzersizsayi3 = rand(20000, 32000);
		$benzersizsayi4 = rand(20000, 32000);
		$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
		$refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle = $db->prepare("UPDATE ogretmen SET
			ogretmen_adsoyad=:ogretmen_adsoyad,
			ogretmen_brans=:ogretmen_brans,
			ogretmen_tc=:ogretmen_tc,
			ogretmen_tel=:ogretmen_tel,
			ogretmen_resimyol=:resimyol	
			WHERE ogretmen_id={$_POST['ogretmen_id']}");
		$update = $duzenle->execute(array(
			'ogretmen_adsoyad' => $_POST['ogretmen_adsoyad'],
			'ogretmen_brans' => $_POST['ogretmen_brans'],
			'ogretmen_tc' => $_POST['ogretmen_tc'],
			'ogretmen_tel' => $_POST['ogretmen_tel'],
			'resimyol' => $refimgyol
		));


		$ogretmen_id = $_POST['ogretmen_id'];

		if ($update) {

			$resimsilunlink = $_POST['eski_yol'];
			unlink("../$resimsilunlink");

			Header("Location:../ogretmen-duzenle?ogretmen_id=$ogretmen_id&durum=ok");
		} else {

			Header("Location:../ogretmen-duzenle?durum=no");
		}
	} else {

		$duzenle = $db->prepare("UPDATE ogretmen SET
			ogretmen_adsoyad=:ogretmen_adsoyad,
			ogretmen_brans=:ogretmen_brans,
			ogretmen_tc=:ogretmen_tc,
			ogretmen_tel=:ogretmen_tel
		
			
			
			WHERE ogretmen_id={$_POST['ogretmen_id']}");
		$update = $duzenle->execute(array(
			'ogretmen_adsoyad' => $_POST['ogretmen_adsoyad'],
			'ogretmen_brans' => $_POST['ogretmen_brans'],
			'ogretmen_tc' => $_POST['ogretmen_tc'],
			'ogretmen_tel' => $_POST['ogretmen_tel']



		));

		$ogretmen_id = $_POST['ogretmen_id'];

		if ($update) {

			Header("Location:../ogretmen-duzenle?ogretmen_id=$ogretmen_id&durum=ok");
		} else {

			Header("Location:../ogretmen-duzenle?durum=no");
		}
	}
}


if ($_GET['ogretmensil'] == "ok") {


	$sil = $db->prepare("DELETE from ogretmen where ogretmen_id=:ogretmen_id");
	$kontrol = $sil->execute(array(
		'ogretmen_id' => $_GET['ogretmen_id']
	));

	if ($kontrol) {

		$resimsilunlink = $_GET['eski_yol'];
		unlink("../$resimsilunlink");

		Header("Location:../ogretmen-listesi?durum=ok");
	} else {

		Header("Location:../ogretmen-listesi?durum=no");
	}
}


if (isset($_POST['derskaydet'])) {


	$kaydet = $db->prepare("INSERT INTO ders SET
	ders_ad=:ders_ad
	
	
	");
	$insert = $kaydet->execute(array(
		'ders_ad' => $_POST['ders_ad']

	));

	if ($insert) {

		Header("Location:../ders-ekle?durum=ok");
	} else {

		Header("Location:../ders-ekle?durum=no");
	}
}


if ($_GET['derssil'] == "ok") {


	$sil = $db->prepare("DELETE from ders where ders_id=:ders_id");
	$kontrol = $sil->execute(array(
		'ders_id' => $_GET['ders_id']
	));

	if ($kontrol) {

		$resimsilunlink = $_GET['ders_resimyol'];
		unlink("../$resimsilunlink");

		Header("Location:../ders-listesi?durum=ok");
	} else {

		Header("Location:../ders-listesi?durum=no");
	}
}






if (isset($_POST['takvimkaydet'])) {


	$kaydet = $db->prepare("INSERT INTO takvim SET
	takvim_baslik=:takvim_baslik,
	takvim_tarih=:takvim_tarih
	
	
	");
	$insert = $kaydet->execute(array(
		'takvim_baslik' => $_POST['takvim_baslik'],
		'takvim_tarih' => $_POST['takvim_tarih']


	));

	if ($insert) {

		Header("Location:../takvim-ekle?durum=ok");
	} else {

		Header("Location:../takvim-ekle?durum=no");
	}
}




if ($_GET['takvimsil'] == "ok") {


	$sil = $db->prepare("DELETE from takvim where takvim_id=:takvim_id");
	$kontrol = $sil->execute(array(
		'takvim_id' => $_GET['takvim_id']
	));

	if ($kontrol) {

		Header("Location:../takvim-listesi?durum=ok");
	} else {

		Header("Location:../takvim-listesi?durum=no");
	}
}

if (isset($_POST['notduzenle'])) {

	//Tablo güncelleme işlemi kodları...
	$notkaydet = $db->prepare("UPDATE notlar SET
		not_vize1=:not_vize1,
		not_vize2=:not_vize2,
		not_final=:not_final,
		not_ders=:not_ders

		WHERE not_id={$_POST['not_id']}");

	$update = $notkaydet->execute(array(
		'not_vize1' => $_POST['not_vize1'],
		'not_vize2' => $_POST['not_vize2'],
		'not_final' => $_POST['not_final'],
		'not_ders' => $_POST['not_ders']


	));


	if ($update) {

		$not_id = $_POST["not_id"];

		header("Location:../ogrenci-not?not_id=$not_id&durum=ok");
	} else {

		header("Location:../ogrenci-listesi?durum=no");
	}
}


if (isset($_POST['notortalamakaydet'])) {

	//Tablo güncelleme işlemi kodları...
	$notkaydet = $db->prepare("UPDATE notlar SET
		not_ort=:not_ort

		WHERE not_id={$_POST['not_id']}");

	$update = $notkaydet->execute(array(
		'not_ort' => $_POST['not_ort']


	));


	if ($update) {

		$not_id = $_POST["not_id"];

		header("Location:../ogrenci-not-sonuclandır?not_id=$not_id&durum=ok");
	} else {

		header("Location:../ogrenci-listesi?durum=no");
	}
}




if (isset($_POST['notkaydet'])) {


	$kaydet = $db->prepare("INSERT INTO notlar SET
		not_vize1=:not_vize1,
		not_vize2=:not_vize2,
		not_final=:not_final,
		ogrenci_id=:ogrenci_id,
		not_ders=:not_ders

		
		
		");
	$insert = $kaydet->execute(array(
		'not_vize1' => $_POST['not_vize1'],
		'not_vize2' => $_POST['not_vize2'],
		'not_final' => $_POST['not_final'],
		'ogrenci_id' => $_POST['ogrenci_id'],
		'not_ders' => $_POST['not_ders']



	));

	if ($insert) {

		Header("Location:../ogrenci-listesi?durum=ok");
	} else {

		Header("Location:../ogrenci-listesi?durum=no");
	}
}




if ($_GET['notsil'] == "ok") {


	$sil = $db->prepare("DELETE from notlar where not_id=:not_id");
	$kontrol = $sil->execute(array(
		'not_id' => $_GET['not_id']
	));

	if ($kontrol) {

		$ogrenci_id = $_POST["ogrenci_id"];
		Header("Location:../ogrenci-listesi?durum=ok");
	} else {

		Header("Location:../ogrenci-listesi?durum=no");
	}
}





if (isset($_POST['duyurukaydet'])) {


	$kaydet = $db->prepare("INSERT INTO duyuru SET
		duyuru_baslik=:duyuru_baslik,
			duyuru_icerik=:duyuru_icerik,
			duyuru_durum=:duyuru_durum

		
		");
	$insert = $kaydet->execute(array(
		'duyuru_baslik' => $_POST['duyuru_baslik'],
		'duyuru_icerik' => $_POST['duyuru_icerik'],
		'duyuru_durum' => $_POST['duyuru_durum']


	));

	if ($insert) {

		Header("Location:../duyuru-ekle?durum=ok");
	} else {

		Header("Location:../duyuru-ekle?durum=no");
	}
}





if (isset($_POST['duyuruduzenle'])) {


	$duzenle = $db->prepare("UPDATE duyuru SET
			duyuru_baslik=:duyuru_baslik,
			duyuru_icerik=:duyuru_icerik,
			duyuru_durum=:duyuru_durum
		
			
			
			WHERE duyuru_id={$_POST['duyuru_id']}");
	$update = $duzenle->execute(array(
		'duyuru_baslik' => $_POST['duyuru_baslik'],
		'duyuru_icerik' => $_POST['duyuru_icerik'],
		'duyuru_durum' => $_POST['duyuru_durum']

	));

	$duyuru_id = $_POST['duyuru_id'];

	if ($update) {

		Header("Location:../duyuru-duzenle?duyuru_id=$duyuru_id&durum=ok");
	} else {

		Header("Location:../duyuru-duzenle?durum=no");
	}
}


if ($_GET['duyurusil'] == "ok") {


	$sil = $db->prepare("DELETE from duyuru where duyuru_id=:duyuru_id");
	$kontrol = $sil->execute(array(
		'duyuru_id' => $_GET['duyuru_id']
	));

	if ($kontrol) {

		$resimsilunlink = $_GET['duyuru_resimyol'];
		unlink("../$resimsilunlink");

		Header("Location:../duyuru-listesi?durum=ok");
	} else {

		Header("Location:../duyuru-listesi?durum=no");
	}
}


if (isset($_POST['mesajgonder'])) {

	$kullanici_gel=$_POST['kullanici_gel'];
	
	$kaydet=$db->prepare("INSERT INTO mesaj SET

		mesaj_detay=:mesaj_detay,
		kullanici_gel=:kullanici_gel,
		kullanici_gon=:kullanici_gon
		");

	$insert=$kaydet->execute(array(

		'mesaj_detay' => $_POST['mesaj_detay'],
		'kullanici_gel' => htmlspecialchars($_POST['kullanici_gel']),
		'kullanici_gon' => htmlspecialchars( $_SESSION['kullanici_mail'])

	));

	if ($insert) {
		
		
		Header("Location:../home?durum=ok");

	} else {

		Header("Location:../home?durum=no");


	}


}


if (@$_GET['mesajsil'] == "ok") {



	$sil = $db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
	$kontrol = $sil->execute(array(
		'mesaj_id' => $_GET['mesaj_id']
	));


	if ($kontrol) {


		header("location:../home?sil=ok");
	} else {

		header("location:../home?sil=no");
	}
}




