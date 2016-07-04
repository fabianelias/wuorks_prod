<div class="separator"style="height: 51px;">
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
<div class="row text-center"  
    style="
    background-color: #4a90e2;
    border-color: #4a90e2;
    color:#fff;
    height: 100px;
    "
    role="alert">
    <h2 class="title" style="color:#fff;">
        Mini Jobs <i class="fa fa-certificate"></i>
        <br>
        <small class="title" style="color:#fff; font-weight: 100;">El trabajo que necesitas</small>
    </h2>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            
        </div>
        <div class="col-md-12">
            <div class="col-md-2 title">
            <center>
                <h5 class="title">&nbsp;</h5>
                <hr/>
            </center>
            Para aplicar a los MiniJobs asegurate de haber completado todos tus datos.
            </div>
            <div class="col-md-8">
                <center>
                    <h5 class="title"><?php echo count($jobs);?> MiniJobs encontrados.</h5>
                    <hr/>
                </center>
             <?php 
             if(!empty($jobs)){
                 if(!$this->session->userdata('wuorks_key')){
                     //Si no esta registrado solo mostramos 3 avisos invitandolo a registrarse o loguearse
                 $x = 0; 
                 foreach ($jobs as $job){
                 ?>
                  <div class="jobs panel panel-default" id="miniJob-<?php echo $job['key_aviso'];?>">
                    <div class="panel-body">
                        <h4 class="title"><?php echo strtoupper($job['title']);?></h4>
                        <p class="title">
                            <?php
                            echo ucfirst($job['description']);
                            ?>
                        </p>
                        <hr/>
                        <li class="title">
                            Renta ofrecida :
                            <?php 
                            echo "$".number_format($job['remuneration'],0,',','.')." p/h";
                            ?>
                        </li>
                        <li class="title">
                            Lugar de trabajo :
                            <?php 
                            echo ucfirst($job['nombre_comuna']).", ";
                            echo ucfirst($job['region_nombre']);
                            ?>
                        </li>
                        <li class="title">
                            Se necesitan :
                            <?php 
                            switch ($job['genero']){
                                case 1: $genero = "Hombres"; break;
                                case 2: $genero = "Mujeres"; break;
                                case 3: $genero = "Hombres y Mujeres"; break;
                            }
                            echo $genero;
                            ?>
                        </li>
                        <li class="title">
                            Horario :
                            <?php 
                            switch ($job['horario']){
                                case 1: $horario = "Mañana"; break;
                                case 2: $horario = "Tarde"; break;
                                case 3: $horario = "Noche"; break;
                            }
                            echo $horario;
                            ?>
                        </li>
                        <li class="title">
                            Trabajo por :
                            <?php 
                            switch ($job['tipo_aviso']){
                               case 1: $tipo_aviso = "Horas"; break;
                               case 2: $tipo_aviso = "Días"; break;
                               case 3: $tipo_aviso = "Semanas"; break;
                            }
                            echo $tipo_aviso;
                            ?>
                        </li>
                    </div>
                      <div class="panel-footer" style="background-color: #fff;">
                        <img src="<?php echo base_url("asset/img/user_avatar")."/".$job['avatar'];?>" 
                             style="
                             max-height: 40px;
                             max-width: 40px;
                             border: 1px solid #fbfbfb;
                             box-shadow: 0px 1px 1px #d0d4d9;
                             ">
                        &nbsp;
                        <?php 
                        echo strtoupper($job['company_name']);
                        ?>
                        &nbsp;
                        /
                        &nbsp;
                        <small>
                            Publicado el 
                        <?php 
                        $fecha_pub = date('d-m-Y',  strtotime($job['created_at']));
                        echo $fecha_pub;
                        ?>
                        </small>
                        &nbsp;
                        /
                        &nbsp;
                        <small>
                            Compartir 
                            <!--<a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo base_url("jobs")."#miniJob-".$job['key_aviso'];?>&p[title]=<?php echo strtoupper($job['title']);?>&p[summary]=<?php echo strtoupper($job['description']);?>&p[images][0]=<?php echo base_url("asset/img/logo-cl.png");?>">-->
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url();?>jobs<?php echo "#miniJob-".$job['key_aviso'];?>/&t=<?php echo ucfirst($job['title'])." | ".  ucfirst($job['description']);?>">
                                <i class="fa fa-facebook fa-lg"></i>
                            </a>
                        </small>
                        &nbsp;
                        <br/>
                        <a class="btn btn-sm btn-primary btn-block"style="margin-top:3px;"
                            <i class="fa fa-lg fa-check-circle"></i>
                            Aplicar
                        </a>
                    </div>
                  </div>
                    <hr/>
                    <center>
                        <h5 class="text-uppercase" style="font-weight:200;">Para ver más MiniJobs 
                        <a href="<?php echo base_url("oauth/register");?>">Registrate</a>
                        o
                        <a href="#" data-toggle="modal" data-target="#login">Ingresa con tu cuenta</a>
                    </h5>
                    </center>
                 <?php
                    if($x = 1){
                        break; 
                    }
                     $x++;
                    }
                 }else{
                 foreach ($jobs as $job){
                 ?>
                  <div class="jobs panel panel-default" id="miniJob-<?php echo $job['key_aviso'];?>">
                    <div class="panel-body">
                        <h4 class="title"><?php echo strtoupper($job['title']);?></h4>
                        <p class="title">
                            <?php
                            echo ucfirst($job['description']);
                            ?>
                        </p>
                        <hr/>
                        <li class="title">
                            Renta ofrecida :
                            <?php 
                            echo "$".number_format($job['remuneration'],0,',','.')." p/h";
                            ?>
                        </li>
                        <li class="title">
                            Lugar de trabajo :
                            <?php 
                            echo ucfirst($job['nombre_comuna']).", ";
                            echo ucfirst($job['region_nombre']);
                            ?>
                        </li>
                        <li class="title">
                            Se necesitan :
                            <?php 
                            switch ($job['genero']){
                                case 1: $genero = "Hombres"; break;
                                case 2: $genero = "Mujeres"; break;
                                case 3: $genero = "Hombres y Mujeres"; break;
                            }
                            echo $genero;
                            ?>
                        </li>
                        <li class="title">
                            Horario :
                            <?php 
                            switch ($job['horario']){
                                case 1: $horario = "Mañana"; break;
                                case 2: $horario = "Tarde"; break;
                                case 3: $horario = "Noche"; break;
                            }
                            echo $horario;
                            ?>
                        </li>
                        <li class="title">
                            Trabajo por :
                            <?php 
                            switch ($job['tipo_aviso']){
                               case 1: $tipo_aviso = "Horas"; break;
                               case 2: $tipo_aviso = "Días"; break;
                               case 3: $tipo_aviso = "Semanas"; break;
                            }
                            echo $tipo_aviso;
                            ?>
                        </li>
                    </div>
                      <div class="panel-footer" style="background-color: #fff;">
                        <img src="<?php echo base_url("asset/img/user_avatar")."/".$job['avatar'];?>" 
                             style="
                             max-height: 40px;
                             max-width: 40px;
                             border: 1px solid #fbfbfb;
                             box-shadow: 0px 1px 1px #d0d4d9;
                             ">
                        &nbsp;
                        <?php 
                        echo strtoupper($job['company_name']);
                        ?>
                        &nbsp;
                        /
                        &nbsp;
                        <small>
                            Publicado el 
                        <?php 
                        $fecha_pub = date('d-m-Y',  strtotime($job['created_at']));
                        echo $fecha_pub;
                        ?>
                        </small>
                        &nbsp;
                        /
                        &nbsp;
                        <small>
                            Compartir 
                            <!--<a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo base_url("jobs")."#miniJob-".$job['key_aviso'];?>&p[title]=<?php echo strtoupper($job['title']);?>&p[summary]=<?php echo strtoupper($job['description']);?>&p[images][0]=<?php echo base_url("asset/img/logo-cl.png");?>">-->
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url();?>jobs<?php echo "#miniJob-".$job['key_aviso'];?>/&t=<?php echo ucfirst($job['title'])." | ".  ucfirst($job['description']);?>">
                                <i class="fa fa-facebook fa-lg"></i>
                            </a>
                        </small>
                        &nbsp;
                        <br/>
                        <a  style="margin-top:3px;"
                            onclick="aplicar('<?php echo $job['key_aviso']; ?>')" id="job_<?php echo $job['key_aviso'];?>" class="btn-block btn-primary btn-sm btn">
                            <i class="fa fa-lg fa-check-circle"></i>
                            Aplicar
                        </a>
                    </div>
                  </div>
                 <?php
                 }
                }
             }else{
                 echo "Todavía no se publican MiniJobs";
             }
             ?>
            </div>
            <div class="col-md-2">
            
            </div>
        </div>
    </div>
    
</div>

<style type="text/css">

    .title{
        font-weight:200;
        color: #47525d;
    }
    .jobs:hover{
        box-shadow: 0 0 5px rgba(0,0,0,.2);
    }
    
</style>
<script type="text/javascript">
    function aplicar(ku){
        $.get("<?php echo base_url();?>jobs/aplicar/"+ku, 
        function(data, status){
            
            if(data == "success"){
                $("#job_"+ku+"").addClass('disabled');
                $("#job_"+ku+"").html('<i class="fa fa-lg fa-check-circle"></i> Aplicado');
            }
            else if(data == "error"){
                alert("Ya postulaste a este MiniJobs");
                $("#job_"+ku+"").addClass('disabled');
                $("#job_"+ku+"").html('<i class="fa fa-lg fa-check-circle"></i> Ya postulaste a este MiniJobs');
            }else{
                window.location.href="<?php echo base_url("oauth/in?return=").  current_url();?>";
            }
        });
    }
</script>