<body>

<div class="container" id="affichageBase">

<table id="affichageReservation" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Numero d'erreur
      </th>
      <th class="th-sm">Description
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
     $i=0;
     for($i=0; $i< count($erreur) ;$i++) {
         echo ("<tr><td>".$erreur[$i]->id."</td><td>".$erreur[$i]->TextErreur."</td></tr>") ;
     }
    ?>
  </tbody>
  <tfoot>
  <tr>
  <th >Numero d'erreur
      </th>
    <th>Description
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
