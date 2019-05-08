<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

<div class="container">
  <div class="row justify-content-md-center">
    <h1>Nos Planeurs</h1>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg">
          <img src="assets/image/test.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Lorem ipsum...</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/nature.jpg">
          <img src="test.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p>Lorem ipsum...</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/fjords.jpg">
          <img src="test.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p>Lorem ipsum...</p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="/w3images/lights.jpg">
            <img src="test.jpg" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Lorem ipsum...</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="/w3images/nature.jpg">
            <img src="test.jpg" alt="Nature" style="width:100%">
            <div class="caption">
              <p>Lorem ipsum...</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="/w3images/fjords.jpg">
            <img src="test.jpg" alt="Fjords" style="width:100%">
            <div class="caption">
              <p>Lorem ipsum...</p>
            </div>
          </a>
        </div>
      </div>
    </div>
</div>
<div id="liste"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
function loadGliders(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('gliders/affichageAjax')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<p>'+data[i].Registration+'</p>';
                    }
                    $('#liste').html(html);
                }
 
            });


}
</script>

</body>
</html>