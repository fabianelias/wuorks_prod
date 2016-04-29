<div class="separator"style="height: 20px;">
    
</div>
<div class="container" style="margin-top: 30px;" style="">
    <div class="row">
        <div class="col-md-5 col-lg-5">
          <form action="<?php echo base_url(); ?>oauth/registerUser" method="post" accept-charset="UTF-8" role="form">
              <br/>
              <center>
              <h3 class="title">¡Registrate gratis!</h3>
              </center>
                <br/>
                <div class="form-input checksenlinea">
                    <div class="pull-right">
                        <label style="color:#fff;font-size: 13px;font-weight: 300;"> Soy empresa </label>&nbsp;&nbsp;&nbsp; 
                        <input type="radio" name="typeUser" id="typeUser" value="2" checked=""> 
                    </div>
                    <div class="pull-left">
                        <label style="color:#fff;font-size: 13px;font-weight: 300;"> Soy profesional </label>&nbsp;&nbsp;&nbsp; 
                        <input type="radio" name="typeUser" id="typeUser" value="1" checked=""> 
                    </div>
                    <br/>
                    <hr/>
                </div>
               <div class="form-group">
                   <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" required="">
                    <div class="text-danger"><?php echo form_error('email');?></div>
                    <br/>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="<?php echo set_value('name'); ?>" required="">
                    <div class="text-danger"><?php echo form_error('name');?></div>
                    <br/>
                    <input type="text" name="last_name_p" id="last_name_p" class="form-control" placeholder="Apellido paterno" value="<?php echo set_value('last_name_p'); ?>" required="">
                    <div class="text-danger"><?php echo form_error('last_name_p');?></div>
                    <br/>
                    <input type="text" name="last_name_m" id="last_name_m" class="form-control" placeholder="Apellido materno" value="<?php echo set_value('last_name_p'); ?>" required="">
                    <div class="text-danger"><?php echo form_error('last_name_m');?></div>
                    <br/>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required="">
                    <div class="text-danger"><?php echo form_error('password');?></div>
                    <br/>
                    <input type="password" name="password_re" id="password_re" class="form-control" placeholder="Repite la contraseña" required="">
                    <div class="text-danger"><?php echo form_error('password_re');?></div>
                    <br/>
                    <div class="form-input checksenlinea">
                        <div class="pull-right">
                            <label style="color:#fff;font-size: 13px;font-weight: 300;"> Soy mujer </label>&nbsp;&nbsp;&nbsp; 
                            <input type="radio" name="gender" id="gender" value="2" checked=""> 
                        </div>
                        <div class="pull-left">
                            <label style="color:#fff;font-size: 13px;font-weight: 300;"> Soy hombre </label>&nbsp;&nbsp;&nbsp; 
                            <input type="radio" name="gender" id="gender" value="1" checked=""> 
                        </div>
                        <br/>
                        <hr/>
                    </div>
                    <input type="checkbox" class="btn-warning" name="notices" id="notices"  checked=""> 
                    <label style="color:#fff;font-size: 13px;font-weight: 300;">Deseo recibir noticias*</label>
                    <br/>
                    <input type="submit" name="register" id="register" class="btn btn-primary btn-block " style=""value="Registrarme">
               </div>
            </form> 
            <!--
            <form action="<?php echo base_url(); ?>oauth/facebook" method="post" accept-charset="UTF-8" role="form">
                <div class="form-group">
                    <button class="btn buttons-row btn-oauth btn-block" type="submit">
                        <i class="fa fa-facebook "></i>
                        &nbsp;
                        Ingresa con Facebook
                    </button>                            
                </div>
            </form>
            -->
        </div>
        <div class="col-lg-1">
            &nbsp;
        </div>
        <div class="col-lg-6 img-responsive hidden-xs hidden-sm" style="background:#fff;">
            <img src="<?php echo base_url(); ?>asset/img/img-register.jpg" style="max-height: 700px;width:auto;">
        </div>
    </div>
    
</div>
<style type="text/css">
    .title{
        font-weight: 300;
        color: #FFF;
        text-transform: uppercase;
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
</style>
<script type="text/javascript">
    document.body.style.backgroundColor="#5f93e7";
</script>