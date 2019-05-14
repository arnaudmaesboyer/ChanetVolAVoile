<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
<form action="<?php echo site_url("GestionPlaneurs/AjoutPlaneur") ?>" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col">
    <label for="Registration">Immatriculation</label>
      <input type="text" class="form-control" placeholder="Immatriculation" name="Registration">
    </div>
    <div class="col">
    <label for="Type">Type</label>
      <input type="text" class="form-control" placeholder="Type" name="Type">
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="NbPlace">Nombre de place</label>
      <input type="text" class="form-control" placeholder="Nombre Place(s)" name="NbPlace">
    </div>
    <div class="col">
    <label for="Weight">POids</label>
      <input type="text" class="form-control" placeholder="Poids" name="Weight">
    </div>
    <div class="col">
    <label for="Span">Envergure</label>
      <input type="text" class="form-control" placeholder="Envergure" name="Span">
    </div>
  </div>
  <div class="form-group">
    <label for="Image">Image</label>
    <input type="file" class="form-control-file" id="Image" name="Image" size="50">
  </div>
  <button type="submit" class="btn btn-primary" value="upload">Submit</button>
</form>