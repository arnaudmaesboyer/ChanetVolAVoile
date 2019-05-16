<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="affichageBase">
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
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      for($i=0; $i< count($infos) ;$i++) {
        if ($infos[$i]->idMonitor == Null){
          echo "<tr><td>".$infos[$i]->IdReservCust."</td><td>".$infos[$i]->DateReservClient."</td><td>".
          $infos[$i]->Registration."</td><td>".$infos[$i]->Type."</td><td>".$infos[$i]->idCust."</td><td>".
          $infos[$i]->LastName."</td><td><a href='http://localhost/ChanetVolAVoile/ReservationMonitorList/prendreReservation/".$infos[$i]->IdReservCust."'> Je reserve ce vol </a></td></tr>";
        }
        else{
          echo "<tr><td>".$infos[$i]->IdReservCust."</td><td>".$infos[$i]->DateReservClient."</td><td>".
          $infos[$i]->Registration."</td><td>".$infos[$i]->Type."</td><td>".$infos[$i]->idCust."</td><td>".
          $infos[$i]->LastName."</td><td>".$infos[$i]->idMonitor."</td></tr>";
        }
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
    "searching": true // false to disable search (or any other option)
    });
    $('.dataTables_length').addClass('bs-select');
    });
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css" >