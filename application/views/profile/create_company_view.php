<div class="separator"style="height: 80px;">   
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
                                            <input type="text" name="address" id="address" class="form-control" value="<?php echo set_value('address'); ?>" placeholder="Tu dirección ej: calle dos 2965">
                                            <div class="text-danger"><?php echo form_error('address');?></div>
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

