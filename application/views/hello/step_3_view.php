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
                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $i["address"]; ?>" placeholder="Tu dirección ej: calle dos 2965" required="required">
                            <div class="text-danger"><?php echo form_error('address');?></div>
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

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('address')),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkoT7wvKlxwO7aCjUfeBidxUFV8GE_yas&signed_in=false&libraries=places&callback=initAutocomplete"
        async defer></script>