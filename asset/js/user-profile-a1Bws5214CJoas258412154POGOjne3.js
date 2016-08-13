/* 
 *
 */
function getMapUser(lat,lng){
    
        var coor = new google.maps.LatLng(lat,lng);
        var myOptions = {
          zoom: 15,
          center: coor,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
          zoomControl: true,
            zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
            },
          scrollwheel: false/*,
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
                    {"lightness":17},{"weight":1.2}]}]*/
        };

        // Inicializador del mapa en el div asignado.
        map = new google.maps.Map(document.getElementById("map"),myOptions); 

        // Opciones de configuración de los marcadores.
        var objMarker = {
            position: coor,
            map: map,
            title: "Radio aproximado"
        };
        
         var population = 10;
         var cityCircle = new google.maps.Circle({
          strokeColor: '#2895F1',//'#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#2895F1',//'#FF0000',
          fillOpacity: 0.35,
          map: map,
          center: coor,
          radius: Math.sqrt(population) * 100
        });
   
} 
