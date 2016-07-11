<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background-color: #fff; min-height: 52px;">
    <?php 
    if($this->session->userdata('id_user')){
        $class = "container-fluid";
    }else{
        $class = "container";
    }
    ?>
    <div class="<?php echo $class; ?>" style="margin-top: 0px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll img-responsive logo" href="<?php echo base_url(); ?>">
                    <!--<img src="<?php echo base_url(); ?>asset/img/logo-blanco.png" style="margin-top: -15px;height: 50px; opacity:.6;">-->
                    <img class="small hidden" alt="Wuorks" src="<?php echo base_url(); ?>asset/img/logo-op-1.png" style="margin-top:-11px; width:155px; max-height:43px;">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php 
                //MENU USUARIO CONECTADO
                if($this->session->userdata('id_user')){
                ?>
                    <ul class="nav navbar-nav navbar-right">
                    <li class=""style="/*border-left: 1px solid #e7e7e7;margin-right: 3px;*/">
                        <center>
                            <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $this->session->userdata('avatar');?>"
                                style="height:35px;width:35px; margin-top:9px;"
                                class="img-responsive img-circle">
                        </center>
                    </li>
                    <li style="border-right: 1px solid #e7e7e7; padding-left: 1px; padding-right:5px;">
                        <a class="page-scroll hidden-sm hidden-xs username" href="<?php echo base_url(); ?>profile"
                        data-toggle="tooltip" data-placement="bottom" title="Ver perfil" 
                        style="padding-left: 5px;padding-right: 5px;"
                        >
                            <?php echo $this->session->userdata('username');?>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <a class="page-scroll hidden-md hidden-lg text-center username" href="<?php echo base_url(); ?>profile">
                            <?php echo $this->session->userdata('username');?>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li style="border-right: 1px solid #e7e7e7; height:50px;">
                        <a class="page-scroll hidden-sm hidden-xs page-scroll" style="top:5px;" href="<?php echo base_url(); ?>?buscar=Wuokers"
                        data-toggle="tooltip" data-placement="bottom" title="Buscar Wuokers">
                            <i class="fa fa-search fa-lg " aria-hidden="true"></i>
                        </a>
                        <a class="hidden-md hidden-lg page-scroll text-center username" href="<?php echo base_url(); ?>?buscar=Wuokers">
                           Buscar Wuokers
                           <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a class="page-scroll hidden-sm hidden-xs page-scroll" style="top:5px;" href="<?php echo base_url(); ?>logout"
                        data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"   
                        >
                            <i class="fa fa-sign-out fa-lg " aria-hidden="true"></i>
                        </a>
                        <a class="hidden-md hidden-lg page-scroll text-center username" href="<?php echo base_url(); ?>logout">
                           Cerrar sesión
                           <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
                <?php
                }else{
                    //MENU USUARIO NO CONECTADO
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li style="width:30px; height: 30px;">
                    </li>
                    <li>
                        <a class="page-scroll" href="#" data-toggle="modal" data-target="#login" style="font-weight: 300;">Inicia sesión</a>
                        <a class="hidden page-scroll" href="<?php echo base_url(); ?>oauth/in">Inicia sesión</a>
                    </li>
                    <li>
                        <a class="hidden-sm hidden-xs" style="
                            color: #fbfbfb;
                            background: #2895f1;
                            padding: 5 20px;
                            margin-top: 9px;
                            border: 1px solid #288feb;
                            border-radius: 50px;
                            font-weight: 300;
                           "
                           href="<?php echo base_url(); ?>oauth/register">Registrate</a>
                        <a class="hidden-lg hidden-md" style="font-weight: 300;" href="<?php echo base_url(); ?>oauth/register">Registrate</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#portfolio">Empleos</a>
                    </li>-->
                </ul>
                <?php
                }
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
</nav>
<?php 
//SOLO SE MUESTRA SI NO EXISTE SESIÓN CREADA
if(!$this->session->userdata('id_user')){  
?>
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" style="margin-top:80px;"role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius:0px">
        <div class="modal-header bg-info" style="background-image:url(<?php echo base_url("asset/img/banner-portada.png")?>);
             background-position-y: 65%;
             background-position-x: 50%; 
             height:150px;
             border-radius:0px;
             ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body text-center">
          <h5><small class="text-uppercase" style="font-weight:200;">Para continuar debes iniciar sesión</small></h5>
          <a class="btn btn-fb btn-lg" 
             style="border-radius:100px; padding: 20px;"
             href="<?php echo base_url(); ?>oauth/facebook">
              <i class="fa fa-facebook"></i>
              INGRESAR CON FACEBOOK
          </a>
          <br/>
          <br/>
          <a style="font-weight:200;" href="<?php echo base_url("oauth/in");?>">Ingresar con tu email</a>
          <br/>
          <h5><small class="text-uppercase" style="font-weight:200;">
                  Registro con tu email o Registro como empresa 
                  <a style="color:#4a4a4a;" href="<?php echo base_url("oauth/register");?>">
                      <strong>
                          aquí
                      </strong>
                  </a>
              </small></h5>
      </div>
      <div class="modal-footer">
          <center>
              <a href="#" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></a>
          </center>
      </div>
    </div>
  </div>
</div>
<?php 
}
?>
<style>
    .hnav{
        border: 1px solid #2895F1;
        border-radius: 4px;
        color: #2895F1;
        padding: -10px;
    }
    .btn-fb {
        color: #fff !important;
        background-color: #4a90e2;
        border-color: #4a90e2;
        letter-spacing: 2px;
        line-height: 17px;
    }
    .username{
        font-weight: 300;
    }
</style>