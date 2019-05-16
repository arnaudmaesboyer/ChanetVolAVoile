<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    

    <div  class=" container col-md-2 col-md-offset-5">
    <h1>Login</h1>
        <form action="<?=site_url("connexion")?>" method="post" >
            <div class="form-group">
            <label for="identifiant">Email</label>
            <input type="email" class="form-control" name="identifiant" aria-describedby="emailHelp" placeholder="Entrer email">
            </div>
            <div class="form-group">
            <label for="Password">Mot de passe </label>
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
            </div>            
            <button type="submit" name="login" class="btn btn-primary">Connexion</button>
        </form>
        <a type="button" class="btn btn-primary" href="<?php echo site_url() ?>">Retour à l'accueil</a>
    </div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
