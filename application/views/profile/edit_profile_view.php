<div class="separator"style="height: 80px;">
    
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
                                  <button type="submit" name="change_avatar" id="change_avatar" class="btn btn-sm btn-primary">
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
                                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $i["address"]; ?>" placeholder="Tu dirección ej: calle dos 2965">
                                            <div class="text-danger"><?php echo form_error('address');?></div>
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
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="telephone_number" id="telephone_number" class="form-control" value="<?php if($i["telephone_number"] == 0){echo "";}else{ echo $i["telephone_number"];} ?>" placeholder="Telefono opcional">
                                            <small>Nro. de telefono opcional</small>
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
                                            <input type="date" name="birth_date" id="birth_date" class="form-control" value="<?php ?>" placeholder="Telefono opcional">
                                            <small>(Fecha nacimiento)</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="rut" id="rut" class="form-control" value="<?php echo $i["rut"];?>" placeholder="rut sin punto ni gion">
                                            <small>(Esto lo hace más seguro)</small>
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
