<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container" id="affichageBase">
<form action="<?php echo base_url('monitor/UpdateAdmin/'.$admin[0]->idMonitor.'')?>" method="post">
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Email</label>
                                                  <input type="email" class="form-control" name="mail" value="<?php echo $infos[0]->mail ;?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <a type="button" class="btn btn-secondary" href="<?php echo site_url('gestionAdmin/AffichageChangePassword') ?>">Changer mot de passe</a>
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Prenom</label>
                                                  <input type="text" class="form-control" name="FirstName" value="<?php echo $infos[0]->FirstName ;?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Nom</label>
                                                  <input type="text" class="form-control" name="LastName" value="<?php echo $infos[0]->LastName ;?>">
                                                </div>
                                              </div>
                                              <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label for="inputPhone">Telephone</label>
                                                <input type="text" class="form-control" name="Phone" value="<?php echo $infos[0]->Phone ;?>">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" class="form-control" name="Street" value="<?php echo $infos[0]->Street ;?>">
                                              </div></div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputCity">City</label>
                                                  <input type="text" class="form-control" name="City" value="<?php echo $infos[0]->City ;?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputCPP">CodePOstal</label>
                                                  <input type="text" class="form-control" name="PostalCode" value="<?php echo $infos[0]->PostalCode ;?>">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                              <label for="inputDate">Date de naissance</label>
                                              <input type="date" name="Birthday" value="<?php echo $infos[0]->Birthday ;?>">
                                                </div>
                                                <div class="form-group">
                                              <label for="inputDate">Date De diplome </label>
                                              <input type="date" name="dateValidation" value="<?php echo $infos[0]->GraduationDate ;?>">
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label for="inputCPP">nbheureVol</label>
                                                  <input type="text" class="form-control" name="nbHeureVol" value="<?php echo $infos[0]->FlightTotalHNumbre ;?>">
                                                </div></div>
                                                <button type="button" class="btn btn-secondary">Retour</button>
                                                <button type="submit" class="btn btn-primary">changer infos</button>
                                                  </form>
</div>
<div class="container" id="search"></div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
