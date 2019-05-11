
<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
	 <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            
                <title>ChanetVolAVoile</title>

	
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Chanet Vol à Voile</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo site_url()?>">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadGliders()">Nos planeurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="loadMonitor()">Nos moniteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"onclick="loadInitiation()">Vol d'initiation</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reserver
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Reserver un vol</a>
                        <a class="dropdown-item" href="#">Mes reservations</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                  </ul>
                  <?php if (!$isAdmin && !$isClient){
                    ?>  <form class="form-inline">
                        <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#inscrire">S'inscrire</button>
                        <a class="btn btn-sm btn-outline-secondary" type="a" href="<?php echo site_url("connexion")?>">S'identifer</a>
                        </form>
                  <?php 
                  } ?>
                    <?php if ($isAdmin){
                    ?> 
                    <li class="nav-item dropdown form-inline">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon compte
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="http://localhost/ChanetVolAVoile/gestionAdmin">Mes Informations</a>
                          <a class="dropdown-item" href="#">Consulter les réservations</a>'
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="http://localhost/ChanetVolAVoile/gestionConnexion/deconnecter">Deconnexion</a>
                        </div>
                    </li>
                     <?php } ?>
                     <?php if ($isClient){
                    ?> 
                    <li class="nav-item dropdown form-inline">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon compte
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="http://localhost/ChanetVolAVoile/gestionClient">Mes Informations</a>
                          <a class="dropdown-item" href="#">Mes Réservations</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="http://localhost/ChanetVolAVoile/gestionConnexion/deconnecter">Deconnexion</a>
                        </div>
                    </li>
                     <?php } ?>
                  

                
                </div>
              </nav>

<!-- Modal -->
<div class="modal fade" id="inscrire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="inscriptionForm">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="mail" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Prenom</label>
      <input type="text" class="form-control" id="FirstName" placeholder="Prenom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nom</label>
      <input type="text" class="form-control" id="LastName" placeholder="Nom">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone">Telephone</label>
    <input type="text" class="form-control" id="Phone" placeholder="0600000000">
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="Street" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="City" placeholder="Montpellier">
    </div>
    <div class="form-group col-md-4">
    <label for="inputCPP">CodePOstal</label>
      <input type="text" class="form-control" id="PostalCode" placeholder="34000">
    </div>
  </div>
  <div class="form-group">
  <label for="inputDate">Date de naissance</label>
  <input type="date" id="Birthday">
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" id="btn_save" >M'inscrire</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="identifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">S'identifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="connexionForm">
          <div class="form-group">
            <label for="identifiant">Nom Utilisateur(email)</label>
            <input type="email" class="form-control" id="identifiant" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Mot de Passe</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary">S'identifier</button>
        </form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick=window.location.href="http://localhost/ChanetVolAVoile/connexion">S'identifier</button>
      </div> -->
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>











<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>