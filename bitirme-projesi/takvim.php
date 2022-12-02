<?php

require_once 'header.php';

$takvimsor = $db->prepare("SELECT * FROM takvim");
$takvimsor->execute();

?>



<!--Full Calendar Css-->
<link href="assets/plugins/fullcalendar/css/fullcalendar.min.css" rel='stylesheet' />


<!-- Start wrapper-->
<div id="wrapper">





  <div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumb-->
      <div class="row pt-2 pb-2">
        <div class="col-sm-9">
          <h4 class="page-title">Takvim</h4>
        </div>
        </div>
      </div>
      <!-- End Breadcrumb-->

      <div id='calendar'></div>

    </div>
    <!-- End container-fluid-->
  </div>
  <!--End content-wrapper-->


  <?php require_once 'footer.php'; ?>



  <!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>


  <!-- Full Calendar -->
  <script src='assets/plugins/fullcalendar/js/moment.min.js'></script>
  <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
  <script src="assets/plugins/fullcalendar/js/fullcalendar-custom-script.js"></script>

  <script>
    $(document).ready(function() {

      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '<?php echo date("Y-m-d") ?>',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
          var eventData;
          if (title) {
            eventData = {
              title: title,
              start: start,
              end: end,
            };
            $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
          }
          $('#calendar').fullCalendar('unselect');
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
          <?php
          while ($takvimcek = $takvimsor->fetch(PDO::FETCH_ASSOC)) { ?>

            {
              title: '<?php echo $takvimcek["takvim_baslik"] ?>',
              start: '<?php echo $takvimcek["takvim_tarih"] ?>'
            },

          <?php } ?>
        ]
      });

    });
  </script>