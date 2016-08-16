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
                     <a href="<?php echo base_url(); ?>profile/editCompany" class="btn btn-block btn-primary">Editar profesión</a>
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
                    <?php
                    ?>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-1">
                                        <h3 class="sub-title"><?php echo $infoUser[0]["company_name"]; ?> <small>/Actividad: <?php echo $infoUser[0]["company_category"]; ?></small> </h3>  

                                        <hr/>
                                        <h5><?php echo $infoUser[0]["company_description"];?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="review">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <br/>
                                    <?php 
                                    if(!empty($infoUser[0]["rating"])){
                                        foreach ($infoUser[0]["rating"] as $rating){
                                            $fecha = date("d/m/Y", strtotime($rating["create_time"]));
                                            ?>
                                        <div class="media">
                                            <div class="media-left">
                                                <center>
                                                    <img class="media-object" alt="<?php echo $rating["username"];?>"
                                                         style="height:62px;width: 62px; margin-bottom:8px; border-radius: 3px;"
                                                         src="<?php echo base_url();?>asset/img/user_avatar/<?php echo $rating["avatar"];?>">
                                                    <small style="">
                                                        <?php echo $rating["username"];?>
                                                    </small>
                                                </center>
                                            </div>
                                            <div class="media-body">
                                              <h4 class="media-heading" style="color:#47525d;">
                                                  <?php echo $rating["title"];?>
                                                  <small class='pull-right'><?php echo $fecha;?></small>
                                              </h4>
                                              <?php echo $rating["comment"];?>
                                              <br/>
                                              <?php
                                              for ($v = 1; $v < 6; $v++) {
                                                    if ($v <= $rating["user_rating"]) {
                                                       echo  '<i class="fa fa-lg fa-star" style="color: #FFA000;"></i> ';
                                                    } else {
                                                       echo '<i class="fa fa-lg fa-star-o" style="color:  #CCD1D9;"></i> ';
                                                    }
                                               }
                                              ?>
                                            </div>
                                        </div>
                                    <hr/>
                                    <?php
                                            /*
                                            $fecha = date("d/m/Y", strtotime($rating["create_time"]));
                                            echo "<br/>";
                                            echo "<b>".$rating["name_user"]."</b>:<b class='pull-right'>".$fecha."</b>";
                                            echo "<br/>".$rating["title"]."<br/>";
                                            echo $rating["comment"]."<hr/>";
                                            */
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
            