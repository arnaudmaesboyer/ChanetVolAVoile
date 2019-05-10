<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>


<div class="container" id="affichageBase">
  <div class="row justify-content-md-center">
    <h1 class="mt-2">Acceuil</h1>
  </div>
    <div class="row justify-content-md-center">
        <div id="carouselExampleCaptions" class="carousel slide col-8" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner mt-2">
            <div class="carousel-item active">
              <img src="assets/image/carrousel1.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Decouvrez La lozere autrement</h5>
                <p>Au cœur du Causse Méjean, découvrez et pratiquez un sport aussi méconnu qu’exaltant, aussi aérien que naturel : le vol à voile.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/image/carrousel2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Vols d'initiation</h5>
                <p>Mû par les seules forces des mouvements de l’air et de la gravité, le planeur vous offrira un point de vue unique sur les grands Causses, les gorges du Tarn et de la Jonte, voire le Viaduc de Millau.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="././assets/image/carrousel3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Vols de perfectionnement</h5>
                <p>En compagnie des rapaces du Parc National des Cévennes, tout proche, au son chuintant de l’air qui glisse sur la verrière, apprivoisez à votre rythme la science du pilotage pour accéder à un monde que l’être humain a de tous temps rêvé d’explorer : le ciel.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
  </div>
  </div>
</div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!--<script type="text/javascript" src="././assets/javascript/ajax.js"></script>-->
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
                    var html = '<div class="row justify-content-md-center">'+
                                '<h1>Nos Planeurs</h1>'+
                              '</div>';
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
                    $('#liste').html(html);
                    document.getElementById('liste').style.display="block";
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
                    alert(data.length);
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
                    alert(data.length);
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
            var Username= $('#Username').val();
            var Password= $('#Password').val();
            var Street= $('#Street').val();
            var PostalCode= $('#PostalCode').val();
            var City= $('#City').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('gestionConnexion/InscriptionAjax')?>",
                dataType : "JSON",
                data : {FirstName:FirstName , LastName:LastName, Phone:Phone , Birthday:Birthday, Username: Username, Password: Password, Street: Street, PostalCode : PostalCode, City: City},
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
                }
                
            });
            $('#inscrire').modal('hide');
            return false;
            
        });



 //function show selected product
 function loadGlider(e){
                document.getElementById('liste').style.display="none";
                document.getElementById('glider').style.display="block";

                var idGlid= e.getAttribute('id');
                  $.ajax({
                    type : 'get',
                    async : true,
                    url: '<?php echo site_url('gliders/afficher_idGlid')?>',
                    data: 'Registration='+ idGlid,
                    dataType : 'text',
                    success: function(s) {
                      var root = "<?php echo site_url('gliders/glidersInfo/')?>";
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
<div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>