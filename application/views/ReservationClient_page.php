<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

<?php 
   //var_dump($gliders[0]->Registration);
?>
<div class="container" id="affichageBase">
<form  action= "<?php echo site_url('reservationCLient/reserver')?>" method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="dateReservation">Choississez votre date</label>
    <input type="date" class="form-control" name="dateReserv">
    </div>
    <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">PLaneur voulu</label>
    <select class="form-control" name="SelectGliders">
    <?php 
    $i=0;
    
      for($i=0; $i< count($gliders) ;$i++) {
            echo (" <option value=".$gliders[$i]->Registration.">".$gliders[$i]->Type."</option>");
      }
    ?>
    </select>
    </div>
  </div >
  <button type="submit" class="btn btn-primary">Reserver</button>
</form>

</div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>

