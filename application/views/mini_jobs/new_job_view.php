<div class="separator"style="height: 52px;">
    
</div>
<?php  
    if($this->session->flashdata('mensajes')){
    ?>
      <div class="alert alert-info text-center" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <a href="javascript:;" class="alert-link"><?php echo $this->session->flashdata('mensajes') ?></a>
      </div>
<?php
   }
?>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="profile">
                  <div class="row">
                    <?php
                    $i = $infoUser["data"][0];
                    ?>
                      <br>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"]; ?>" style="height: 230px; width: 100%;border-radius:5px;">
                              <h3><?php echo $i["name"]; ?></h3>
                              <h4 class="title"><?php echo $this->session->userdata('username'); ?></h4>
                          </div>
                          <div class="col-md-9">
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class="active">
                                      <a href="<?php echo base_url(); ?>profile">
                                          <i class="fa fa-plus"></i>
                                          Nuevo MiniJob
                                      </a>
                                  </li>
                                  <li role="presentation" ><a href="<?php echo base_url(); ?>profile/jobs">Cancelar</a></li>
                              </ul>
                              <br/>
                              <br/>
                              <form name="form-job" id="form-job" method="POST" action="<?php echo base_url(); ?>profile/job1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i>
                                        Información publica del MiniJobs
                                    </div>
                                    <div class="panel-body">

                                            <div class="form-group-sm">
                                                <input type="text" name="title" id="title" class="form-control" placeholder="Titulo del MiniJobs" required="">
                                                <br/>
                                                <textarea name="description" id="description" class="form-control" placeholder="Detalle completo del MiniJobs"required="" rows="8"></textarea>
                                                <br/>

                                            </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-cogs"></i>
                                        Configuración general del MiniJobs
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group-sm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="number" name="salario" id="salario" min="0" class="form-control" required="" placeholder="Salario aproximado por hora">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" name="nroAppl" id="nroAppl" min="0" class="form-control" required="" placeholder="Nro. de aplicantes">
                                                </div>
                                                <div class="col-md-6">
                                                    <br/>
                                                    Trabajo por:
                                                        <select name="tipo_aviso" id="tipo_aviso" class="form-control">
                                                            <option value="1">Horas</option>
                                                            <option value="2">Día</option>
                                                            <option value="3">Semana</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <br/>
                                                     Horario:
                                                        <select name="horario" id="horario" class="form-control">
                                                            <option value="1">Mañana</option>
                                                            <option value="2">Tarde</option>
                                                            <option value="3">Noche</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <br/>
                                                    Necesito:
                                                        <select name="genero" id="genero" class="form-control">
                                                            <option value="1">Hombre</option>
                                                            <option value="2">Mujeres</option>
                                                            <option value="3">Ambos</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <br/>
                                                     Pueden ser de
                                                        <select name="zona" id="zona" class="form-control">
                                                            <option value="1">Comuna</option>
                                                            <option value="2">Region</option>
                                                            <option value="3">Todo Chile</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr/>
                                                    <button type="submit" class="btn btn-sm btn-block btn-primary" name="crearJob">
                                                        Crear MiniJob
                                                        <i class="fa fa-check-circle-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                              </form>
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
