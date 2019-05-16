<body>

<div class="container" id="affichageBase">


<body>
<table id="affichageReservation" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Numero de Reservation
      </th>
      <th class="th-sm">Date de Reservation
      </th>
      <th class="th-sm">Registration
      </th>
      <th class="th-sm">Type
      </th>
      <th class="th-sm">Numero de CLient
      </th>
      <th class="th-sm">Nom de CLient
      </th>
      <th class="th-sm">Numero de Moniteur
      </th>
      <th class="th-sm">
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
     $i=0;
     for($i=0; $i< count($reservation) ;$i++) {
         echo "<tr><td>".$reservation[$i]->IdReservCust."</td><td>".$reservation[$i]->DateReservClient."</td><td>".
         $reservation[$i]->Registration."</td><td>".$reservation[$i]->Type."</td><td>".$reservation[$i]->idCust."</td><td>".
         $reservation[$i]->LastName."</td><td>".$reservation[$i]->idMonitor."</td><td><a href=".site_url('ReservationClient/annulerReservation/').$reservation[$i]->IdReservCust."'> Annuler</a></td></tr>";
       }
    ?>
  </tbody>
  <tfoot>
  <tr>
      <th>Numero de Reservation
      </th>
      <th>Date de Reservation
      </th>
      <th>Registration
      </th>
      <th>Type
      </th>
      <th>Numero de CLient
      </th>
      <th>Nom de CLient
      </th>
      <th>Numero de Moniteur
      </th>
    </tr>
  </tfoot>
</table>
</div>
<div class="container" id="search"></div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>

<script>
$(document).ready(function () {
    $('#affichageReservation').DataTable({
    "searching": true, // false to disable search (or any other option)
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
    "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"}
  });


    $('.dataTables_length').addClass('bs-select');

  });
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css" >
