<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
   //var_dump($planeurs);
?>
<div class="container mt-5 mb-5" id="affichageBase">
<table id="affichageReservation" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Immatriculation
      </th>
      <th class="th-sm">Type
      </th>
      <th class="th-sm">Nombre de Place
      </th>
      <th class="th-sm">POids
      </th>
      <th class="th-sm"> Envergure
      </th>
      <th class="th-sm">Image
      </th>
      <th class="th-sm">Action
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      for($i=0; $i< count($planeurs) ;$i++) {
       
          echo "<tr><td>".$planeurs[$i]->Registration."</td><td>".$planeurs[$i]->Type."</td><td>".
          $planeurs[$i]->NbPlace."</td><td>".$planeurs[$i]->Weight."</td><td>".$planeurs[$i]->Span."</td><td><img width=\" 100 %\"src=\"".
          $planeurs[$i]->Image."\"</td><td><a href=".site_url("GestionPlaneurs/DeletePlaneur/").$planeurs[$i]->Registration."> Supprimer ce planeur </a></td></tr>";
        
      } 
    ?>
  </tbody>
  <tfoot>
  <tr>
      <th >Immatriculation
      </th>
      <th >Type
      </th>
      <th>Nombre de Place
      </th>
      <th >POids
      </th>
      <th> Envergure
      </th>
      <th >Image
      </th>
      <th >Action
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
