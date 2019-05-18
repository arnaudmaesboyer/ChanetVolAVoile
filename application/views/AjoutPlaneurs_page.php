<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container" id="affichageBase"></div>
<form action="<?php echo site_url("GestionPlaneurs/AjoutPlaneur") ?>" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col">
    <label for="Registration">Immatriculation</label>
    <?php echo form_error('Registration'); ?>
      <input type="text" class="form-control" placeholder="Immatriculation" name="Registration">
    </div>
    <div class="col">
    <label for="Type">Type</label>
    <?php echo form_error('Type'); ?>
      <input type="text" class="form-control" placeholder="Type" name="Type">
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="NbPlace">Nombre de place</label>
    <?php echo form_error('NbPlace'); ?>
      <input type="text" class="form-control" placeholder="Nombre Place(s)" name="NbPlace">
    </div>
    <div class="col">
    <label for="Weight">POids</label>
    <?php echo form_error('Weight'); ?>
      <input type="text" class="form-control" placeholder="Poids" name="Weight">
    </div>
    <div class="col">
    <label for="Span">Envergure</label>
    <?php echo form_error('Span'); ?>
      <input type="text" class="form-control" placeholder="Envergure" name="Span">
    </div>
  </div>
  <div class="form-group">
    <label for="Image">Image</label>
    <input type="file" class="form-control-file" id="Image" name="Image" size="50">
  </div>
  <button type="submit" class="btn btn-primary" value="upload">Submit</button>
</form>
</div>
<div class="container" id="search"></div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>
