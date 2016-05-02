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
<div class="alert alert-info text-center" role="alert">
    Hola <?php echo $i['name'];?>, estos son los Wuokers recomendados para ti
    <i class="fa fa-certificate"></i>
</div>
<div class="container" style="margin-top: 20px;">
    
    <div class="row">
        <div class="col-md-12">
           
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
                Resultados
                <i class="fa fa-certificate"></i>
            </h5>
           <?php
           if(!empty($matches)){
               
           }else{
              echo  "No se encontraron wuokers que calzen con el puestos";
           }
           ?>
        </div> 
    </div>
    
</div>

<style type="text/css">

    .title{
        font-weight: 300;
        color: #47525d;
    }
    
    
</style>
