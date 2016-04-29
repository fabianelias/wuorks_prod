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
      zoom: 13,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
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
        /***********************************************************************
         *               Sección profesionales
        **********************************************************************/
           if(result.profession){
               $.each(result.profession, function(index, result){
                  
                   var objWuorkers = {
                       
                        address : result.address +", "+ result.commune +", "+ result.region 
                                
                   };
                   
                   var gCoder = new google.maps.Geocoder();
                       gCoder.geocode(objWuorkers, fn_exito);
                   
                   function fn_exito(data){
                       
                        var coor = data[0].geometry.location;

                        var configs = {
                            map : map,
                            position: coor,
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
                            //ginfoWuork.open(map,gMarkerWs);
                        });
                        
                        
                        var orig = lat+","+lon;//"Los Presidentes 6922";
                        var dest = result.address +", "+ result.commune +", "+ result.region ;
                        
                        //var  kmsD = kms(orig,dest);
                        var km ="";
                        var res = "";

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
                                    '<li class="topHover" style="border-bottom:1px solid #eee;">'+
                                        '<div class="media" style="margin-left:5px;padding:5px;">'+
                                        ' <div class="media-left">'+
                                          '<a href="'+url_base+'wuokers/u/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                            '<img class="media-object" src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="..." style="max-height: 50px; max-width:50px;">'+
                                         ' </a>'+
                                        ' </div>'+
                                       ' <div class="media-body">'+
                                          '<a href="'+url_base+'wuokers/u/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                                '<h4 class="media-heading">'+result.username+'<small>/ Profesional</small></h4>'+
                                          '</a>'+
                                         ' '+result.profession+'.<br>'+km+''+
                                        '</div>'+
                                        ' <div class="media-left text-center">'+
                                          '<br/>&nbsp;<b>'+result.rating+'</b> '+
                                        ' </div>'+
                                       // '<hr/>'+
                                      '</div>'+
                                    '</li>';
                                    $("#loadTop").addClass("hidden");
                                    $("#topWuokers").append(top);

                          });
                        
                    }
                
               });//fin each
           }else{
               //$("#alert-search").removeClass("hidden");
           }
           
        /***********************************************************************
         *                          Sección empresas
         **********************************************************************/
        //console.log(result.company);
        if(result.company){
               $.each(result.company, function(index, result){
                  
                   var objWuorkers = {
                       
                        address : result.address +", "+ result.commune +", "+ result.region 
                                
                   };
                   
                   var gCoder = new google.maps.Geocoder();
                       gCoder.geocode(objWuorkers, fn_exito);
                   
                   function fn_exito(data){
                       
                        var coor = data[0].geometry.location;

                        var configs = {
                            map : map,
                            position: coor,
                            title : result.username
                        };

                        var gMarkerWs = new google.maps.Marker(configs);
                         gMarkerWs.setIcon(url_base+"asset/img/marker2.png");

                        var objHtml = {
                            content:'<div class="thumbnail" style="padding: 0px;">'+
                                    '<img src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="..." style="margin: 0 auto;">'+
                                    '<div class="caption">'+
                                        '<h3 id="nameUser" style="font-weight:300;">'+result.username+'</h3>'+
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
                            //ginfoWuork.open(map,gMarkerWs);
                        });
                        
                        
                        /********************************************************
                         * calculo de cercania
                         *******************************************************/
                        var orig = lat+","+lon;//"Los Presidentes 6922";
                        var dest = result.address +", "+ result.commune +", "+ result.region ;
                        
                        //var  kmsD = kms(orig,dest);
                        var km ="";
                        var res = "";

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
                                    '<li class="topHover" style="border-bottom:1px solid #eee;">'+
                                        '<div class="media" style="margin-left:5px;padding:5px;">'+
                                        ' <div class="media-left">'+
                                          '<a href="'+url_base+'wuokers/u/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                            '<img class="media-object" src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="..." style="max-height: 50px; max-width:50px;">'+
                                         ' </a>'+
                                        ' </div>'+
                                       ' <div class="media-body">'+
                                          '<a href="'+url_base+'wuokers/u/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'">'+
                                                '<h4 class="media-heading">'+result.username+'<small> / Empresa</small></h4>'+
                                          '</a>'+
                                         ' '+result.profession+'.<br>'+km+''+
                                        '</div>'+
                                        ' <div class="media-left text-center">'+
                                          '<br/>&nbsp;<b>'+result.rating+'</b> '+
                                        ' </div>'+
                                        //'<hr/>'+
                                      '</div>'+
                                    '</li>';
                                    $("#loadTop").addClass("hidden");
                                    $("#topWuokers").append(top);

                          });
                    }
                
               });//fin each
           }else{
           }
           
           if(result.company == false && result.profession == false){
               $("#alert-search").removeClass("hidden");
               $("#loadTop").addClass("hidden");
               $("#topWuokers").html("<center><br/>Sin resultados<br/></center>");
           }
       }
    });
    
   
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
    
    $("#userInfo").html('<div class="thumbnail" style="padding: 0px; border:0px; max-width:300px;">'+
                            '<img src="'+url_base+'asset/img/user_avatar/'+result.avatar+'" alt="..." style="margin: 0 auto;">'+
                            '<div class="caption text-center">'+
                                '<h3 id="nameUser" style="font-weight:300;">'+result.username+'</h3>'+
                             '<p>'+
                             '<form name="form-user" id="form-user" action="'+url_base+'wuokers/'+func+'/'+result.username+'/'+result.profession+'/'+result.key_profession+'?wk='+result.wuorks_key+'" method="POST" target="_blank">'+
                                '<input type="hidden" name="wuorks_key" id="wuorks_key" value="'+result.wuorks_key+'">'+
                                '<input type="hidden" name="key_profession" id="key_profession" value="'+result.key_profession+'">'+
                                '<button type="submit" name="verPerfil" class="btn btn-primary btn-block">Ver perfil</button>'+
                             '</form>'+
                                  '<br/>'+
                                  '<a href="#" class="btn btn-default btn-block" data-dismiss="modal"  role="button">Cerrar</a>'+
                              '</p>'+
                           ' </div>'+
                        '</div>');
             
    $("#perfilUser").modal("show");
    
}
function kms(orig, dest) {
     
     var km ="s";
     var res = "";
     
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
               d.reject(status);
            } else {
                kms = "("+response.rows[0].elements[0].distance.text+")".toString();
            }
            km += kms;
          
          res = km;
         
       });
       
      return res;  
      
}
/*******************************************************************************
 * Nota*: Documento generado por wuorks.com, no se permite copia de un fragmento
 * del codigo o del todo.
 * v1.0.
 ******************************************************************************/




