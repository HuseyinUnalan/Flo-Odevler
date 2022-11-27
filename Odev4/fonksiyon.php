<?php 


class Kurallar
{

  public function rule()
  {
    if (strlen($_POST["tckimlik"]) == 11) {
      $tekhanelertoplami = (substr($_POST["tckimlik"], 0, 1) + substr($_POST["tckimlik"], 2, 1) + substr($_POST["tckimlik"], 4, 1) +
        substr($_POST["tckimlik"], 6, 1) + substr($_POST["tckimlik"], 8, 1));
    }
    if (strlen($_POST["tckimlik"]) == 11) {
      $cifthanelertoplami = (substr($_POST["tckimlik"], 1, 1) + substr($_POST["tckimlik"], 3, 1) + substr($_POST["tckimlik"], 5, 1) +
        substr($_POST["tckimlik"], 7, 1));
    }

    if (strlen($_POST["tckimlik"]) == 11) {
      $hanelertoplami =  (substr($_POST["tckimlik"], 0, 1) + substr($_POST["tckimlik"], 1, 1) + substr($_POST["tckimlik"], 2, 1) +
        substr($_POST["tckimlik"], 3, 1) + substr($_POST["tckimlik"], 4, 1) + substr($_POST["tckimlik"], 5, 1) + substr($_POST["tckimlik"], 6, 1) +
        substr($_POST["tckimlik"], 7, 1) + substr($_POST["tckimlik"], 8, 1) + substr($_POST["tckimlik"], 9, 1));
    }


    $kuralBir = (($tekhanelertoplami * 7) - $cifthanelertoplami) % 10 == substr($_POST["tckimlik"], 9, 1);
    $kuralIki = $hanelertoplami % 10 == substr($_POST["tckimlik"], 10, 1);
    $kuralUc = strlen($_POST["tckimlik"]) == 11;
    $kuralDort = substr($_POST["tckimlik"], 0, 1) != 0;

    if ($kuralBir == true && $kuralIki == true && $kuralUc == true && $kuralDort == true) {
      return $this->kuralBir;
      return $this->kuralIki;
      return $this->kuralUc;
      return $this->kuralDort;
    }
  }

  public function dogrula()
  {
    $this->kuralBir = true;
    $this->kuralIki = true;
    $this->kuralUc = true;
    $this->kuralDort = true;
  }
}
