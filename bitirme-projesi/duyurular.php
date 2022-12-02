<?php require_once 'header.php'; ?>

<!-- vertical timeline CSS-->
<link href="assets/plugins/vertical-timeline/css/vertical-timeline.css" rel="stylesheet" />

<div class="clearfix"></div>

<div class="content-wrapper">
  <div class="container-fluid">

  </div>
  <!-- End Breadcrumb-->
  <div class="row">
    <div class="col-lg-12">
      <section class="cd-timeline js-cd-timeline">
        <div class="cd-timeline__container">

          <?php

          $duyurusor = $db->prepare("SELECT * FROM duyuru WHERE duyuru_durum=:duyuru_durum ORDER BY duyuru_id DESC");
          $duyurusor->execute(array(
            'duyuru_durum' => 'Aktif'
          ));

          while ($duyurucek = $duyurusor->fetch(PDO::FETCH_ASSOC)) { ?>


            <div class="cd-timeline__block js-cd-block">
              <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                <img src="assets/images/timeline/cd-icon-location.svg" alt="Picture">
              </div>
              <div class="cd-timeline__content js-cd-content">
                <h4><?php echo $duyurucek["duyuru_baslik"] ?></h4>
                <p><?php echo $duyurucek["duyuru_icerik"] ?> <hr> <?php echo $duyurucek["duyuru_tarih"] ?></p>
                <span class="cd-timeline__date"></span>
              </div>
            </div>

          <?php } ?>



        </div>
      </section>
    </div>
  </div>

</div>
<!-- End container-fluid-->

</div>
<!--End content-wrapper-->

<?php require_once 'footer.php'; ?>

<!-- Vertical timeline js -->
<script src="assets/plugins/vertical-timeline/js/vertical-timeline.js"></script>