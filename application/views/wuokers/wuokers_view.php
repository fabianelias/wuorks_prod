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
<section>
        <div class="container" style="margin-top: 20px;">
            <div class="row">
               
                <?php 
                ?>
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail" style="padding: 0px;">
                      <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $infoUser[0]['avatar']; ?>" alt="..." style="margin: 0 auto;">
                    <div class="caption">
                        <div class="row">
                            <?php 
                            if(!empty($infoUser[0]["rating"])){
                               $j    = 0;
                                $nota = 0;
                                foreach ($infoUser[0]["rating"] as $ranting){
                                    $nota += $ranting["user_rating"];
                                    $j++;
                                }
                                $calificacion = $nota / $j;

                                if($calificacion <= 2){
                                    $image = "face_red.png";
                                }else if($calificacion > 2 && $calificacion <=4){
                                    $image = "face_yellow.png";
                                }else{
                                    $image = "face_green.png";
                                }
                                
                            ?>
                            <div class="col-lg-12">
                                <div class="col-lg-6 text-center">
                                    <h5>Calificación global</h5>
                                    <?php 
                                    echo number_format($calificacion,1,',','.')."<br/>(<small>de ".$j." Calificaciones) <br/>*nota maxima 5</small>";
                                    ?>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <?php
                                    echo '<img src="'.base_url().'asset/img/'.$image.'" style="max-height:80px;">';
                                    ?>
                                </div>
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="col-lg-12 text-center">
                                <h5>Calificación global</h5>
                                Sin calificaciones.
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                     <hr/> 
                       <?php
                     if($this->session->userdata("username") == $infoUser[0]["username"]){
                     ?>
                     <a href="<?php echo base_url(); ?>profile/editProfession/<?php echo $infoUser[0]["key_profession"]; ?>" class="btn btn-block btn-primary">Editar profesión</a>
                     <?php
                     }else{
                     ?>
                     <a data-toggle="modal" data-target="#contract" class="btn btn-block btn-info">Contratar</a>
                     <?php
                    }
                    ?>
                    </div>
                      
                  </div>
                </div>
                  
                <div class="col-sm-8 col-md-8 thumbnail">
                    
                    
                     <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Perfil</a></li>
                      <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Comentarios</a></li>                
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-1">
                                        <h3 class="sub-title"><?php echo $infoUser[0]["username"]; ?> <small>/Profesión: <?php echo $infoUser[0]["name_profession"]; ?></small> </h3>  

                                        <hr/>
                                        <h5><?php echo $infoUser[0]["job_description"];?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="review">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-1">
                                    <?php 
                                    if(!empty($infoUser[0]["rating"])){
                                       
                                        foreach ($infoUser[0]["rating"] as $rating){
                                            
                                            $fecha = date("d/m/Y", strtotime($rating["create_time"]));
                                            echo "<br/>";
                                            echo "<b>".$rating["name_user"]."</b>:<b class='pull-right'>".$fecha."</b>";
                                            echo "<br/>".$rating["title"]."<br/>";
                                            echo $rating["comment"]."<hr/>";
                                            
                                        }
                                    }else{
                                      echo "<br/>No hay comentarios";   
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            
            
            <!--Sección modal contrato-->
            <div class="modal fade" id="contract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contrato</h4>
                  </div>
                  <div class="modal-body text-center">
                      <?php
                      if(!$this->session->userdata('id_user')){
                      ?>
                      Para poder contratar ha
                      <h4 class="sub-title">
                          <?php echo $infoUser[0]["username"]; ?>
                      </h4>
                      
                      <br/>
                      <small>
                          Debes estar 
                          <a href="<?php echo base_url();?>oauth/in?return=<?php echo current_url()."?wk=".$infoUser[0]["wuorks_key"];?>">
                              Logueado
                          </a>
                          ó bien 
                          <a href="<?php echo base_url();?>oauth/register?new_user=yes"class="">
                              Registrate
                          </a>
                      </small>
                      <?php
                      }else{
                      ?>
                      ¿Seguro de contratar a?
                      <h4 class="sub-title">
                          <?php echo $infoUser[0]["username"]; ?>
                      </h4>
                      
                      <br/>
                      <small>Una vez contratado ambas partes reciben los datos para el contacto</small>
                  </div>
                  <div class="modal-footer">
                    <form name="form-contrat" id="form-contract" action="<?php echo base_url(); ?>wuokers/contract" method="POST">
                        <input type="hidden" name="pk" id="pk" value="<?php echo $infoUser[0]["key_profession"]; ?>">
                        <input type="hidden" name="wk" id="wk" value="<?php echo $infoUser[0]["id_user"]."/".$infoUser[0]["wuorks_key"];?>">
                        <input type="hidden" name="pf" id="pf" value="<?php echo $infoUser[0]["name_profession"]; ?>">
                        <input type="hidden" name="return" id="return" value="<?php echo current_url(); ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="contract" class="btn btn-primary">Contratar</button>
                    </form>
                  </div>
                    <?php
                      }
                    ?>
                </div>
              </div>
            </div>
        </div>
</section>
<style>
    .sub-title{
        color:#47525d;
        line-height: 1.4;
        font-size: 20px;
        font-weight: 300;
    }
</style>
    