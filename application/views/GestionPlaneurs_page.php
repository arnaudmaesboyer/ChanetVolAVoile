<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>




<?php 
   //var_dump($gliders[0]->Registration);
?>
<div class="container mt-5 mb-5" id="affichageBase">
<a type="button" class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('GestionPlaneurs/AffichageAjoutPlaneur') ?>">Ajouter un planeurs</a>
<a type="button" class="btn btn-secondary btn-lg btn-block" href="<?php echo site_url('GestionPlaneurs/AffichageDeletePlaneur') ?>">Supprimer un planeur</a>

</div>
<div class="container" id="search"></div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>
