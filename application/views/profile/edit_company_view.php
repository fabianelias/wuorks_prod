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
                              <!--<h3><a class="btn btn-sm btn-default btn-block">Cambiar imagen</a></h3> -->                      
                              <h4 class="title"><?php echo $i["username"]; ?></h4>
                          </div>
                          <div class="col-md-9">
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile">Editando tu empresa</a></li>
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
                                              <br/>
                                              Evita colocar información de contacto en la descripción, tus clientes te contactaran mediante wuorks.com es mucho más seguro.
                                            </div>
                                    </div>
                                    <form name="form-info" id="form-info" method="POST" accept-charset="utf8" action="<?php echo base_url(); ?>profile/editCompany1">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="company_category_nom" id="company_category_nom" class="disabled-result form-control" value="<?php echo $c["company_category"]; ?>" disabled="">
                                             <input type="hidden" name="company_category" id="company_category" class="disabled-result form-control" value="<?php echo $c["company_category"]; ?>" >
                                            <div class="text-danger"><?php echo form_error('company_category');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $c["company_name"]; ?>">
                                            <div class="text-danger"><?php echo form_error('company_name');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="company_description" id="company_description" class="form-control"><?php echo $c["company_description"]; ?></textarea>
                                            <div class="text-danger"><?php echo form_error('company_description');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $c["address"]; ?>" placeholder="Tu dirección ej: calle dos 2965">
                                            <div class="text-danger"><?php echo form_error('address');?></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select name="region" id="region"  class="form-control">
                                                <option>Selecciona tu región</option>
                                                <?php
                                                foreach ($regiones as $reg){
                                                    if($reg["nombre"] == $c["region_nom"]){
                                                        $region_selected = "selected";
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
                                            <input type="text" name="commune_nom" id="commune_nom"  class="form-control" value="<?php echo $c["comuna_nom"]; ?>" disabled="">
                                            <input type="hidden" name="commune" id="commune"  class="form-control" value="<?php echo $c["commune"]; ?>" >
                                            <div class="text-danger"><?php echo form_error('commune');?></div>
                                        </div>
                                        
                                        <hr/>
                                        <!--
                                        <div class="form-group col-md-6">
                                        <select name="company_category" id="company_category" class="form-control">
                                            <option value="">Selecciona categoria</option>
                                            <option value="Jugueteria">Jugueteria</option>
                                        </select>
                                        <div class="text-danger"><?php echo form_error('company_category');?></div>
                                        </div>
                                        -->
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
