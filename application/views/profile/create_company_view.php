<div class="separator"style="height: 52px;">   
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="profile">
                  <div class="row">
                      <br>
                      <?php
                        $i = $infoUser["data"][0];
                        $c = $company[0];
                        ?>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"]; ?>" style="height: 230px; width: 100%; border-radius:5px;">
                              <h3><a class="btn btn-sm btn-default btn-block">Cambiar imagen</a></h3>                      
                              <h4 class="title"><?php echo $i["username"]; ?></h4>
                          </div>
                          <div class="col-md-9">
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile">Creando tu empresa</a></li>
                                  <li role="presentation" ><a href="<?php echo base_url(); ?>profile">Cancelar</a></li>
                              </ul>
                              <br/>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    Infomación basica
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-12">
                                            <div class="alert alert-info alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Consejos!</strong> 
                                              Para que los demás puedan localizar tus servicios, ingresa tu dirección correctamente y no dejes campos incompletos.<br/>
                                              Evita colocar información de contacto en tu descripción, tus futuros clientes te contactaran mediante wuorks.com es mucho más seguro.
                                            </div>
                                    </div>
                                    <form name="form-create-company" id="company-info" method="POST" accept-charset="utf8" action="<?php echo base_url(); ?>profile/createCompany1">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="company_category" id="company_category" class="form-control" value="<?php echo set_value('company_category'); ?>" placeholder="Rubro Ej: Pasteleria, Abogados, Cocineros...">
                                            <div class="text-danger"><?php echo form_error('company_category');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo set_value('company_name'); ?>" placeholder="Nombre de tu empresa">
                                            <div class="text-danger"><?php echo form_error('company_name');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="company_description" id="company_description" class="form-control" placeholder="Descripción detallada de tu empresa"><?php echo set_value('company_description'); ?></textarea>
                                            <div class="text-danger"><?php echo form_error('company_description');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="address" id="address"aucomplete="off" onmouseenter="myCoor();"class="form-control" value="<?php echo $c["address"]; ?>" placeholder="Tu dirección ej: calle dos 2965">
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
                                            <input type="hidden" name="latLng" id="latLng" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select name="region" id="region"  class="form-control">
                                                <option>Selecciona tu región</option>
                                                <?php
                                                foreach ($regiones as $reg){
                                                    if($reg["nombre"] == $infoUser["region_nom"]){
                                                        $region_selected = "";
                                                    }else{
                                                        $region_selected = "";
                                                    }
                                                    echo '<option value="'.$reg["id_region"].'" '.$region_selected.'>'.$reg["nombre"].'</option>';
                                                }
                                                
                                                ?>
                                            </select>
                                            <div class="text-danger"><?php echo form_error('regiob');?></div>
                                            <input type="hidden" id="url_base" name="url_base" value="<?php echo base_url(); ?>">
                                        </div>
                                        <div class="form-group col-md-6" id="comuna">
                                            <input type="text" name="commune" id="commune"  class="form-control" value="" disabled placeholder="Comuna">
                                            <div class="text-danger"><?php echo form_error('commune');?></div>
                                        </div>
                                        
                                        <hr/>
                                        
                                        <div class="form-group col-md-6">
                                        <!--
                                        <select name="company_category" id="company_category" class="form-control">
                                            <option value="">Selecciona categoria</option>
                                            <option value="Jugueteria">Jugueteria</option>
                                        </select>
                                        -->
                                        <div class="text-danger"><?php echo form_error('company_category');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <hr/>
                                            <input type="submit" name="save" id="save" class="btn btn-block btn-primary" value="Guardar cambios">
                                        </div>
                                    </form>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    
</div>

<style type="text/css">

    .title{
        font-weight: 300;
        color: #47525d;
    }
    
    
</style>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkoT7wvKlxwO7aCjUfeBidxUFV8GE_yas&signed_in=false&libraries=places&callback=initAutocomplete"
        async defer></script>
<script type="text/javascript">
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.
$(document).ready(function(){
   //
    initAutocomplete();
     
});
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
  myCoor();
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('address')),
      {types: ['geocode']},
      myCoor()
      );
}

function myCoor(){
    var add = $("#address").val();
    
    if(add ==""){
        add = "tobalaba";//
    }
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

