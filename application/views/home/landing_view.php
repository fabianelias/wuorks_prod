<section class="" style="background-color:#fff;">
    <div class="container">
        <div class="row" style="height: 450px;margin-top:100px;background-color: #fff;background: url('./asset/img/banner-portada.png') center;">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <br/>
                <h2 class="title">NUNCA FUE TAN FÁCIL ENCONTRAR A UN PROFESIONAL</h2>
                <br>
                <form name="form-search" id="form-search" action="<?php echo base_url(); ?>search" method="GET">
                <div class="form-group col-lg-1">&nbsp;</div>
                <div class="form-group col-lg-5 col-md-5 col-sm-5">
                     <input type="hidden"  name="utf8" id="utf8" value="✓">
                     <input name="work_area" id="work_area" class="form-control form-search" value="" placeholder="¿Qué profesional necesitas? ej: Profesor, soldador...">
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3">
                    <select name="work_region" id="work_region" class="form-control form-search">
                        <?php

                        foreach ($regiones as $reg){
                            echo '<option value="'.$reg["id_region"].'">'.$reg["nombre"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-2 col-md-2 col-sm-3">
                    <button type="submit" name="btn-search" id="btn-search" class="btn btn-wuorks" value="Buscar"
                    style="border-radius:0px; border:none; height:50px; width:100%; 
                    letter-spacing: 2px;
                    line-height: 17px; color:#fff;">
                        Buscar
                    </button>
                    <input type="hidden"  name="token" id="utf8" value="<?php echo md5('token_security');?>">
                </div>
                <div class="form-group col-lg-1">&nbsp;</div>
            </form>
            </div>
    </div>
    </div>
    
    <div class="hidden-xs hidden-sm text-center" style="/*position:absolute; bottom: 50px;*/left: 48%;">
        <center>
            <a class="page-scroll titlea" href="#how" style="bottom:0px;">
                Saber más<br/>
                <i class="fa fa-angle-double-down fa-2x"></i>
            </a>
        </center>
    </div>
</section>
<section class="" style="background-color:#fff; border-top: 1px solid #eee;">
    <div class="container">
        <div class="row  text-center">
        <div class="col-lg-12 title1" id="how">
            <br/>
            <h2 class="title" style="font-size: 45px; font-weight: 300;">Cómo funciona
                <br/>
                <small class="title1" style="font-size: 25px; font-weight: 300;">
                    Busca y encuentra un profesional cerca de ti
                    <br/> 
                </small>
                <br/>
            </h2>
        </div>
            <div class="col-lg-12"><br/></div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 title1">
                <img src="<?php echo base_url();?>asset/img/pass1.png">
                <h4 class="sub-title">
                Sabemos que eres muy bueno
                </h4>
                Consigue ingresos extra haciendo lo que mejor sabes, 
                crea un perfil de tu servicio, detalla toda tu experiencia y listo.<br/>
                <i class=" hidden fa fa-3x fa-thumbs-o-up icon-home"></i>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 title1">
                <img src="<?php echo base_url();?>asset/img/pass2.png">
                <h4 class="sub-title">
                Necesitas un profesional
                </h4>
                Busca y selecciona en el mapa el Wuokers más cercano o mejor evaluado cerca de ti.<br/>
                <i class=" hidden fa fa-3x fa-check icon-home"></i>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 title1">
                <img src="<?php echo base_url();?>asset/img/pass3.png">
                <h4 class="sub-title">
                Valora el trabajo de un Wuokers
                </h4> 
                Si recibes el servicio de un wuokers ! valoralo <br/>
            </div>
        </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div class="hidden-xs hidden-sm text-center">
        <center>
            <a class="page-scroll titlea" href="#why" style="bottom:0px;">
                ¿Por que usarlo?<br/>
                <i class="fa fa-angle-double-down fa-2x"></i>
            </a>
        </center>
        <br/>
       <br/>
    </div>
    <br/>
    <hr/>
</section>
<section class="" style="background-color:#fff;">
    <div class="container-fluid" id="why">
        <div class="row  text-center">
        <div class="col-lg-12">
            <br/>
            <h2 class="title" style="font-size: 45px; font-weight: 300;">¿Por que usar Wuorks?</h2>
            <br/>
        </div>
        <div class="col-lg-12">
            <div class="hidden-sm hidden-xs" style="padding-top:80px;"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-lg-offset-2 title1">
                <h4 class="sub-title">¡Reputación profesional!</h4>
                Elegir a la persona correcta es dificil, por eso elige a los mejores wuokers, valora y comenta su trabajo en tiempo real.<br/><br/>
                <i class="fa fa-3x fa-smile-o icon-home"></i>
            </div>
            <div class="col-lg-4 hidden-sm hidden-xs">
                <img src="<?php echo base_url(); ?>asset/img/img-home-2.png" style="opacity: 0.8;">
            </div>
        </div>
        <div class="col-lg-12">
            <hr/>
             <!-- -->
            <div class="col-lg-4 col-md-4 text-center hidden-sm hidden-xs">
                <img src="<?php echo base_url(); ?>asset/img/img-home.png" style="opacity: 0.8;">
            </div>
             <div class="hidden-sm hidden-xs" style="padding-top:120px;"></div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 title1">
                <h4 class="sub-title">Tienes que hacerte ver</h4>
                Mostrar tus servicios de forma transparente, que te califiquen, ganar un dinerillo extra y mucho más... 
                <br/>
                <br/>
                <i class="fa fa-3x fa-eye icon-home"></i>
            </div>
        </div>  
        </div>
        </div>
        <br/>
    </section>
<section class="bg-primary">
    <div class="container-fluid">
        <div class="row  text-center">
        <div class="col-lg-12">
            <br/>
            <h2 class="title" style="color:#FFF;">NO ESPERES MÁS</h2>
            <br/>
        </div>
            <div class="col-lg-12" >
                <h4 class="sub-title" style="color:#fff;">
                <?php
                if(!$this->session->userdata("id_user")){
                ?>
                  <a href="<?php echo base_url(); ?>oauth/register" style="border: 1px solid #fff; border-radius: 4px; color: #FFF;padding: 8px; text-decoration: none;">Registrate gratis</a>       
                <?php
                }else{
                ?>
                ¡Comienza a ganar dinero con que mejor haces!
                <?php
                }
                ?>
                
                </h4>
            </div>
        </div>
        </div>
        <br/>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-search").click(function(){
            $("#btn-search").html('<i class="fa fa-spinner fa-pulse fa-2x" style="color:#fbfbfb;"></i>');
        });
        
        document.body.style.backgroundColor="#ffffff";
    });
</script>
<style>
    .form-search{
        min-height: 50px;
        border: 1px solid #C5C5C5;
        border-radius: .25rem;
        -webkit-appearance: none;
        outline: 0;
        color: #555459;
        margin-right: 10px;
    }
    .title{
        line-height: 1.4;
        font-size: 28px;
        font-weight: 300;
        color: #4b5966;
    }
    .title1{
        line-height: 22px;
        font-weight: 300;
        color: #b6b6b6;
    }
    .titlea{
        line-height: 22px;
        font-weight: 300;
        color: #b6b6b6;
        text-decoration: none;
    }
    .titlea:hover{
        line-height: 22px;
        font-weight: 300;
        color: #b6b6b6;
        text-decoration: none;
    }
    .sub-title{
        color:#4b5966;
        line-height: 1.4;
        font-size: 20px;
        font-weight: 300;
    }
    .icon-home{
        color:#00ACE5;
    }
</style>