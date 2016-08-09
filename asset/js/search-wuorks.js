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
        position: google.maps.ControlPosition.RIGHT_TOP
        }
    };
    
    // Inicializador del mapa en el div asignado.
    map = new google.maps.Map(document.getElementById("map-search"),myOptions); 
     
    // Opciones de configuración de los marcadores.
    var objMarker = {
        position: latlng,
        map: map,
        title: "Mi posición actual"
    };
    
    //Declaración del marker principal.
    
    var marker = new google.maps.Marker(objMarker);
    
    createMarkers();
   
    
}


/*******************************************************************************
 * @create_marker(), función que crea los puntos de referencia de usuarios de 
 * resultados de la busqueda.
 ******************************************************************************/

function createMarkers(){
    
    //Variables goblales de uso.
    
    var cant = 0;
    var address = "";
    var mLatLng = [];
    var htmlInfo = [];
    var marker   = [];
    var modal    = new google.maps.InfoWindow();
    
    
    var url_base = $("#url_base").val(); //Url base.
    
    var wuorks = $("#wuorks").val();
    var reg    = $("#region").val();
    
    
    //window.history.pushState(null, "Busqueda", url_base+"search?w="+wuorks+"&area="+reg);
    
    // Consulta asincrona para resultados.
    $.ajax({
        
       url: url_base+"search/result",
       type: "post",
       data: {
           region : reg,
           wuork_area :wuorks
       },
       dataType : "json",
       success: function(result){
       /************************************************************************
        *                               Perfiles
        ***********************************************************************/
       if(result.res != ""){
           var x = 0;
           $.each(result.res, function(index, result){
               
               var objWuorkers = {
                       
                        address : result.address //+" "+ result.commune //+" "+ result.region 
                                
                   };
                   
                   var gCoder = new google.maps.Geocoder();
                       gCoder.geocode(objWuorkers, fn_exito);
                   
                   function fn_exito(data){
                       
                        var coor = data[0].geometry.location;
                        
                        var configs = {
                            map : map,
                            position:coor,
                            title : result.username
                        };

                        var gMarkerWs = new google.maps.Marker(configs);
                         gMarkerWs.setIcon(url_base+"asset/img/marker2.png");

                        var objHtml = {
                            content:'<div class="thumbnail" style="padding: 0px;">'+
                                    '<img src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="..." style="margin: 0 auto;">'+
                                    '<div class="caption">'+
                                        '<h3 id="nameUser">'+result.username+'</h3>'+
                                     '<p>'+
                                          '<a href="#" class="btn btn-default btn-block" role="button">ver perfil</a>'+
                                          '<a href="#" class="btn btn-primary btn-block" data-dismiss="modal"  role="button">Cerrar</a>'+
                                      '</p>'+
                                   ' </div>'+
                                '</div>'
                        };
                        
                        var ginfoWuork = new google.maps.InfoWindow(objHtml);

                        google.maps.event.addListener(gMarkerWs, "click", function(){
                            perfilUsuario(result);
                           // $("#cont"+result.wuorks_key).addClass("page-scroll");
                            window.location.href = '#cont'+result.wuorks_key;
                            
                        });
                        
                        
                        var orig = lat+","+lon;//"Los Presidentes 6922";
                        var dest = result.address+", "+ result.commune// +", "+ result.region ;
                        
                        
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
                        
                        
                        var service = new google.maps.DistanceMatrixService();
                        service.getDistanceMatrix(
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

                             var top =
                                    '<li class="topHover" id="cont'+result.wuorks_key+'"style="border-bottom:1px solid #eee;">'+
                                        '<div class="media" style="margin-left:5px;padding:5px;padding-top:15px;margin-bottom: -10px;">'+
                                        ' <div class="media-left">'+
                                          '<a href="'+url_base+'wuokers/'+res+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                            '<img class="media-object img-thumbnail thumbnail" src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="'+result.username+'" style="height:100px; max-width:100px;">'+
                                         ' </a>'+
                                        ' </div>'+
                                       ' <div class="media-body">'+
                                          '<a href="'+url_base+'wuokers/'+res+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                                '<h4 class="media-heading username">'+result.username+'<small>/ '+type+'</small></h4>'+
                                          '</a>'+
                                         ''+result.profession+'.<br>'+km+''+
                                        '</div>'+
                                        ' <div class="media-left text-center text-info">'+
                                          '<br/>&nbsp;<b class="username">'+result.rating+'</b> '+
                                          '<br/>&nbsp;<i class="fa fa-star-o" aria-hidden="true"></i> '+
                                          '<br/>&nbsp;<small>Calificación</small>'+
                                        ' </div>'+
                                       // '<hr/>'+
                                      '</div>'+
                                    '</li>';
                                    $("#loadTop").addClass("hidden");
                                    $("#topWuokers").append(top);

                          });
                        
                    }
                    x++;
           });
           
           $("#ttUser").html(x+" wuokers cerca de ti <i class='fa fa-map-marker'></i>");
       }else{
            $("#alert-search").removeClass("hidden");
            $("#sinResultados").removeClass("hidden");
            $("#loadTop").addClass("hidden");
            $("#tops").removeClass("open");
        }
        
       }// fin success;
       
    });// fin $.ajax();
    
   
}// fin create_markers();

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
