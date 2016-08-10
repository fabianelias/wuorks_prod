<div class="separator"style="height: 52px;">
    
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <?php
            if($this->session->flashdata('mensajes')){
                echo $this->session->flashdata('mensajes');
            }
            ?>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="profile">
                  <div class="row">
                      <br>
                      <?php
                        $i = $infoUser["data"][0];
                        ?>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"];  ?>" style="height: 230px; width: 100%; border-radius:5px;">
                              <form name="form-change_avatar" id="form-change-avatar" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>profile/upload_image">
                                  <h3><a class="btn btn-sm btn-default btn-block">Cambiar imagen
                                      <input type="file" name="userfile" id="userfile" class="form-control">
                                      <input type="hidden" name="avatar" id="avatar" value="<?php echo $i["avatar"]; ?>">
                                  </a>
                                  </h3> 
                                  <button type="submit" name="change_avatar" id="change_avatar" class="btn btn-sm btn-primary btn-block">
                                    Guardar avatar
                                  </button>
                              </form>
                              <h4 class="title"><?php echo $this->session->userdata('username'); ?></h4>
                          </div>
                          <div class="col-md-9">
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile">Editando tu perfil</a></li>
                                  <li role="presentation" ><a href="<?php echo base_url(); ?>profile">Cancelar</a></li>
                              </ul>
                              <br/>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    Infomación privada
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-12">
                                            <div class="alert alert-info alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Consejos!</strong> 
                                              Para que los demás puedan localizar tus servicios, ingresa tu dirección correctamente y no dejes campos incompletos.
                                            </div>
                                    </div>
                                    <form name="form-info" id="form-info" method="POST" accept-charset="utf8" action="<?php echo base_url(); ?>profile/edit_profile1">
                                        <div class="form-group col-md-12">
                                            <input type="hidden" name="url_base" id="url_base" value="<?php echo base_url(); ?>">
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $i["name"]; ?>">
                                            <div class="text-danger"><?php echo form_error('name');?></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="last_name_p" id="last_name_p" class="form-control" value="<?php echo $i["last_name_p"]; ?>" placeholder="Apellido paterno">
                                            <div class="text-danger"><?php echo form_error('last_name_p');?></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="last_name_m" id="last_name_m" class="form-control" value="<?php echo $i["last_name_m"]; ?>" placeholder="Apellido materno">
                                            <div class="text-danger"><?php echo form_error('last_name_m');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                Es importante el número de tu dirección para que tu ubicación sea correcta. Ejemplo: Calle 1234, Providencia, Chile.</small>
                                            <input type="text" name="address" id="address" class="form-control" aucomplete="off" onmouseenter="myCoor();"  value="<?php echo $i["address"]; ?>" placeholder="Tu dirección ej: calle dos 2965">
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
                                        <div class="form-group col-md-6">
                                            <select name="region" id="region"  class="form-control">
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
                                             <input type="text" name="commune_nom" id="commune_nom"  class="form-control" value="<?php echo $infoUser["comuna_nom"]; ?>" disabled="">
                                            <input type="hidden" name="commune" id="commune"  class="form-control" value="<?php echo $i["commune"]; ?>" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="cell_phone_number" id="cell_phone_number" class="form-control" value="<?php if($i["cell_phone_number"] == 0){echo "";}else{ echo $i["cell_phone_number"];} ?>" placeholder="Telefono">
                                            <div class="text-danger"><?php echo form_error('cell_phone_number');?></div>
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                Tu telefono solo se compartira con la persona que te contrate</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="telephone_number" id="telephone_number" class="form-control" value="<?php if($i["telephone_number"] == 0){echo "";}else{ echo $i["telephone_number"];} ?>" placeholder="Telefono opcional">
                                            <small style="
                                                color: #31708f;
                                            ">Nro. de telefono opcional</small>
                                        </div>
                                        <hr/>
                                        
                                        <div class="form-group col-md-6">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Selecciona genero</option>
                                            <option value="1" <?php if($i["gender"] == 1){echo "selected";}else{echo "";} ?>>Hombre</option>
                                            <option value="2" <?php if($i["gender"] == 2){echo "selected";}else{echo "";} ?>>Mujer</option>
                                        </select>
                                        <div class="text-danger"><?php echo form_error('gender');?></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php
                                            $fecha_nacimiento = date('Y-m-d',strtotime($i["birth_date"]));
                                            ?>
                                            <input type="date" name="birth_date" id="birth_date" class="form-control" value="<?php echo $fecha_nacimiento; ?>">
                                            <small>Fecha nacimiento</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php 
                                            if(!empty($i["rut"])){
                                            ?>
                                            <input type="hidden" name="rut" id="rut" class="form-control" value="<?php echo $i["rut"];?>">
                                            <input type="text"class="form-control" value="<?php echo $i["rut"];?>" disabled="diseabled">
                                            <?php
                                            }else{
                                            ?>
                                            <input type="text" name="rut" id="rut" class="form-control" value="<?php echo $i["rut"];?>" laceholder="R.U.T">
                                            <?php
                                            }
                                            ?>
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                Información privada, no se compartirá con los usuarios.</small>
                                            <div class="text-danger"><?php echo form_error('rut');?></div>
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
     myCoor();
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('address')),
      {types: ['geocode']},
               myCoor()
                );
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


// [END region_geolocation]

    </script>
