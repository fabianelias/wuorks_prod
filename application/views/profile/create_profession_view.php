
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
                        ?>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"]; ?>" style="height: 230px; width: 100%; border-radius:5px;">
                              <hr/>                   
                              <h4 class="title"><?php echo $i["username"]; ?></h4>
                          </div>
                          <div class="col-md-9">
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile">Creando tu perfil</a></li>
                                  <li role="presentation" ><a href="<?php echo base_url(); ?>profile">Cancelar</a></li>
                              </ul>
                              <br/>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    Infomación publica
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-12">
                                            <div class="alert alert-info alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Consejos!</strong> 
                                              Detalla muy bien tu servicio
                                            </div>
                                    </div>
                                    <form name="form-create-profession" id="form-create-profession" method="POST" accept-charset="utf8" action="<?php echo base_url(); ?>profile/createProfession1">
                                        <div class="form-group col-md-6">
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                ¿Que profesión realizas?
                                            </small>
                                            <select name="name_profession" id="name_profession" class="form-control chosen-select"  data-placeholder="Selecciona tu profesión">
                                                <option value=""></option>
                                                <?php                                             foreach ($list as $l){
                                                    $pro = $l["nombre_profesion"];
                                                    $pro = str_replace(" ", "+", $pro);
                                                    echo '<option value="'.$pro.'">'.$l["nombre_profesion"].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="text-danger"><?php echo form_error('name_profession');?></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                ¿En donde puedes trabajar?
                                            </small>
                                            <select name="workplace" id="workplace" class="form-control">
                                                <option value="">¿Donde puedes trabajar?</option>
                                                <option value="1">Todo chile</option>
                                                <option value="2">Solo en mi región</option>
                                                <option value="3">Solo en mi comuna</option>
                                            </select>
                                            <div class="text-danger"><?php echo form_error('region');?></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                Describe tu servicio
                                            </small>
                                            <textarea name="job_description" rows="10" cols="10" id="job_description" class="form-control" placeholder="Descripción detallada de tu servicio"><?php echo set_value('job_description'); ?></textarea>
                                            <div class="text-danger"><?php echo form_error('job_description');?></div>
                                        </div>
                                        <hr/>
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
