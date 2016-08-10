<section class="" style="background-color:#fff;">
    <script src="<?php echo base_url("asset/js/regiones.js");?>"></script>
    <div class="container">
        <div class="row" style="height: 450px;margin-top:80px;background-color: #fff;/*background: url('./asset/img/banner-portada.png') center;*/">
            
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-4 col-md-4 text-center hidden-sm hidden-xs">
                    <center>
                        <img src="<?php echo base_url(); ?>asset/img/img-register.jpg"
                            style="height:100%;width:100%; margin-top:-35px;"
                            class="img-responsive" >
                    </center>
                </div>
                <div class="col-lg-6 col-md-6 col-lg-offset-2  col-md -offset-2 text-center">
                    <h2 class="sub-title text-center">
                       Eso es todo <?php 
                       $names = explode(" ", $this->session->userdata("name"));
                       echo ucfirst($names[0]);?>
                       <br/>
                       <i class="fa fa-certificate"></i>
                        Ya estás listo para continuar en wuorks<br>
                    </h2>
                    <h5 class="sub-title text-justify" style="font-size:15px;">
                        - Cada vez que contacten tus servicios, se te notificara al
                        email ingresado al momento de registrarte en wuorks.cl
                        <hr>
                    </h5>
                    <h2 class="sub-title text-center" style="font-size:18px;">
                       ¿Que deseas hacer?
                    </h2>
                    <?php 
                    if($this->session->userdata("user_type") == 1){
                        //profesional
                    ?>
                    <a class="btn btn-primary btn-block" href="<?php echo base_url("hello/ready/1");?>" style="line-height:40px;">
                        Crear mi primera profesión
                        <i class="fa fa-arrow-right fa-lg"></i>
                    </a>
                    <hr/>
                    <a class="btn btn-warning btn-block" href="<?php echo base_url("hello/ready/2");?>" style="line-height:40px;">
                        Buscar un wuokers
                        <i class="fa fa-search fa-lg"></i>
                    </a>
                    <?php 
                    }else{
                        //Empresa
                    ?>
                    <a class="btn btn-primary btn-block" href="<?php echo base_url("hello/ready");?>" style="line-height:40px;">
                        Crear mi perfil como empresa
                        <i class="fa fa-arrow-right fa-lg"></i>
                    </a>
                    <hr/>
                    <a class="btn btn-warning btn-block" href="<?php echo base_url("hello/ready/2");?>" style="line-height:40px;">
                        Buscar un wuokers
                        <i class="fa fa-search fa-lg"></i>
                    </a>
                    <?php 
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="width:100%;color:#999;">
                <i class="fa fa-circle-o"></i> &nbsp;
                <i class="fa fa-circle-o"></i> &nbsp;
                <i class="fa fa-circle-o"></i> &nbsp;
                <i class="fa fa-circle"></i> &nbsp;
                <br/>
            </div>
        </div>
    </div>
    
    <div class="hidden text-center bg-primary" style="width: 100%; height: 70px;position:absolute; bottom: 0px;">
        <center>
            <?php 
            if($this->session->userdata("user_type") == 1){
                //profesional
            ?>
            <a class="page-scroll titlea" href="<?php echo base_url("hello/ready/1");?>" style="line-height:70px;">
                Crear mi primera profesión
                <i class="fa fa-arrow-right fa-lg"></i>
            </a>
            <?php 
            }else{
                //Empresa
            ?>
            <a class="page-scroll titlea" href="<?php echo base_url("hello/ready/1");?>" style="line-height:70px;">
                Crear mi perfil como empresa
                <i class="fa fa-arrow-right fa-lg"></i>
            </a>
            <?php 
            }
            ?>
        </center>
    </div>
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
        color: #fbfbfb;
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
<script type="text/javascript">
    document.body.style.backgroundColor="#ffffff";
</script>