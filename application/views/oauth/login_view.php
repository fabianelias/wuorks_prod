<div class="separator"style="height: 80px;">
    
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 login text-center">
            <h4 class="title">INICIAR SESIÓN</h4>
            <hr/>
            <form action="<?php echo base_url(); ?>oauth/login" method="POST" accept-charset="UTF-8" role="form">
                <div id="contEm" class="input-group <?php if(form_error('email')){ echo 'has-error';}?>">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                    <input name="email" id="email" type="text" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email" aria-describedby="basic-addon1">                   
                </div> 
                <div class="text-danger"><?php echo form_error('email');?></div>
                <br>
                <div id="contPass" class="input-group <?php if(form_error('password')){ echo 'has-error';}?>">
                         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
                         <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1">
                </div>
                <div class="text-danger"><?php echo form_error('password');?></div>
                <br/>
                <input type="submit" class="btn btn-primary btn-block" value="INGRESAR">
                <hr/>
                <?php if (isset($_GET['return'])) { 
                        $url_destino = $_GET['return'];
                ?>
                        <input name="url_destino" type="hidden" value="<?php echo $url_destino; ?>">
                <?php } ?>
            </form>
            <small>
                <a href="<?php echo base_url(); ?>wuokers/pass" class="pull-left">Olvidé mi contraseña</a>
                <a href="<?php echo base_url(); ?>oauth/register/" class="pull-right">Crear cuenta</a>
            </small>
            <br/>
            <?php  
            if($this->session->flashdata('error_2')){
            ?>
              <div class="alert alert-info" role="alert">
                <a href="javascript:;" class="alert-link"><?php echo $this->session->flashdata('error_2') ?></a>
              </div>
            <?php
            }
            ?>
            <?php  
            if($this->session->flashdata('error_1')){
            ?>
              <div class="alert alert-danger" role="alert">
                <a href="javascript:;" class="alert-link"><?php echo $this->session->flashdata('error_1') ?></a>
              </div>
            <?php
            }
            ?>
            <form action="<?php echo base_url(); ?>oauth/facebook" method="post" accept-charset="UTF-8" role="form">
                <div class="form-group">
                    <button class="btn buttons-row btn-oauth btn-block" type="submit"><i class="fa fa-facebook"></i> Ingresar con Facebook</button>                            
                </div>
            </form>
        </div>
    </div>
    <br/>
</div>
<br/>
<style type="text/css">
    .login{
            border: 1px solid #e8e8e8;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 0 rgba(0,0,0,.25);
    }
    .btn-oauth{
        background:#3a5289;
        color:#fff;
    }
    .btn-oauth:hover{
        background:#3a5289;
        color:#fff;
        opacity: 0.9;
    }
    .buttons-row{
    border-bottom: 3px solid #324777;
    }
    .title{
        font-weight: 300;
        color: #47525d;
    }
    
    
</style>