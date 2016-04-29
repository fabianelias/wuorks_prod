<div class="separator"style="height: 80px;">
    
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 login text-center">
            <h4 class="title">Recuperar contraseña</h4>
            <hr/>
            <form name="form-pass" action="<?php echo base_url(); ?>wuokers/password" method="POST">
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Ingresa tu correo">
                    <div class="text-danger"><?php echo form_error('email');?></div>
                </div>
                <hr/>
                <input type="submit" id="btn-rating" name="btn-rating" class="btn btn-sm btn-primary" value="Recuperar">
            </form>
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
              <div class="alert alert-warning" role="alert">
                <a href="javascript:;" class="alert-link"><?php echo $this->session->flashdata('error_1') ?></a>
              </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<br/>
<style type="text/css">
    .login{
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