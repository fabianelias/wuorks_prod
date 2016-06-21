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
                              <!-- Sub menu -->
                              <?php 
                               $this->load->view('inc/inc_sub_menu_view');
                              //include_once realpath. '/inc/inc_sub_menu_view.php';?>
                              <br/>
                              <br/>
                              
                              <?php
                              $row = $company[0];
                              if(!empty($company)){
                                  
                              ?>
                              <div class="panel panel-default">
                                    <div class="panel-heading">Empresa: <?php echo strtoupper($row["company_name"]); ?>
                                        <a href="<?php echo base_url();?>profile/editCompany" class="btn btn-sm btn-primary" style="margin-left:35px;">
                                            <i class="fa fa-lg  fa-edit"></i>&nbsp;
                                             Editar
                                        </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table table-responsive col-md-4">
                                            <label><?php echo ucfirst($row["company_description"]); ?></label>
                                            <hr/>
                                            <p>
                                                Dirección:  <?php echo $row["address"]; ?> &nbsp; | &nbsp;
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
                                                &nbsp; | &nbsp;
                                                Rubro: <?php echo ucfirst($row["company_category"]);?>
                                            </p>
                                        </div>
                                    </div>
                                  </div>
                              <?php
                              }else{
                              ?>   
                              <br/>
                              <hr/>
                              <h3 class="title text-center">Todavía no creas tu perfil de empresa , no pierdas el tiempo 
                                  <?php 
                                if($i['address'] == "" || $i["commune"] == "" || $i["region"] == "" || $i["cell_phone_number"] == 0){
                                    echo "<tr>";
                                    echo "<br/>";
                                    echo "<td><br/><p class='btn btn-sm btn-warning'><a href='".base_url()."profile/editProfile' style='color:#fff;'><i class='fa fa-warning'></i> Es importante que completes tu datos</a></p></td>";
                                    echo "</tr>";
                                }else{
                                ?>
                                  <a href="<?php echo base_url(); ?>profile/createCompany" class="btn btn-sm btn-primary text-center">
                                      Crear perfil Empresa <i class="fa fa-plus"></i>
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
        font-weight: 300;
        color: #47525d;
    }
    
    
</style>
