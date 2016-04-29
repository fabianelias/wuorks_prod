<div class="separator"style="height: 65px;">
    
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
                      <br>
                       <?php
                        $i = $infoUser["data"][0];
                        ?>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"]; ?>" style="height: 230px; width: 100%; border-radius:5px;">
                              <h3><?php echo $this->session->userdata('name'); ?></h3>
                              <h4 class="title"><?php echo $i['username']; ?></h4>
                          </div>
                          <div class="col-md-9">
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="<?php echo base_url(); ?>profile/">Tu perfil</a></li>
                                <?php 
                                if($i["user_type"] == 1){
                                    //profesional
                                ?>
                                <li role="presentation" ><a href="<?php echo base_url(); ?>profile/profession" aria-controls="profession" role="tab">Tus profesiones</a></li>
                                <?php
                                }else{
                                    //empresa
                                ?>
                                <li role="presentation" ><a href="<?php echo base_url(); ?>profile/company" aria-controls="company" role="tab">Tu empresa</a></li>
                                <?php
                                }
                                ?>
                                <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile/contract/" aria-controls="settings">Tus contratos</a></li>
                            </ul>
                              <br/>
                              <br/>
                              <?php
                              $employee = $contract["employee"];// usuarios a quien yo contrate
                              $employer = $contract["employer"];// usuarios que me han contratado
                              ?>
                              <div class="row">
                                  <div class="col-lg-12">
                                     
                                      <div class="col-lg-6">
                                          
                                          <?php 
                                          if(!empty($employee)){
                                              foreach($employee as $em){
                                                  //color panel default: ya se ha valorado
                                          // info: no se han valorado
                                          switch ($em["state"]){
                                              case 1: $panel = "panel-default"; break;
                                              case 0: $panel = "panel-info"; break;
                                          }
                                          
                                          ?>
                                          <div class="panel <?php echo $panel; ?>">
                                                <div class="panel-heading">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtoupper($em["id"]); ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    Haz contratado a <?php echo strtoupper($em["username"]); ?>
                                                    <?php 
                                                    switch ($em["type_user"]){
                                                        case 1: $type = "u"; break;
                                                        case 2: $type = "c"; break;
                                                    }
                                                    ?>
                                                    </a>
                                                    &nbsp;
                                                </div>
                                              <div id="<?php echo strtoupper($em["id"]); ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                                  <div class="panel-body">
                                                    <ul class="list-group">
                                                      <li class="list-group-item"><?php echo strtoupper($em["full_name"]); ?></li>
                                                      <li class="list-group-item"><?php echo strtoupper($em["email"]); ?></li>
                                                      <li class="list-group-item"><?php echo strtoupper($em["t_number_2"]); ?></li>
                                                      <li class="list-group-item">Servicio <?php echo strtoupper($em["name_service"]); ?></li>
                                                    </ul>
                                                    <?php
                                                    if($em["state"] == 0 ){
                                                       echo '<a href="'.base_url().'rating/r/'.$em["key_contract"].'/'.$em["id_service"].'/'.$type.'/'.$em["username"].'" class="btn btn-sm btn-info">Califica a '. strtoupper($em["username"]). '</a>'; 
                                                    }else{
                                                        echo '<p class="btn btn-success">Usuario ya calificado</p>';
                                                    }
                                                    ?>
                                                </div>
                                              </div>
                                            </div>
                                          <?php
                                          }
                                          }else{
                                              echo "No haz contratado a nadie";
                                          }
                                          ?>
                                      </div>
                                      
                                      
                                      <div class="col-lg-6">
                                          <?php 
                                          if(!empty($employer)){
                                          foreach($employer as $emp){  
                                          
                                          //color panel default: ya se ha valorado
                                          // info: no se han valorado
                                          switch ($emp["state"]){
                                              case 0: $panel = "panel-info"; break;
                                              case 1: $panel = "panel-default"; break;
                                          }
                                          ?>
                                             <div class="panel <?php echo $panel; ?>">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtoupper($emp["id"]); ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    Te ha contratado <?php echo strtoupper($emp["username"]); ?>
                                                    <?php 
                                                    switch ($emp["type_user"]){
                                                        case 1: $type = "u"; break;
                                                        case 2: $type = "c"; break;
                                                    }
                                                    ?>
                                                    </a>
                                                </div>
                                                 <div id="<?php echo strtoupper($emp["id"]); ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                                     <div class="panel-body">
                                                        <ul class="list-group">
                                                          <li class="list-group-item"><?php echo strtoupper($emp["full_name"]); ?></li>
                                                          <li class="list-group-item"><?php echo strtoupper($emp["email"]); ?></li>
                                                          <li class="list-group-item"><?php echo strtoupper($emp["t_number_2"]); ?></li>
                                                          <li class="list-group-item">Servicio <?php echo strtoupper($emp["name_service"]); ?></li>
                                                        </ul>
                                                        <?php
                                                        if($emp["state"] == 0 ){
                                                           echo '<p class="btn btn-warning">Todavia no te ha calificado</p>';
                                                        }else{
                                                            echo '<p class="btn btn-success">Usuario ya te ha calificado</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                 </div>
                                            </div> 
                                          <?php    
                                          }
                                          }else{
                                              echo "Todavia no te han contratado";
                                          }
                                          ?>
                                          
                                      </div>
                                  </div>
                              </div>
                              <?php
                              if($p == 1){
                              ?>
                              <br/>
                              <hr/>
                              <h3 class="title text-center">Todavía no creas tu primera profesión , no pierdas el tiempo 
                                <?php 
                                if($i['address'] == "" || $i["commune"] == "" || $i["region"] == "" || $i["cell_phone_number"] == 0 || $i["rut"] == ""){
                                    echo "<tr>";
                                    echo "<td><p class='btn btn-sm btn-warning'><a href='".base_url()."profile/editProfile' style='color:#fff;'><i class='fa fa-warning'></i> Es importante que completes tu datos</a></p></td>";
                                    echo "</tr>";
                                }else{
                                ?>
                                  <a href="<?php echo base_url(); ?>profile/createProfession" class="btn btn-sm btn-primary text-center">
                                      Crear perfil profesional <i class="fa fa-plus"></i>
                                  </a>
                                <?php
                                }
                                ?>
                              </h3> 
                              <?php
                              }else{
                                  $i = 0;
                                  foreach ($p as $row){
                              ?>
                                  <div class="panel panel-default">
                                      <div class="panel-heading">Profesión: <?php echo strtoupper($row["name_profession"]); ?><a href="<?php echo base_url()."profile/editProfession/".$row["key_profession"];?>" class="btn btn-sm btn-primary" style="margin-left:35px;">Editar Profesión</a></div>
                                    <div class="panel-body">
                                        <div class="table table-responsive col-md-4">
                                            <label><?php echo ucfirst($row["job_description"]); ?></label>
                                            <hr/>
                                            <?php
                                            switch ($row["workplace"]){
                                                case 1: $workplace = "Todo chile"; break;
                                                case 2: $workplace = "Solo en mi región"; break;
                                                case 3: $workplace = "Solo en mi comuna"; break;
                                            }
                                            ?>
                                            <p>
                                                Lugar de trabajo:  <?php echo $workplace; ?> &nbsp; | &nbsp;
                                                Calificación: 
                                                <?php 
                                                if(empty($row["rating"])){
                                                    echo " Sin calificación.";
                                                }else{
                                                    $j    = 0;
                                                    $nota = 0;
                                                    foreach ($row["rating"] as $ranting){
                                                        $nota += $ranting["user_rating"];
                                                        $j++;
                                                    }
                                                    $calificacion = $nota / $j;
                                                    
                                                    echo $calificacion." (de ".$j." Calificaciones)";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                  </div>
                                  
                              <?php
                                    $i++;
                                  }
                                  
                                  if($i <= 1){
                                  ?>
                                    <hr/>
                                      
                                  <?php
                                  }
                              }
                              ?>
                              <hr/>
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