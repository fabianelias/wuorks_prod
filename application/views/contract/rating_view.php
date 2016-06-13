<div class="separator"style="height: 80px;">
    
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 login text-center">
            <h4 class="title">Calificar a <?php echo $name_user; ?></h4>
            <hr/>
            Dejale un comentario:
            <form name="form-rating" action="<?php echo base_url(); ?>rating/ratingexe" method="POST">
                <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Titulo">
                    <div class="text-danger"><?php echo form_error('title');?></div>
                    <br/>
                    <textarea type="text" name="comment" id="comment" class="form-control" placeholder="Comentario"></textarea>
                    <div class="text-danger"><?php echo form_error('comment');?></div>
                    <hr/>
                    Indica, en una escala del 1 al 5 (1: malo, 5: excelente)
                cómo lo valorarías:
                    <br/>
                </div>
                <div class="form-input checksenlinea">
                    <input type="radio" name="valoracion_global" id="valoracion_global" value="1" checked=""> <label> 1 </label>&nbsp;&nbsp;&nbsp; 
                    <input type="radio" name="valoracion_global" id="valoracion_global" value="2" checked=""> <label> 2 </label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="valoracion_global" id="valoracion_global" value="3" checked=""> <label> 3 </label>&nbsp;&nbsp;&nbsp; 
                    <input type="radio" name="valoracion_global" id="valoracion_global" value="4" checked=""> <label> 4 </label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="valoracion_global" id="valoracion_global" value="5" checked=""> <label> 5 </label>&nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="contract" id="contract" value="<?php echo $key_contract."-".$id_service; ?>">
                    <input type="hidden" name="nameuser" id="nameuser" value="<?php echo $name_user; ?>">
                    <input type="hidden" name="type_user" id="type_user" value="<?php echo $type_user; ?>">
                </div>
                <hr/>
                <a href="<?php echo base_url();?>profile/contract" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i>
                    Cancelar
                </a>
                &nbsp;
                <input type="submit" id="btn-rating" name="btn-rating" class="btn btn-md btn-primary" value="Calificar a <?php echo $name_user; ?>">
            </form>
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
