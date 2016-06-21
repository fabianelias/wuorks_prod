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
<?php
    $i = $infoUser["data"][0];
?>
<div class="alert alert-info text-center navbar-fixed-top" style="margin-top:65px;" role="alert">
    <div class="container">
        <a class="pull-left" href="<?php echo base_url("profile/jobs");?>" style="text-decoration:none;">
        <i class="fa fa-arrow-left"></i> volver
        </a>
        <p class="hidden-md hidden-lg">
            Wuokers interesados
            <i class="fa fa-certificate"></i>
        </p>
        <p class="hidden-sm hidden-xs">
        Hola <?php echo ucfirst($i['name']);?>, estos son los Wuokers que han aplicado a tu aviso
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
          </ul>
        </div> 
        <div class="col-md-9">
            <h5 class="title">
                Resultados <?php echo count($job[0]['postulantes']);?>
                <i class="fa fa-certificate"></i>
            </h5>
           <?php
           if(!empty($job[0]['postulantes'])){
               foreach($job[0]['postulantes'] as $mat){
               ?>
             <div class="col-sm-6 col-md-4" >
                <div class="thumbnail" style="padding:0px;">
                    <div class="" style="width:100%; height: 220px;">
                        <img src="<?php echo base_url()."asset/img/user_avatar/".$mat['avatar'];?>" alt="" style="width:100%;height: 100%;">
                    </div>  
                <div class="caption">
                    <h3 class="title"><?php echo $mat['username'];?></h3>
                  <ul class="list-group">
                    <li class="title list-group-item">
                        <i class="fa fa-user"></i>&nbsp;
                        <?php echo strtoupper($mat['name'])." ".strtoupper($mat['last_name_p']);?>
                    </li>
                    <li class="title list-group-item">
                        <i class="fa fa-envelope-o"></i>&nbsp;
                        <?php echo $mat['email']; ?>
                    </li>
                    <li class="title list-group-item">
                        <i class="fa fa-phone"></i>&nbsp;
                        <?php echo $mat['cell_phone_number']; ?>
                    </li>
                    <li class="title list-group-item">
                        <i class="fa fa-phone"></i>&nbsp;(opc)
                        <?php echo $mat['telephone_number']; ?>
                    </li>
                    <li class="title list-group-item">
                        <i class="fa fa-genderless"></i>&nbsp;
                        <?php 
                        switch ($mat['gender']){
                            case 1: $gender = "Hombre";break;
                            case 2: $gender = "Mujer";break;
                        }
                        echo $gender; ?>
                    </li>
                  </ul>
                  <p class="title hidden">
                      Valoraciones: 
                  <?php
                    /*for ($v = 1; $v < 6; $v++) {
                        if ($v <= $mat['rating']) {
                            echo '<i class="fa fa-star" style="color:#5f93e7;"></i>';
                        } else {
                            echo '<i class="fa fa-star-o" style="color:#5f93e7;"></i>';
                        }
                    }*/
                  ?> 
                  </p>
                  <p>
                  </p>
                </div>
                </div>
              </div>
               <?php
               }
           }else{
              echo  "<center><h3 class='title'>Nadie ha postulado a tu aviso todavía."
                    ."<hr/><small></small></h3>"
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
