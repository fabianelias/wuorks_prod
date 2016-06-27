
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
                                  <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile">Editando tu perfil profesional</a></li>
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
                                    <form name="form-create-profession" id="form-create-profession" method="POST" accept-charset="utf8" action="<?php echo base_url(); ?>profile/editProfession1/<?php echo $profession["key_profession"]; ?>">
                                        <div class="form-group col-md-6">
                                            <small style="
                                                color: #31708f;
                                            ">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                ¿Que profesión realizas?
                                            </small>
                                            <select name="profession" id="profession" class="form-control"  disabled >
                                                 <option value="">
                                                 <?php
                                                 $pro  = $profession["name_profession"];
                                                 $pro  = str_replace("+", " ", $pro);
                                                 echo $pro;
                                                 ?>
                                                 </option>
                                            </select>
                                            <input type="hidden" name="name_profession" id="name_profession" value="<?php echo $profession["name_profession"]; ?>">
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
                                                <option value="1" <?php if($profession["workplace"] == 1){echo "selected";}?>>Todo chile</option>
                                                <option value="2" <?php if($profession["workplace"] == 2){echo "selected";}?>>Solo en mi región</option>
                                                <option value="3" <?php if($profession["workplace"] == 3){echo "selected";}?>>Solo en mi comuna</option>
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
                                            <textarea name="job_description" rows="10" cols="10" id="job_description" class="form-control" placeholder="Descripción detallada de tu servicio"><?php echo $profession["job_description"] ?></textarea>
                                            <div class="text-danger"><?php echo form_error('job_description');?></div>
                                        </div>
                                        <hr/>
                                        <div class="form-group col-md-12">
                                            <hr/>
                                            <input type="hidden" name="key_profession" id="key_profession" value="<?php echo $profession["key_profession"]; ?>">
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
