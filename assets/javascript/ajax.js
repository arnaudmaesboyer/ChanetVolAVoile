
function loadGliders(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('gliders/affichageAjax')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                  document.getElementById('affichageBase').style.visibility="hidden";
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<p>'+data[i].Registration+'</p>';
                    }
                    $('#liste').html(html);
                }
 
            });
}