<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background-color: #fff; min-height: 70px;">
   
    <div class="container" style="margin-top: 0px;">
        <center>
            <a class=" page-scroll img-responsive" href="<?php echo base_url("hello"); ?>" style="/* margin-left: 40%;margin-right: 48%;*/">
            <img class="small " alt="Wuorks" src="<?php echo base_url(); ?>asset/img/icon-100-100px.jpg" style="margin-top:4px; width:60px; max-height:60px;">
            </a>
        </center>
    </div>
        
        <div class="hidden collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php 
            //MENU USUARIO CONECTADO
            if(!$this->session->userdata('id_user')){
            ?>
                <ul class="nav navbar-nav navbar-right">
                <li class=""style="/*border-left: 1px solid #e7e7e7;margin-right: 3px;*/">
                    <center>
                        <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $this->session->userdata('avatar');?>"
                            style="height:35px;width:35px; margin-top:9px;"
                            class="img-responsive img-circle">
                    </center>
                </li>
                <li style="border-right: 1px solid #e7e7e7; padding-left: 1px; padding-right:5px;">
                    <a class="page-scroll hidden-sm hidden-xs username" href="<?php echo base_url(); ?>profile"
                    data-toggle="tooltip" data-placement="bottom" title="Ver perfil" 
                    style="padding-left: 5px;padding-right: 5px;"
                    >
                        <?php echo $this->session->userdata('username');?>
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <a class="page-scroll hidden-md hidden-lg text-center username" href="<?php echo base_url(); ?>profile">
                        <?php echo $this->session->userdata('username');?>
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </li>

            </ul>
            <?php
            }else{
                //MENU USUARIO NO CONECTADO
            ?>
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
    .btn-fb {
        color: #fff !important;
        background-color: #4a90e2;
        border-color: #4a90e2;
        letter-spacing: 2px;
        line-height: 17px;
    }
    .username{
        font-weight: 300;
    }
</style>