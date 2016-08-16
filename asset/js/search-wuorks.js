  /*******************************************************************************
 * 
 *        Funciones google Maps
 *        Copyright © 2016 wuorks.com Todos los Derechos Reservados.
 *        v1.0
 *        
 ******************************************************************************/

navigator.geolocation.getCurrentPosition(initialize, fn_error);

var divSearchMap = document.getElementById("map-search");
var map;
var lon = "";
var lat = "";
var miI = ""; 
var kmglobal="";
function fn_error(){
    divSearchMap = $("#map-search").html("<center>Lo sentimos, ha ocurrido un error intentalo nuevamente.<br/>Si el problema persiste contactanos a contacto@beta.wuorks.com</center>");
}

/*******************************************************************************
 * @initialize(), función pricipal para generar resultados.
 ******************************************************************************/

 function initialize(result) {
   
    lon = result.coords.longitude;  // Latitud Actual.
    lat = result.coords.latitude;   // Longitud Actual.
    
    var latlng = new google.maps.LatLng(lat,lon);
    
    // Opciones de configuración de google maps.
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true,
      zoomControl: true,
        zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_TOP
        },
        scrollwheel: true,
        styles:[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2895f1"},
                    {"lightness":17}]},
            {"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},
                    {"lightness":20}]},
            {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#c4c4c4"},
                    {"lightness":17}]},
            {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},
                    {"lightness":29},
                    {"weight":0.2}]},
            {"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},
                    {"lightness":18}]},
            {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},
                    {"lightness":16}]},
            {"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},
                    {"lightness":21}]},
            {"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},
                    {"lightness":21}]},
            {"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},
                    {"lightness":16}]},
            {"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},
                    {"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},
            {"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},
                    {"lightness":19}]},
            {"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},
                    {"lightness":20}]},
            {"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},
                    {"lightness":17},{"weight":1.2}]}]
        
    };
    
    // Inicializador del mapa en el div asignado.
    map = new google.maps.Map(document.getElementById("map-search"),myOptions); 
     
    // Opciones de configuración de los marcadores.
    var objMarker = {
        position: latlng,
        map: map,
        label: "Tú"
        //title: "Mi posición actual"        
    };
    
    //Declaración del marker principal.
    
    var marker = new google.maps.Marker(objMarker);
    
    markers();
    
}

/*******************************************************************************
 * @markers(), función que crea los puntos de referencia de usuarios de 
 * resultados de la busqueda.
 ******************************************************************************/
function markers(){
   
    var cant = 0;
    var url_base = $("#url_base").val();
    var wuorks   = $("#wuorks").val();
    var reg      = $("#region").val();
    var top= "";
    $.ajax({
        
       url: url_base+"search/result",
       type: "post",
       data: {
           region : reg,
           wuork_area :wuorks
       },
       dataType : "json",
       success: function(results){
       /************************************************************************
        *                               Perfiles
        ***********************************************************************/
       if(results.res != ""){
           var x = 0;
           var length = results.res.length;
          // for (i = 0; i < length; i++) {
                
               //result = results.res[i];
           $.each(results.res, function(index, result){
               
                if(result.lat == null && result.lng == null){
                    //console.log("Error");
                }else{
                    //Var latlng 
                    var latlng = new google.maps.LatLng(result.lat,result.lng);
                    
                    var configs = {
                        map : map,
                        position:latlng,
                        title : result.username
                    };
                    var gMarkerWs = new google.maps.Marker(configs);
                        gMarkerWs.setIcon(url_base+"asset/img/markerWuokers.png");
                    
                    google.maps.event.addListener(gMarkerWs, "click", function(){
                      perfilUsuario(result);
                      //window.location.href = '#cont'+result.wuorks_key;
                    });
                    google.maps.event.addListener(gMarkerWs, "mouseover", function(){
                        window.location.href = '#cont'+result.wuorks_key;
                      //gMarkerWs.setIcon(url_base+"asset/img/icon-60-60px.png");
                        $('#cont'+result.wuorks_key).addClass("hoverLi");
                    });
                    
                    google.maps.event.addListener(gMarkerWs, 'mouseout', function() {
                       // gMarkerWs.setIcon(url_base+"asset/img/markerWuokers.png");
                        $('#cont'+result.wuorks_key).removeClass("hoverLi");
                    });
                    
                    var orig = lat+","+lon;
                    var dest = result.lat+","+result.lng;
                    var km ="";
                    var res="";
                    var type = "";
                    
                    if(result.type == 1){
                        type = "Profesional";
                        res  = "u";
                    }else{
                        type = "Empresa";
                        res  = "c";
                    }
                    var km ="";
                   
                    
                    //var service = new google.maps.DistanceMatrixService();
                    
                    var top =
                              '<li class="topHover" id="cont'+result.wuorks_key+'"style="border-bottom:1px solid #eee;">'+
                                  '<div class="media" style="margin-left:5px;padding:5px;padding-top:15px;margin-bottom: -10px;">'+
                                  ' <div class="media-left">'+
                                    '<a href="'+url_base+'wuokers/'+res+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                      '<img class="media-object img-thumbnail thumbnail" src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="'+result.username+'" style="height:100px; max-width:100px;">'+
                                   ' </a>'+
                                  ' </div>'+
                                 ' <div class="media-body" style="font-weight: 300;">'+
                                    '<a target="_blank" href="'+url_base+'wuokers/'+res+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                          '<h4 class="media-heading username">'+result.username+'<small>/ '+type+'</small></h4>'+
                                    '</a>'+
                                   ''+result.profession+'.<br>'+result.job_description.slice(0,55)+'...'+
                                  '</div>'+
                                  ' <div class="media-left text-center text-info">'+
                                    '<br/>&nbsp;<b class="username">'+result.rating+'</b> '+
                                    '<br/>&nbsp;<i class="fa fa-star" style="color: #FFA000;" aria-hidden="true"></i> '+
                                    '<br/>&nbsp;<small>Calificación</small>'+
                                  ' </div>'+
                                '</div>'+
                              '</li>';

                          $("#loadTop").addClass("hidden");
                          $("#topWuokers").append(top);
                    /*service.getDistanceMatrix(
                      {
                        origins: [orig],
                        destinations: [dest],
                        travelMode: google.maps.TravelMode.DRIVING,
                        unitSystem: google.maps.UnitSystem.METRIC,
                        avoidHighways: false,
                        avoidTolls: false
                      }, function(response, status){
                           if (status != google.maps.DistanceMatrixStatus.OK) {
                               kms = "";
                           } else {
                               kms = "<small class=''><i class='fa fa-map-marker'></i> a "+response.rows[0].elements[0].distance.text+" de ti.</small>".toString();
                           }
                           km += kms;
                        
                      });*/
                      x++;
               // } //for
           }
           });//each
           $("#ttUser").html(x+" wuokers cerca de ti <i class='fa fa-map-marker text-success'></i>"); 
        }//if result
        else{
            $("#alert-search").removeClass("hidden");
            $("#sinResultados").removeClass("hidden");
            $("#loadTop").addClass("hidden");
            $("#tops").removeClass("open");
        }
       }// fin success;
       
    });// fin $.ajax();
    
}
function kmsCallback(response, status) {
    if (status != google.maps.DistanceMatrixStatus.OK) {
           kms = "";
       } else {
           kms = "<small class=''><i class='fa fa-map-marker'></i> a "+response.rows[0].elements[0].distance.text+" de ti.</small>".toString();
       }
       kmglobal = kms;
       console.log(kmglobal+" - "+kms);
 }
/*******************************************************************************
 * @perfilUsuario(), función para generar los modal de cada perfil.
 ******************************************************************************/

function perfilUsuario(result){
   
    var url_base = $("#url_base").val();
    var func     = "";
    var name     = "";
    if(result.type == 1){
        func = "u";
    }else{
        func = "c";
    }
    /*
    var modal = '<div class="modal fade bs-example-modal-sm" id="perfilUser" style="margin-top: 30px;" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">'+
                    '<div class="modal-dialog modal-sm">'+
                      '<div class="modal-content" style="border-radius: 3px; border-top: 7px solid #3AA3E3;" id="userInfo">'+   
                      '<div class="thumbnail" style="padding: 0px; border:0px; max-width:300px;">'+
                                        '<img src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="Wuokers" style="margin: 0 auto;">'+
                                        '<div class="caption text-center">'+
                                            '<h3 id="nameUser" style="font-weight:300;">'+result.username+'<br/><small style="font-weight:300;">Profesión - '+result.profession+'<hr/></small></h3>'+
                                         '<p>'+
                                         '<form name="form-user" id="form-user" action="'+url_base+'wuokers/'+func+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'" method="POST" target="_blank">'+
                                            '<input type="hidden" name="wuorks_key" id="wuorks_key" value="'+result.wuorks_key+'">'+
                                            '<input type="hidden" name="key_profession" id="key_profession" value="'+result.key_profession+'">'+
                                            '<button type="submit" name="verPerfil" style="width:47%;float:right;" class="btn btn-primary btn-block">Ver perfil</button>'+
                                         '</form>'+
                                              '<br/>'+
                                              '<a href="#" class="btn btn-default btn-block" data-dismiss="modal" style="width:47%;float:left;margin-top:-20px;" role="button">Cerrar</a>'+
                                          '</p>'+
                                       ' </div>'+
                                    '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>';
          $("#modal-user").append(modal);*/
    
    $("#userInfo").html('<div class="thumbnail" style="padding: 0px; border:0px; max-width:300px;">'+
                            '<img src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="Wuokers" style="margin: 0 auto;">'+
                            '<div class="caption text-center">'+
                                '<h3 id="nameUser" style="font-weight:300;">'+result.username+'<br/><small style="font-weight:300;">Profesión - '+result.profession+'<hr/></small></h3>'+
                             '<p>'+
                             '<form name="form-user" id="form-user" action="'+url_base+'wuokers/'+func+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'" method="POST" target="_blank">'+
                                '<input type="hidden" name="wuorks_key" id="wuorks_key" value="'+result.wuorks_key+'">'+
                                '<input type="hidden" name="key_profession" id="key_profession" value="'+result.key_profession+'">'+
                                '<button type="submit" name="verPerfil" style="width:47%;float:right;" class="btn btn-primary btn-block">Ver perfil</button>'+
                             '</form>'+
                                  '<br/>'+
                                  '<a href="#" class="btn btn-default btn-block" data-dismiss="modal" style="width:47%;float:left;margin-top:-20px;" role="button">Cerrar</a>'+
                              '</p>'+
                           ' </div>'+
                        '</div>');
    
    $("#perfilUser").modal("show");
    
}

/*******************************************************************************
 * Nota*: Documento generado por wuorks.com, no se permite copia de un fragmento
 * del codigo o del todo.
 * v1.0.
 ******************************************************************************/
