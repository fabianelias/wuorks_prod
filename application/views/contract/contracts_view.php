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
                              <!-- Sub menu -->
                              <?php 
                              $this->load->view('inc/inc_sub_menu_view');
                              ?>
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
                                                           echo '<p class="btn btn-warning">Todavía no te ha calificado</p>';
                                                        }else{
                                                            echo '<p class="btn btn-success">'.strtoupper($emp["username"]).' ya te ha calificado</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                 </div>
                                            </div> 
                                          <?php    
                                          }
                                          }else{
                                              echo "Todavía no te han contratado";
                                          }
                                          ?>
                                          
                                      </div>
                                  </div>
                              </div>
                                   
                                 
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