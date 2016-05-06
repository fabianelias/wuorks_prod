<section class="container" style="height: 500px; margin-top:100px; background: url('./asset/img/banner-portada.png') center;" >
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 text-center">
            <br/>
            <h2 class="title">NUNCA FUE TAN FÁCIL ENCONTRAR A UN PROFESIONAL</h2>
            <br>
            <form name="form-search" id="form-search" action="<?php echo base_url(); ?>search" method="GET">
            <div class="form-group col-lg-1">&nbsp;</div>
            <div class="form-group col-lg-5">
                 <input type="hidden"  name="utf8" id="utf8" value="✓">
                 <input name="work_area" id="work_area" class="form-control form-search" value="" placeholder="¿Qué profesional necesitas? ej: Profesor, soldador...">
            </div>
            <div class="form-group col-lg-3">
                <select name="work_region" id="work_region" class="form-control form-search">
                    <?php
                    
                    foreach ($regiones as $reg){
                        echo '<option value="'.$reg["id_region"].'">'.$reg["nombre"].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-lg-2">
                <input type="submit" name="btn-search" id="btn-search" class="btn btn-primary" value="Buscar"
                style="border-radius:0px; border:none; height:50px; width:100%; background-color: #4a90e2;
                border-color: #4a90e2;
                letter-spacing: 2px;
                line-height: 17px; color:#fff;"       
                >
            </div>
            <div class="form-group col-lg-1">&nbsp;</div>
        </form>
        </div>
    </div>
</section>
<section class="bg-info">
    <div class="container-fluid">
        <div class="row  text-center">
        <div class="col-lg-12">
            <br/>
            <h2 class="title">¿COMO FUNCIONA?</h2>
            <br/>
        </div>
            <div class="col-lg-4 ">
                <h4 class="sub-title">SABEMOS QUE ERES MUY BUENO</h4>

    Consigue ingresos extra haciendo lo que mejor sabes, create un perfil, detalla toda tu experiencia y listo.<br/><br/>
    <i class="fa fa-3x fa-thumbs-o-up icon-home"></i>
            </div>
            <div class="col-lg-4">
                <h4 class="sub-title">NECESITAS A UN PROFESIONAL</h4>

                Necesitas un profesional, busca y elije en el mapa al que mejor te parezca.<br/><br/><br/>
                <i class="fa fa-3x fa-check icon-home"></i>
            </div>
            <div class="col-lg-4">
                <h4 class="sub-title">VALORA EL TRABAJO DE UN WUOKERS</h4> 

    Si recibes el servicio de un wuokers ! valoralo <br/><br/><br/>
    <i class="fa fa-2x icon-home fa-star-o"></i>
    <i class="fa fa-3x icon-home fa-star-o"></i>
    <i class="fa fa-2x icon-home fa-star-o"></i>
            </div>
        </div>
        </div>
        <br/>
    </section>
<section class="" style="background-color:#fff;">
    <div class="container-fluid">
        <div class="row  text-center">
        <div class="col-lg-12">
            <br/>
            <h2 class="title">¿POR QUE USAR WUORKS?</h2>
            <br/>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-6 col-lg-offset-2" style="padding-top:120px;">
                <h4 class="sub-title">¡Reputación profesional!</h4>
                Elegir a la persona correcta es dificil, por eso elige a los mejores wuokers, valora y comenta su trabajo en tiempo real.<br/><br/>
                <i class="fa fa-3x fa-smile-o icon-home"></i>
            </div>
            <div class="col-lg-4">
                <img src="<?php echo base_url(); ?>asset/img/img-home-2.png" style="opacity: 0.8;">
            </div>
        </div>
        <div class="col-lg-12">
            <hr/>
             <!-- -->
            <div class="col-lg-4 text-center">
                <img src="<?php echo base_url(); ?>asset/img/img-home.png" style="opacity: 0.8;">
            </div>
             <div class="col-lg-6" style="padding-top:120px;">
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
        color: #47525d;
    }
    .sub-title{
        color:#47525d;
        line-height: 1.4;
        font-size: 20px;
        font-weight: 300;
    }
    .icon-home{
        color:#00ACE5;
    }
</style>