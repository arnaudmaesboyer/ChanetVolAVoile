<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>


<div class="container" id="affichageBase">
  <div class="row justify-content-md-center">
    <h1>Acceuil</h1>
  </div>
    <div class="row justify-content-md-center">
        <div id="carouselExampleCaptions" class="carousel slide col-8" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/image/test.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="././assets/image/test.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="././assets/image/test.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
<div class="container" id="liste">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!--<script type="text/javascript" src="././assets/javascript/ajax.js"></script>-->
<script>
function loadGliders(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('gliders/affichageAjax')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                  document.getElementById('affichageBase').style.display="none";
                    var html = '<div class="row justify-content-md-center">'+
                                '<h1>Nos Planeurs</h1>'+
                              '</div>';
                    var i;
                    alert(data.length);
                    for(i=0; i<data.length; i++){
                      if(i%3==0){
                        html+='<div class="row">';
                      }                        
                        html+= '<div class="col-4">'+
                            '<div class="thumbnail">'+
                              '<img src='+ data[i].Image+' alt="Lights" style="width:100%">'+
                                '<div class="caption">'+
                                  '<h3> '+data[i].Type+ '</h3>'+
                                  '<ul class="list-group">'+ //faire un popover bootstrap pour les infos
                                    '<li class="list-group-item">'+data[i].NbPlace+'</li>'+
                                    '<li class="list-group-item">'+data[i].Weight+'</li>'+
                                    '<li class="list-group-item">'+data[i].Span+'</li>'+
                                  '</ul>'+
                                '</div>'+
                            '</div>'+
                          '</div>';
                      if(i%3==2 ){
                        html+='</div>';
                      }    
                    }
                    html+='</div>';
                    $('#liste').html(html);
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
                                  '<h3> '+data[i].LastName+ ' ' + data[i].FirstName + '</h3>'+
                                  '<ul class="list-group">'+
                                    '<li class="list-group-item">'+data[i].GraduationDate+'</li>'+
                                    '<li class="list-group-item">'+data[i].FlightTotalHNumbre+' h </li>'+
                                  '</ul>'+
                                '</div>'+
                            '</div>'+
                          '</div>';
                      if(i%4==3 ){
                        html+='</div>';
                      }    
                    }
                    html+='</div>';
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
                    html+='</div>';
                    $('#liste').html(html);
                }
 
            });

}
//Save product
$('#btn_save').on('click',function(){
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
                  $('#exampleModal').modal('hide');
                }
            });
            return false;
        });

 //function show selected product
 function loadGlider(e){
                document.getElementById('affichageBase').style.display="none";

                var idGlid= e.getAttribute('Registration');

                  $.ajax({
                    type : 'GET',
                    async : true,
                    url: '<?php echo site_url('gliders/afficher_idGlid')?>',
                    data: 'Registration='+ idGlid,
                    dataType : 'text',
                    success: function(s) {

                      var root = "<?php echo site_url('product/afficher_idGlid/')?>";//manque controller
                      var newS= s.substr(1,s.length-2);
                      var adr = root.concat(newS);
                    $.ajax({
                        type  : 'GET',
                        url   : adr,
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            html +='<div class="row no-gutters">'+
                                      '<div class="col-6 col-md-4">'+
                                        '<img src="assets/image/alliance.jpg" class="rounded float-left" alt="Alliance">'+
                                      '</div>'+
                                      '<div class="col-12 col-sm-6 col-md-8">'+
                                        '<p class="font-weight-bold">Pain au chocolat</p>'+
                                        '<p class="font-weight-normal">Non ergo erunt homines deliciis diffluentes audiendi, si quando de amicitia, quam nec usu </p>'+
                                      '</div>'+
                                      '</div>';

                            $('#liste').html(html);
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