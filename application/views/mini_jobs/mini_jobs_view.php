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
                    <?php
                    $i = $infoUser["data"][0];
                    $row = $company[0];
                    ?>
                      <br>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"]; ?>" style="height: 230px; width: 100%;border-radius:5px;">
                              <h3><?php echo $i["name"]; ?></h3>
                              <h4 class="title"><?php echo $this->session->userdata('username'); ?></h4>
                          </div>
                          <div class="col-md-9">
                              <!-- Sub menu -->
                              <?php 
                              $this->load->view('inc/inc_sub_menu_view');
                              ?>
                              
                              <?php
                              if(!empty($jobs)){
                                  ?>
                                    <hr/>
                                    <h4 class="title text-center">
                                        <a href="<?php echo base_url(); ?>profile/job">
                                            Crear mini jobs
                                        <i class="fa fa-plus title"></i>
                                        </a>
                                    </h4>
                                    <hr/>
                                  <?php
                                  foreach ($jobs as $job){
                                  ?>
                                  <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <?php 
                                          echo ucfirst(substr($job['title'], 0,30));
                                          ?>
                                          <a href="<?php echo base_url();?>profile/matchs/<?php echo $job['key_aviso']."?Jobs=".  md5($job['key_aviso'])?>" class="btn btn-sm btn-info" style="margin-left:35px;">
                                            Wuokers Recomendados
                                            <i class="fa fa-certificate"></i>
                                          </a>
                                          <a href="<?php echo base_url();?>profile/adminJob/<?php echo $job['key_aviso']."?Jobs=".  md5($job['key_aviso'])?>"
                                            class="pull-right" style="">
                                            Administrar Job
                                            <i class="fa fa-cog"></i>
                                          </a>
                                      </div>
                                    <div class="panel-body">
                                      <?php
                                      echo ucfirst($job['description']);
                                      ?>
                                    </div>
                                      <table class="table">
                                          <tbody>
                                              <tr>
                                                  <td>
                                                      <small>
                                                      Postulantes : 
                                                      <?php 
                                                      echo '(5)';
                                                      ?>
                                                      </small>
                                                  </td>
                                                  <td>
                                                      <small>
                                                      Creado el : 
                                                      <?php 
                                                      $created_at = date('d-m-Y',  strtotime($job['created_at']));
                                                      echo $created_at;
                                                      ?>
                                                      </small>
                                                  </td>
                                                  <td>
                                                      <small>
                                                      Termina el : 
                                                      <?php 
                                                      $final_at = date('d-m-Y',  strtotime($job['delete_at']));
                                                      echo $final_at;
                                                      ?>
                                                      </small>
                                                  </td>
                                                  <td>
                                                      <small>
                                                      Estado : 
                                                      <?php 
                                                      switch ($job['state']){
                                                          case 0: $state = "Activo";   break;
                                                          case 2; $state = "Inactivo"; break;
                                                      }
                                                      echo $state;
                                                      ?>
                                                      </small>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                                  <?php
                                  }
                              }else{
                              ?>   
                              <br/>
                              <hr/>
                              <h3 class="title text-center">
                                  Crea miniJobs en segundos
                                  <?php 
                                if($i['address'] == "" || $i["commune"] == "" || $i["region"] == "" || $i["cell_phone_number"] == 0 || $i["rut"] == ""){
                                    echo "<tr>";
                                    echo "<br/>";
                                    echo "<td><br/><p class='btn btn-sm btn-warning'><a href='".base_url()."profile/editProfile' style='color:#fff;'><i class='fa fa-btn btn-sm btn-warning'></i> Es importante que completes tu datos</a></p></td>";
                                    echo "</tr>";
                                }else if(empty($company)){
                                ?>
                                  <br/>
                                  <br/>
                                  <a href="<?php echo base_url(); ?>profile/createCompany" class="btn btn-sm btn-warning text-center">
                                      <i class="fa fa-warning"></i>&nbsp;Debes crear tu empresa antes.
                                  </a>
                                <?php
                                }else{
                                ?>
                                <a href="<?php echo base_url(); ?>profile/createCompany" class="btn btn-sm btn-primary text-center">
                                    Crear miniJobs <i class="fa fa-plus"></i>
                                </a> 
                                <?php
                                }
                                ?>
                              </h3> 
                              <?php
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
        font-weight: 100;
        color: #47525d;
    }
    
    
</style>
