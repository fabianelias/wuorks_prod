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
<?php
    $i = $infoUser["data"][0];
?>
<div class="alert alert-info text-center navbar-fixed-top" style="margin-top:65px;" role="alert">
    <div class="container">
        <a class="pull-left" href="<?php echo base_url("profile/jobs");?>" style="text-decoration:none;">
        <i class="fa fa-arrow-left"></i> volver
        </a>
        <p class="hidden-md hidden-lg">
            Wuokers recomendados
            <i class="fa fa-certificate"></i>
        </p>
        <p class="hidden-sm hidden-xs">
        Hola <?php echo ucfirst($i['name']);?>, estos son los Wuokers recomendados para ti
        <i class="fa fa-certificate"></i>
        </p>
    </div>
</div>
<div class="container" style="margin-top: 20px;">
    
    <div class="row">
        <div class="col-md-12">
            <br/>
            
            <h1></h1>
        </div> 
        <div class="col-md-3">
            <h5 class="title">
                Parametros de busqueda
                <i class="fa fa-search"></i>
            </h5>
           <ul class="list-group">
                <li class="list-group-item">
                    <small>Titulo: <br/></small>
                    <?php echo ucfirst($job[0]['title']);?>
                </li>
                <li class="list-group-item">
                    <small>Descripción: <br/></small>
                    <?php echo ucfirst($job[0]['description']);?>
                </li>
                <li class="list-group-item">
                    <small>Tipo aviso: <br/></small>
                    <?php
                    switch ($job[0]['tipo_aviso']){
                        case 1: $tipo_aviso = "HORAS"; break;
                        case 2: $tipo_aviso = "DÍAS"; break;
                        case 3: $tipo_aviso = "SEMANA"; break;
                    }
                    echo '"'.$tipo_aviso.'"'; 
                    ?>
                </li>
                <li class="list-group-item">
                    <small>Genero: <br/></small>
                    <?php
                    switch ($job[0]['genero']){
                        case 1: $genero = "HOMBRES"; break;
                        case 2: $genero = "MUJERES"; break;
                        case 3: $genero = "AMBOS"; break;
                    }
                    echo '"'.$genero.'"'; 
                    ?>
                </li>
                <li class="list-group-item">
                    <small>Horario: <br/></small>
                    <?php
                    switch ($job[0]['horario']){
                        case 1: $horario = "MAÑANA"; break;
                        case 2: $horario = "TARDE"; break;
                        case 3: $horario = "NOCHE"; break;
                    }
                    echo '"'.$horario.'"'; 
                    ?>
                </li>
                <li class="list-group-item">
                    <small>Zona: <br/></small>
                    <?php
                    switch ($job[0]['zona']){
                        case 1: $zona = "COMUNA"; break;
                        case 2: $zona = "REGIÓN"; break;
                        case 3: $zona = "CHILE"; break;
                    }
                    echo '"'.$zona.'"'; 
                    ?>
                </li>
          </ul>
        </div> 
        <div class="col-md-9">
            <h5 class="title">
                Resultados <?php echo count($matches['users']);?>
                <i class="fa fa-certificate"></i>
            </h5>
           <?php
           if(!empty($matches['users'])){
               foreach($matches['users'] as $mat){
               ?>
             <div class="col-sm-6 col-md-4" >
                <div class="thumbnail" style="padding:0px;">
                    <div class="" style="width:100%; height: 220px;">
                        <img src="<?php echo base_url()."asset/img/user_avatar/".$mat['avatar'];?>" alt="" style="width:100%;height: 100%;">
                    </div>  
                <div class="caption">
                    <h3 class="title"><?php echo $mat['username'];?></h3>
                  <p><?php echo $mat['name_prof'];?></p>
                  <p class="title">
                      Valoraciones: 
                  <?php
                    for ($v = 1; $v < 6; $v++) {
                        if ($v <= $mat['rating']) {
                            echo '<i class="fa fa-star" style="color:#5f93e7;"></i>';
                        } else {
                            echo '<i class="fa fa-star-o" style="color:#5f93e7;"></i>';
                        }
                    }
                  ?> 
                  </p>
                  <p>
                      <a href="#" class="btn btn-primary hidden" role="button">Contratar</a> 
                      <a href="<?php echo base_url()."wuokers/u/".$mat['username']."/".$mat['name_prof']."/".$mat['key_prof']."?wk=".$mat['wuorks_key'];?>" 
                         class="btn btn-default btn-block btn-sm" role="button" target="_blank">
                          Ver su perfil
                      </a>
                  </p>
                </div>
                </div>
              </div>
               <?php
               }
           }else{
              echo  "<center><h3 class='title'>No se encontraron wuokers que calzen con el puesto"
                    ."<hr/><small>No te preocupes igualmente llegaran Wuokers a tu aviso.</small></h3>"
                    . "</center>";
           }
           ?>
        </div> 
    </div>
    
</div>

<style type="text/css">

    .title{
        font-weight: 200;
        color: #47525d;
    }
    
    
</style>
