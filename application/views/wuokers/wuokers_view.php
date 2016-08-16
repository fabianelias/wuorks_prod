<div class="separator"style="height: 52px;">
    
</div>

<section>
<!-- Cabecera para Descktop -->
<header class="bg-primary" id="map"style="height:260px; width: 100%;"></header>
<div class="profile-Descktop">
    <div class="row">
        <div class="col-lg-offset-1 col-md-offset-1 col-lg-4 col-md-4 col-sm-8 profile-Descktop-dos" style="border-radius: 3px;     padding: 20px;   box-shadow: 0 2px 5px 0 rgba(0,0,0,.1),0 2px 5px 0 transparent;">
            <div class="col-lg-5 col-md-5 col-sm-5" style="margin-left: -40px; vertical-align: middle;">
                <img class="img-circle img-responsive" 
                     src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $infoUser[0]['avatar']; ?>" 
                     alt="<?php echo $infoUser[0]["username"]; ?>" 
                     style="margin: 0 auto; height: 100px; width: 100px;">
                
                <small><a href="#descrip" class="page-scroll">Profesional</a></small>
            </div>
            <style>
                .box-user-2{
                        text-align: justify;
                 }
                @media (max-width: 768px) {
                    .box-user-2{
                        text-align: center;
                    }
                }
            </style>
            <div class="col-lg-8 col-md-8 col-sm-10 box-user-2">
                <h3 class="sub-title"><?php echo $infoUser[0]["username"]; ?><br/>
                    <small class="textos">Profesión: <?php echo $infoUser[0]["name_profession"]; ?></small> 
                </h3>
                <hr style=" margin-top: 0px;margin-bottom: 3px;">
                <?php
                $total = count($infoUser[0]['rating']);
                for ($v = 1; $v < 6; $v++) {
                      if ($v <= $total) {
                         echo  '<i class="fa fa-lg fa-star" style="color: #FFA000;"></i> ';
                      } else {
                         echo '<i class="fa fa-lg fa-star-o" style="color:  #CCD1D9;"></i> ';
                      }
                 }
                ?>
                <small><a href="#comentarios" class="page-scroll">Opiniones (<?php echo $total;?>)</a></small>
            </div>
        </div>
    </div>
</div>
<?php  
    if($this->session->flashdata('mensajes')){
    ?>
    <div class="alert alert-info text-center" id="alerts" role="alert" style="border-radius:0px;margin-bottom: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <a href="javascript:;" class="alert-link"><?php echo $this->session->flashdata('mensajes') ?></a>
    </div>
<?php
   }
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h4 class="sub-title">&nbsp;</h4>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 hidden-lg hidden-md col-xs-12 thumbnail" style="border-radius:2px;border:1px solid #e7e7e7;">
            <center>
                <br/>
                <a  target="_blank" class=""
                    href="http://www.facebook.com/sharer.php?u=<?php echo current_url()."?wk=".$infoUser[0]["wuorks_key"];?>&t=Wuorks Chile > <?php echo $infoUser[0]["username"]." - Profesión ".$infoUser[0]["name_profession"]; ?>">
                    <i class="fa fa-facebook-official fa-lg"></i>
                </a>
                <p class="textos">Compártelo</p>
            </center>
            <?php
                if($this->session->userdata("username") == $infoUser[0]["username"]){
                ?>
                <a href="<?php echo base_url(); ?>profile/editProfession/<?php echo $infoUser[0]["key_profession"]; ?>" class="btn btn-block btn-primary">Editar profesión</a>
                <?php
                }else{
                ?>
                <a data-toggle="modal" data-target="#contract" class="btn btn-block btn-wuorks">Contratar</a>
                <?php
                }
            
            ?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 thumbnail" style="border-radius:2px;border:1px solid #fbfbfb;box-shadow: 0 2px 5px 0 rgba(0,0,0,.1),0 2px 5px 0 transparent;">
            <div id="descrip" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify" style="/*border-bottom:1px solid #e7e7e7;*/">
                <h4 class="titles">Mi trabajo</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify" style="padding:20px;">
                <p class="textos">
                    <?php 
                        echo ucfirst($infoUser[0]["job_description"]);
                    ?>
                </p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right hidden-sm hidden-xs thumbnail" style="border-radius:2px;border:1px solid #fbfbfb;box-shadow: 0 2px 5px 0 rgba(0,0,0,.1),0 2px 5px 0 transparent;">
            <center>
                <br/>
                <a  target="_blank" class=""
                    href="http://www.facebook.com/sharer.php?u=<?php echo current_url()."?wk=".$infoUser[0]["wuorks_key"];?>&t=Wuorks Chile > <?php echo $infoUser[0]["username"]." - Profesión ".$infoUser[0]["name_profession"]; ?>">
                    <i class="fa fa-facebook-official fa-lg"></i>
                </a>
                <p class="textos">Compártelo</p>
            </center>
        
            <?php 
            $calificacion = 0;
            $j    = 0;
            if(!empty($infoUser[0]["rating"])){
               
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
                echo '<img src="'.base_url().'asset/img/'.$image.'" style="max-height:80px;">';
            }
            
            ?>
            <center>
                <h5 class="textos">Calificación global</h5>
                <?php 
                echo number_format($calificacion,1,',','.')."<br/>(<small>de ".$j." Calificaciones) <br/>*nota maxima 5</small>";
                ?>
            </center>
            
            <hr/>
            <?php
                if($this->session->userdata("username") == $infoUser[0]["username"]){
                ?>
                <a href="<?php echo base_url(); ?>profile/editProfession/<?php echo $infoUser[0]["key_profession"]; ?>" class="btn btn-block btn-primary">Editar profesión</a>
                <?php
                }else{
                ?>
                <a data-toggle="modal" data-target="#contract" class="btn btn-block btn-wuorks">Contratar</a>
                <?php
                }
            
            ?>
             
        </div>
        <br/>
        <hr/>
        <br/>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 thumbnail" 
             style="border-radius:2px;
             border:1px solid #fbfbfb;/*#e7e7e7;*/
             box-shadow: 0 2px 5px 0 rgba(0,0,0,.1),0 2px 5px 0 transparent;;
             ">
            <div id="comentarios" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify" style="/*border-bottom:1px solid #e7e7e7;*/">
                <h4 class="titles">Comentarios</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify" style="padding:20px;">
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
                    }
                }else{
                ?>
                <center>
                    <h4 class="textos">
                        <i class="fa fa-comment-o fa-3x fa-lg sr-contact"></i>
                        <br/>
                        Todavía no comentan su trabajo<br/>
                        ¡Sé el primero!<br/>
                        <?php 
                        if(!$this->session->userdata('id_user')){
                        ?>
                        <a class="page-scroll btn btn-wuorks" href="#" data-toggle="modal" data-target="#login" style="font-weight: 300;">Ingresa para contratar a <?php echo  $infoUser[0]["username"];?></a>
                        <?php
                        }else{
                        ?>
                        <a data-toggle="modal" data-target="#contract" class="btn btn-warning">Contrata a <?php echo  $infoUser[0]["username"];?></a>
                        <?php 
                        }
                        ?>
                    </h5>
                </center>  
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    
</div>

            
            
<!--Sección modal contrato-->
<div class="modal fade" id="contract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:2px;">
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
</section>
<style>
    .sub-title{
        color:#47525d;
        line-height: 1.4;
        font-size: 20px;
        font-weight: 300;
    }
    .titles{
        color:#47525d;
        line-height: 1.4;
        font-weight: 300;
    }
    .textos{
        color:#47525d;
        line-height: 2;
        font-weight: 300;
    }
    .profile-Descktop{
        position: absolute;
        top: 10rem;
        left: 2rem;
        right: 2rem;
        pointer-events: none;
    }
    .profile-Descktop-dos{
        background-color: rgba(255,255,255,.95);
        padding: 0.5rem 2rem;
        pointer-events: auto;
        text-align: center;
    }
    /* Small devices (tablets, 768px and up) */
    @media (max-width: 868px) {
        .profile-Descktop{
            position: absolute;
            top: 4rem;
            left: 2rem;
            right: 2rem;
            pointer-events: none;
        }
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkoT7wvKlxwO7aCjUfeBidxUFV8GE_yas&signed_in=false&libraries=places&callback=WuorksCallback"
        async defer></script>
<script src="<?php echo base_url();?>asset/js/user-profile-a1Bws5214CJoas258412154POGOjne3.js"></script>
<script type="text/javascript">
    WuorksCallback = function() {
      getMapUser({lat: <?php echo $infoUser[0]["lat"];?>, lng: <?php echo $infoUser[0]["lng"];?>});
    };
    setTimeout(function(){
                    $("#alerts").slideUp('slow');
            },
            4000
    );
</script>
