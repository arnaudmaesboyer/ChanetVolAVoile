
<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
	 <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            
                <title>ChanetVolAVoile</title>
                <link rel="icon" type="image/png" href="<?php echo site_url('assets/image/paper-plane.png')?> "/>

	
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand"  href="<?php echo site_url()?>">Chanet Vol à Voile</a>
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
                      <?php if (!$isAdmin && !$isClient){ ?>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo site_url("connexion")?>">Reserver un vol</a>
                        <a class="dropdown-item" href="<?php echo site_url("connexion")?>">Mes reservations</a>
                      </div>
                    <?php } ?>
                    <?php if ($isAdmin){ ?>
                     
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo site_url("ReservationMonitorList")?>">Voir les vols reservés</a>
                      </div>
                      <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url("GestionPLaneurs")?>">Gestion des planeurs</a>
                    </li>
                      <?php } ?>
                    <?php if ($isClient){ ?>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo site_url("ReservationClient")?>">Reserver un vol</a>
                        <a class="dropdown-item" href="<?php echo site_url("ReservationClient/AffichageReservation")?>">Mes reservations</a>
                      </div>
              
                      <?php } ?>
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
                          <a class="dropdown-item" href="<?php echo site_url("gestionAdmin")?>">Mes Informations</a>
                          <a class="dropdown-item" href="<?php echo site_url("AffichageErreur")?>">Voir les logs d'erreurs</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?php echo site_url("GestionConnexion/deconnecter")?>">Deconnexion</a>
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
                          <a class="dropdown-item" href="<?php echo site_url("gestionClient")?>">Mes Informations</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?php echo site_url("GestionConnexion/deconnecter")?>">Deconnexion</a>
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
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
function loadGliders(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('glidersAjax/affichageAjax')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                  document.getElementById('affichageBase').style.display="none";
                  document.getElementById('liste').style.display="none";
                  document.getElementById('glider').style.display="none";
                  var search = '<div class="row justify-content-md-center">'+
                                '<h1>Nos Planeurs</h1>'+
                              '</div>'+
                              '<label> Recherche : </label>'+
                              '<input type="search" id="gliderSearch" name="q"aria-label="chercher">';
                    var html = '';
                    var i;
                    for(i=0; i<data[0].length; i++){
                      if(i%3==0){
                        html+='<div class="row">';
                      }                        
                        html+= '<div class="col-4">'+
                            '<div class="thumbnail">'+
                              '<img src='+ data[0][i].Image+' alt="Lights" style="width:100%">'+
                                '<div class="caption">'+
                                  '<h3 onclick=loadGlider(this) id="' + data[0][i].Registration + '"> '+data[0][i].Type+ '</h3>'+
                                '</div>'+
                            '</div>'+
                          '</div>';
                      if(i%3==2 ){
                        html+='</div>';
                      }    
                    }
                    $('#search').html(search);
                    $('#liste').html(html);
                    document.getElementById('search').style.display="block";
                    document.getElementById('liste').style.display="block";
                    $('#gliderSearch').keyup(function(){
                      var text = $('#gliderSearch').val();
                      if (text==""){
                            text="1234";
                      }
                      var adr = "<?php echo site_url('ChercherGlider/recherche/')?>";
                      var url2 = adr+text;
                              $.ajax({
                                  type : "get",
                                  url  : url2,
                                  dataType : "JSON",
                                  success: function(data){
                                    document.getElementById('glider').style.display="none";
                                    var html = '';
                    var i;
                    for(i=0; i<data["glider"].length; i++){
                      if(i%3==0){
                        html+='<div class="row">';
                      }                        
                        html+= '<div class="col-4">'+
                            '<div class="thumbnail">'+
                              '<img src='+ data["glider"][i]["Image"]+' alt="Lights" style="width:100%">'+
                                '<div class="caption">'+
                                  '<h3 onclick=loadGlider(this) id="' + data["glider"][i]["Registration"] + '"> '+data["glider"][i]['Type']+ '</h3>'+
                                '</div>'+
                            '</div>'+
                          '</div>';
                      if(i%3==2 ){
                        html+='</div>';
                      }    
                    }
                              $('#liste').html(html);
                                  }
            });
});
                }
 
            });
}

function loadMonitor(){
  $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('monitor')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                  document.getElementById('affichageBase').style.display="none";
                  document.getElementById('glider').style.display="none";
                    var html = '<div class="row justify-content-md-center">'+
                                '<h1>Nos Moniteurs</h1>'+
                              '</div>';
                    var i;
                    for(i=0; i<data.length; i++){
                      if(i%4==0){
                        html+='<div class="row">';
                      }                        
                        html+= '<div class="col-3">'+
                            '<div class="thumbnail">'+
                              '<img src='+ data[i].Image+' alt="Lights" style="width:100%">'+
                                '<div class="caption">'+
                                  '<h3> Nom : '+data[i].LastName+ ' ' + data[i].FirstName + '</h3>'+
                                  '<ul class="list-group">'+
                                    '<li class="list-group-item"> Date d\'obtention du diplome de moniteur : '+data[i].GraduationDate+'</li>'+
                                    '<li class="list-group-item"> Nombre total d\'heure de vol :' +data[i].FlightTotalHNumbre+' h </li>'+
                                  '</ul>'+
                                '</div>'+
                            '</div>'+
                          '</div>';
                      if(i%4==3 ){
                        html+='</div>';
                      }    
                    }
                    $('#liste').html(html);
                }
 
            });
}
function loadInitiation(){
  $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('initiation')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                  document.getElementById('affichageBase').style.display="none";
                  document.getElementById('glider').style.display="none";
                    var html = '<div class="list-group">'+
                                '<h1>Les vols d\'initiations proposés</h1>'+
                              '</div>';
                    var i;
                    for(i=0; i<data.length; i++){                      
                        html+=  '<a href="#" class="list-group-item list-group-item-action active">'+
                              '<div class="d-flex w-100 justify-content-between">'+
                                '<h5 class="mb-1" onclick=loadGlider(this)>'+ data[i].ApplianceUsed+'</h5>'+
                              '</div>'+
                              '<p class="mb-1">'+data[i].Description+'</p>'+
                              '<small> prix :'+ data[i].Price +'</small>'+
                            '</a>';
                    }
                    $('#liste').html(html);
                }
 
            });

}
//inscription
$('#inscriptionForm').submit(function(){
            var FirstName = $('#FirstName').val();
            var LastName = $('#LastName').val();
            var Phone = $('#Phone').val();
            var Birthday= $('#Birthday').val();
            var mail= $('#mail').val();
            var password= $('#password').val();
            var Street= $('#Street').val();
            var PostalCode= $('#PostalCode').val();
            var City= $('#City').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('gestionConnexion/InscriptionAjax')?>",
                dataType : "JSON",
                data : {FirstName:FirstName , LastName:LastName, Phone:Phone , Birthday:Birthday, mail: mail, password: password, Street: Street, PostalCode : PostalCode, City: City},
                success: function(data){
                    alert("vous etes bien inscrits !");
                    
                   
                }
              });
            $('#inscrire').modal('hide');
            return false;
        });

//connexion
$('#connexionForm').submit(function(){
            var identifiant = $('#identifiant').val();
            var password = $('#password').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('connexion')?>",
                dataType : "JSON",
                data : {identifiant:identifiant , password:password},
                success: function(data){
                  $('#inscrire').modal('hide');
                },
                error:function(){
                 
            }
                
            });
            
            return false;
            
        });



 //function show selected product
 function loadGlider(e){
                document.getElementById('liste').style.display="none";
                document.getElementById('glider').style.display="block";
                document.getElementById('search').style.display="none";

                var idGlid= e.getAttribute('id');
                  $.ajax({
                    type : 'get',
                    async : true,
                    url: '<?php echo site_url('glidersAjax/afficher_idGlid')?>',
                    data: 'Registration='+ idGlid,
                    dataType : 'text',
                    success: function(s) {
                      var root = "<?php echo site_url('glidersAjax/glidersInfo/')?>";
                      var newS= s.substr(1,s.length-2);
                      var adr = root.concat(newS);
                    $.ajax({
                        type  : 'get',
                        url   : adr,
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '<div class="media mt-5 mb-5">'+
                                        '<img src='+ data[0].Image+' class="mr-3" alt="...">'+
                                        '<div class="media-body">'+
                                        '<h5 class="mt-5">'+ data[0].Type+' : </h5>'+
                                        '<p class="mt-5">Nombre de place : '+data[0].NbPlace+'</p>'+
                                        '<p class="mt-5">Poids : '+data[0].Weight+'</p>'+
                                        '<p class="mt-5">Envergure : '+data[0].Span+'</p>'+
                                        '<button type="button" class="btn btn-secondary btn-sm mt-5" onclick=loadGliders()> Retour aux planeurs</button>'+
                                        '</div>'+
                                        '</div>';
                            $('#glider').html(html);
                        }

                    });
                  }
                });
          }


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>