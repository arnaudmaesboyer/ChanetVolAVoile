<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<?php var_dump($admin[0]->idMonitor);   ?>
<div class="container" id="affichageBase">
<form action="<?php echo base_url('gestionAdmin/ChangePassword/'.$admin[0]->idMonitor.'')?>" method="post">

<div class="form-group">
    <label for="Password1">Password</label>
    <input type="password" class="form-control" name="Password1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="Password2">Password</label>
    <input type="password" class="form-control" name="Password2" placeholder="Password">
  </div>                                   
        <button type="button" class="btn btn-secondary">Retour</button>
        <button type="submit" class="btn btn-primary">Confirmer changement mot de passe</button>
</form>
</div>
<div class="container" id="search"></div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
