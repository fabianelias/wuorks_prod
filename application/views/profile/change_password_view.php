<div class="separator"style="height: 80px;">
    
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 change_pass text-center">
            <h3 class="title">Cambio de contraseña</h3>
            <form name="form-change-pass" id="form-change-pass" method="POST" action="<?php echo base_url(); ?>profile/change_passw">
                <div class="form-group-lg">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Nueva contraseña">
                    <div class="text-danger"><?php echo form_error('password');?></div>
                    <br/>
                    <input name="password_re" id="password_re" type="password" class="form-control" placeholder="Nueva contraseña">
                    <div class="text-danger"><?php echo form_error('password_re');?></div>
                    <hr/>
                    <input type="submit" name="change_pass" id="change_pass" class="btn btn-block btn-primary" value="Cambiar clave">
                    <br/>
                </div>
            </form>
        </div>
    </div>
    
</div>
<style type="text/css">
    .change_pass{
            border: 1px solid #e8e8e8;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 0 rgba(0,0,0,.25);
    }
    .title{
        font-weight: 300;
        color: #47525d;
    }
    
    
</style>