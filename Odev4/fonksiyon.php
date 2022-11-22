<?php 

class Kurallar
{
  public $tekhanelertoplamı;
  public $cifthanelerintoplamı;
  public $hanelerintoplamı;
  public $tckimlik;
  public $ilkhane;
}


$tekhanelertoplamı = new Kurallar();
$cifthanelerintoplamı = new Kurallar();
$hanelerintoplam = new Kurallar();
$tckimlik = new Kurallar();
$ilkhane = new Kurallar();


if (strlen($_POST["tckimlik"]) == 11) {
  $tekhanelertoplamı->tekhanelertoplamı = (substr($_POST["tckimlik"], 0, 1) + substr($_POST["tckimlik"], 2, 1) + substr($_POST["tckimlik"], 4, 1) +
    substr($_POST["tckimlik"], 6, 1) + substr($_POST["tckimlik"], 8, 1));
}
if (strlen($_POST["tckimlik"]) == 11) {
  $cifthanelerintoplamı->cifthanelerintoplamı = (substr($_POST["tckimlik"], 1, 1) + substr($_POST["tckimlik"], 3, 1) + substr($_POST["tckimlik"], 5, 1) +
    substr($_POST["tckimlik"], 7, 1));
}

if (strlen($_POST["tckimlik"]) == 11) {
  $hanelerintoplam->hanelerintoplamı =  (substr($_POST["tckimlik"], 0, 1) + substr($_POST["tckimlik"], 1, 1) + substr($_POST["tckimlik"], 2, 1) +
    substr($_POST["tckimlik"], 3, 1) + substr($_POST["tckimlik"], 4, 1) + substr($_POST["tckimlik"], 5, 1) + substr($_POST["tckimlik"], 6, 1) +
    substr($_POST["tckimlik"], 7, 1) + substr($_POST["tckimlik"], 8, 1) + substr($_POST["tckimlik"], 9, 1));
}

$tckimlik->tckimlik = $_POST["tckimlik"];

$ilkhane->ilkhane = substr($_POST["tckimlik"], 0, 1);

$kuralBir = (($tekhanelertoplamı->tekhanelertoplamı * 7) - $cifthanelerintoplamı->cifthanelerintoplamı) % 10 == substr($_POST["tckimlik"], 9, 1);
$kuralIki = $hanelerintoplam->hanelerintoplamı % 10 == substr($_POST["tckimlik"], 10, 1);
$kuralUc = strlen($tckimlik->tckimlik) == 11;
$kuralDort = $ilkhane->ilkhane != 0;

?>