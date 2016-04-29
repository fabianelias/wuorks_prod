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
                    <img src="http://www.wuorks.com/asset/img/logo-cl.png" class="l-2" style="background-size: 225px 40px; margin-top:-15px; width:180px; max-height:55px;">
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
                        <a class="page-scroll" href="<?php echo base_url(); ?>oauth/in">Inicia sesión</a>
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

<style>
    .hnav{
        border: 1px solid #2895F1;
        border-radius: 4px;
        color: #2895F1;
        padding: -10px;
    }
    
</style>