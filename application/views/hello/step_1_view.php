<section class="" style="background-color:#fff;">
    <div class="container">
        <div class="row" style="height: 450px;margin-top:80px;background-color: #fff;/*background: url('./asset/img/banner-portada.png') center;*/">
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-4 col-md-4 text-center hidden-sm hidden-xs">
                    <center>
                        <img src="<?php echo base_url(); ?>asset/img/portfolio/step-1.jpg"
                            style="height:100%;width:100%; margin-top:-35px;"
                            class="img-responsive" >
                    </center>
                </div>
                <div class="col-lg-6 col-md-6 col-lg-offset-2  col-md -offset-2 text-center">
                    <br/>
                    <center>
                        <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $this->session->userdata('avatar');?>"
                            style="height:160px;width:160px; margin-top:9px;"
                            class="img-responsive img-circle">
                    </center>
                    <h2 class="title">Hola <?php echo $this->session->userdata('username');?></h2>
                    <br>
                    <h3 class="sub-title">A continuación te daremos una breve explicación de como comenzar con Wuorks.</h3>
                </div>
            </div>
            <div class="col-lg-12 text-center" style="width:100%;color:#999;">
                <i class="fa fa-circle"></i> &nbsp;
                <i class="fa fa-circle-o"></i> &nbsp;
                <i class="fa fa-circle-o"></i> &nbsp;
                <br/>
            </div>
        </div>
    </div>
    
    <div class="text-center bg-primary" style="width: 100%; height: 70px;position:absolute; bottom: 0px;">
        <center>
            <a class="page-scroll titlea" href="<?php echo base_url("hello/step_2")?>" style="line-height:70px;">
                Comenzar
                <i class="fa fa-arrow-right fa-lg"></i>
            </a>
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