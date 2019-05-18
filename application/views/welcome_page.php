<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>


<div class="container" id="affichageBase">
  <div class="row justify-content-md-center">
    <h1 class="mt-2">Accueil</h1>
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
<div class="container" id="search"></div>
<div class="container" id="liste"></div>
<div class="container" id="glider"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!--<script type="text/javascript" src="././assets/javascript/ajax.js"></script>-->

</body>