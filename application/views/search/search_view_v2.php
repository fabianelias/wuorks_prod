<div class="container">
    <div class="container-map row">
        <!-- Section results -->
        <div class="col-md-6 col-sm-12 col-xs-12" id="box-results">
            <input type="hidden" name="wuorks" id="wuorks" value="<?php echo $wuorks; ?>">
            <input type="hidden" name="region" id="region" value="<?php echo $region; ?>">
            <!--Section buscador -->
            <div class="row">
            <div class="col-md-12" style="border-bottom: 1px solid #e7e7e7;/*margin-bottom:10px;*/">
                <form name="form-search" id="form-search"  action="<?php echo base_url(); ?>search"  method="GET">
                    <div class="form-group col-lg-6 col-md-6">
                        <input type="hidden"  name="utf8" id="utf8" value="✓">
                        <input name="work_area" id="work_area" class="form-control form-search" value="<?php echo $_GET['work_area']; ?>" placeholder="¿Qué profesional necesitas?">
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <select name="work_region" id="work_region" class="form-control form-search">
                            <?php
                            foreach ($regiones as $reg) {
                                echo '<option value="' . $reg["id_region"] . '">' . $reg["nombre"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <button type="submit" name="btn-search" id="btn-search" class="btn btn-lg btn-primary" value="Buscar"
                        style="border-radius:0px; border:none; width:100%; background-color: #4a90e2;
                        border-color: #4a90e2;
                        letter-spacing: 2px;
                        line-height: 17px; color:#fbfbfb;">
                            Buscar
                        </button>
                        <input type="hidden"  name="token" id="utf8" value="<?php echo md5('token_security');?>">
                    </div>
                </form>
            </div>
            <!-- /fin section buscador -->
            
            <!-- Section resultados -->
             
                <div class="col-md-12" style="padding: 0px;">
                     <ul class="uls list-group"  aria-labelledby="dropdownMenu1" >
                        <div class="text-center" style="width:100%; height: 60px;border-bottom: 1px solid #e7e7e7;">
                            <br/>
                            <p class="username" id="ttUser">Buscando wuokers cerca de ti <i class='fa fa-map-marker'></i></p>
                            <?php
                             echo "";
                            if(!$this->session->userdata("user_id")){
                                //echo "Usuarios cerca de ti <i class='fa fa-maps'></i>";
                            }
                            ?>
                        </div>
                         <center class="" id="loadTop">
                            <br/>
                            <br/>
                            <i class="fa fa-spinner fa-pulse fa-2x" style="color:#3AA3E3;"></i>
                            <br/>
                            <br/>
                        </center>
                         <center class="hidden" id="sinResultados">
                            <br/>
                            <br/>
                            Sin resultados
                            <br/>
                            <br/>
                        </center>
                        <div id="topWuokers">

                        </div>
                        
                        <li role="separator" class="divider"></li>
                    </ul>
                </div>
            </div>
            <!-- /fin section resultados-->
        </div>
        <!-- Section map -->
        <div class="col-md-6 hidden-sm hidden-xs box-search" style="height:100%; background-color: #fbfbfb;">
            <!-- alerta -->
            <div class="alert alert-warning alert-dismissible text-center hidden" id="alert-search" role="alert" style="margin-bottom: 0px;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Opps!</strong> No se encontraron resultados, prueba otra vez.
            </div>
            <div id="map-search" style="height:100%;">
                <center>
                    <br/>
                    Buscando resultados
                    <br/>
                    <img src="<?php echo base_url();?>asset/img/loader_rnb.gif">
                    <i class="fa fa-circle-o-notch fa-spin fa-2x hidden" style="color:#3AA3E3;"></i>
                </center>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .container-map{
        position: absolute;
        top: 51px;
        bottom: 0;
        right: 0;
    }
    #box-results{
        position: fixed;
        top: 51px;
        left: 0;
        bottom: 0;
        overflow-y: scroll;
        background-color: #FFF;
    }
    .box-search{
        position: fixed;
        top: 51px;
        right: 0;
        left: auto;
        bottom: 0;
        padding-left: 0px;
        padding-right: 0px;
    }
    .uls{
        list-style:none;
    }
    #form-search{
        margin-left: -15px;
        margin-right: -15px;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 15px;
        padding-top: 15px;
        height: auto;
    }
    .topHover:hover{
        background: #F3F3F3;
    }
</style>
<div class="modal fade bs-example-modal-sm" id="perfilUser" style="margin-top: 30px;" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="border-radius: 3px; border-top: 7px solid #3AA3E3;" id="userInfo">       
    </div>
  </div>
</div>
<input type="hidden" name="url_base" id="url_base" value="<?php echo base_url(); ?>">


<!--<script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.fittext.js"></script>
    <!--<script src="<?php echo base_url(); ?>asset/js/wow.min.js"></script>-->

<style>
    .topHover:hover{
        border-left: 4px solid #3AA3E3;
    }
     ul,li{
        text-decoration: none;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-search").click(function(){
            $("#btn-search").html('<i class="fa fa-spinner fa-pulse fa-lg" style="color:#fbfbfb;"></i>');
            
        });
    });
</script>