<section class="" style="background-color:#fff;">
    <script src="<?php echo base_url("asset/js/regiones.js");?>"></script>
    <div class="container">
        <div class="row" style="height: 450px;margin-top:80px;background-color: #fff;/*background: url('./asset/img/banner-portada.png') center;*/">
            
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-4 col-md-4 text-center hidden-sm hidden-xs">
                    <center>
                        <img src="<?php echo base_url(); ?>asset/img/portfolio/step-3.jpg"
                            style="height:100%;width:100%; margin-top:-35px;"
                            class="img-responsive" >
                    </center>
                </div>
                <div class="col-lg-6 col-md-6 col-lg-offset-2  col-md -offset-2 text-center">
                    <h3 class="sub-title text-center">
                        Es necesario
                        completar o verificar la siguiente información
                    </h3>
                    <h5 class="sub-title text-center" style="font-size:13px;">
                        <i class="fa fa-check-circle"></i>
                        Para contratar o publicar tus servicios es importante que
                        completes estos datos de tu perfil.<br>
                        Estos datos nunca serán expuestos de manera pública.
                        <hr>
                    </h5>
                    <form action="<?php echo base_url("hello/step_4");?>" method="POST" name="form1"id="form1">
                        <?php
                        $i = $infoUser["data"][0];
                        ?>
                        <div class="form-group col-md-12">
                            <small style="
                                color: #31708f;
                            ">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                Es importante el número de tu dirección para que tu ubicación sea correcta. Ejemplo: Calle 1234, Providencia, Chile.</small>
                           
                            <input type="text" name="address" id="address" onchange="myCoor();"class="form-control" value="<?php echo $i["address"]; ?>" placeholder="Tu dirección ej: calle dos 2965">
                            <div class="text-danger"><?php echo form_error('address');?></div>
                            <div class="hidden" id="map" style="height:300px; margin-top:5px;">
                                <center class="" id="loadTop">
                                    <br/>
                                    <br/>
                                    <i class="fa fa-spinner fa-pulse fa-2x" style="color:#3AA3E3;"></i>
                                    <br/>
                                    <br/>
                                </center>
                            </div>
                            <input type="hidden" name="latLng" id="latLng" value="<?php echo "(".$i["lat"].", ".$i["lng"].")"; ?>">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="url_base" id="url_base" value="<?php echo base_url();    ?>">
                            <select name="region" id="region"  class="form-control" required="required">
                                <option>Selecciona tu región</option>
                                <?php
                                foreach ($regiones as $reg){
                                    if($reg["nombre"] == $infoUser["region_nom"]){
                                        $region_selected = "selected";
                                    }else{
                                        $region_selected = "";
                                    }
                                    echo '<option value="'.$reg["id_region"].'" '.$region_selected.'>'.$reg["nombre"].'</option>';
                                }

                                ?>
                            </select>
                            <div class="text-danger"><?php echo form_error('regiob');?></div>
                        </div>
                        <div class="form-group col-md-6" id="comuna">
                            <input type="text" name="commune_nom" id="commune_nom"  class="form-control" value="<?php echo $infoUser["comuna_nom"]; ?>" readonly="readonly">
                            <input type="hidden" name="commune" id="commune"  class="form-control" value="<?php echo $i["commune"]; ?>">
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="cell_phone_number" id="cell_phone_number" class="form-control" value="<?php if($i["cell_phone_number"] == 0){echo "";}else{ echo $i["cell_phone_number"];} ?>" placeholder="Telefono" required="required">
                            <div class="text-danger"><?php echo form_error('cell_phone_number');?></div>
                            <small style="
                                color: #31708f;
                            ">
                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                Tu telefono solo se compartira con la persona que te contrate</small>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-block btn-sm btn-primary">
                                Continuar
                                <i class="fa fa-arrow-right fa-lg"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="width:100%;color:#999;">
                <i class="fa fa-circle-o"></i> &nbsp;
                <i class="fa fa-circle-o"></i> &nbsp;
                <i class="fa fa-circle"></i> &nbsp;
                <i class="fa fa-circle-o"></i> &nbsp;
                <br/>
            </div>
        </div>
    </div>
    
    <div class="hidden text-center bg-primary" style="width: 100%; height: 70px;position:absolute; bottom: 0px;">
        <center>
            
        </center>
    </div>
</section>

<style>
    .form-search{
        min-height: 50px;
        border: 1px solid #C5C5C5;
        border-radius: .25rem;
        -webkit-appearance: none;
        outline: 0;
        color: #555459;
        margin-right: 10px;
    }
    .title{
        line-height: 1.4;
        font-size: 28px;
        font-weight: 300;
        color: #4b5966;
    }
    .title1{
        line-height: 22px;
        font-weight: 300;
        color: #b6b6b6;
    }
    .titlea{
        line-height: 22px;
        font-weight: 300;
        color: #fbfbfb;
        text-decoration: none;
    }
    .titlea:hover{
        line-height: 22px;
        font-weight: 300;
        color: #b6b6b6;
        text-decoration: none;
    }
    .sub-title{
        color:#4b5966;
        line-height: 1.4;
        font-size: 20px;
        font-weight: 300;
    }
    .icon-home{
        color:#00ACE5;
    }
</style>
<script type="text/javascript">
    document.body.style.backgroundColor="#ffffff";
    function valida_form(){
        address = $("#address").val();
        region  = $("#region").val();
        comuna  = $("#comuna").val();
        telefono = $("#cell_phone_number").val();
        
        
    }
</script>
<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};
var divSearchMap = document.getElementById("map");

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('address')),
      {types: ['geocode']});

 
}

function myCoor(){
    var add = $("#address").val();
    
    $("#map").removeClass("hidden");
    var objWuorkers = {

        address : add

    };

    var gCoder = new google.maps.Geocoder();
                   gCoder.geocode(objWuorkers, fn_exito);

    function fn_exito(data){

        var coor = data[0].geometry.location;
        // alert(coor);
       
        var myOptions = {
          zoom: 16,
          center: coor,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
          zoomControl: true,
            zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
            },
          scrollwheel: false
        };

        // Inicializador del mapa en el div asignado.
        map = new google.maps.Map(document.getElementById("map"),myOptions); 

        // Opciones de configuración de los marcadores.
        var objMarker = {
            position: coor,
            map: map,
            title: "Mi posición actual"
        };

         var population = 2;
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
    $("#latLng").val(coor);
    //Declaración del marker principal.
    
    //var marker = new google.maps.Marker(circle);
    }
}


    </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkoT7wvKlxwO7aCjUfeBidxUFV8GE_yas&signed_in=false&libraries=places&callback=initAutocomplete"
        async defer></script>
