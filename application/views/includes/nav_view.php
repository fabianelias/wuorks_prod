<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background-color: #fff; 
    box-shadow: 0px 1px 1px #d0d4d9;">
    <div class="container" style="margin-top: 8px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>">
                    <!--<img src="<?php echo base_url(); ?>asset/img/logo-blanco.png" style="margin-top: -15px;height: 50px; opacity:.6;">-->
                    <img src="<?php echo base_url(); ?>asset/img/logo-cl.png" class="l-2" style="background-size: 225px 40px; margin-top:-15px; width:180px; max-height:55px;">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php 
                if($this->session->userdata('id_user')){
                ?>
                    <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <center>
                            <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $this->session->userdata('avatar');?>"
                                style="max-height:50px; max-width: 50px; border: 2px solid #fbfbfb;box-shadow: 0px 1px 1px #d0d4d9;"
                                class="img-responsive">
                        </center>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url(); ?>profile">
                            <?php echo $this->session->userdata('username');?>
                        </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url(); ?>logout">Cerrar sesión</a>
                    </li>
                </ul>
                <?php
                }else{
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li style="width:30px; height: 30px;">
                    </li>
                    <li>
                        <a class="page-scroll" href="#" data-toggle="modal" data-target="#login">Inicia sesión</a>
                        <a class="hidden page-scroll" href="<?php echo base_url(); ?>oauth/in">Inicia sesión</a>
                    </li>
                    <li>
                        <a class="hnav" href="<?php echo base_url(); ?>oauth/register">Registrate</a>
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
              <a href="#" class="" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></a>
          </center>
      </div>
    </div>
  </div>
</div>

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
</style>