
<input type="hidden" name="wuorks" id="wuorks" value="<?php echo $wuorks; ?>">
<input type="hidden" name="region" id="region" value="<?php echo $region; ?>">
<div class="container-fluid hidden-sm hidden-xs" style="margin-top: 55px;">
    <div class="row">
        <div class="col-md-3" style="margin-top: 20px;">
            <a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Ranking 10 WUOKERS  
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu in"  aria-labelledby="dropdownMenu1" style="margin-left:0px;margin-top: 14px; min-width: 300px;overflow: scroll; max-height: 500px;">
                <center class="" id="loadTops">
                    <br/>
                    Cargando...
                    <br/>
                    <i class="fa fa-circle-o-notch fa-spin fa-2x" style="color:#3AA3E3;"></i>
                    <br/>
                </center>
                <div id="topWuokerss">
                    
                </div>
                <div class="bg-info text-center" style="width:100%; height: 60px;margin-bottom: -9px;">
                    <br/>
                    publicidad
                </div>
                <li role="separator" class="divider"></li>
                <li class="text-center"><a href="#">Ver Todos</a></li>
            </ul>
        </div>
        <div class="col-lg-9">
            <form name="form-search" id="form-search" action="<?php echo base_url(); ?>search"  method="GET" style="margin-top: 20px;">
                    
                    <div class="form-group col-lg-5">
                         <input type="hidden"  name="utf8" id="utf8" value="✓">
                         <input name="work_area" id="work_area" class="form-control form-search" value="" placeholder="¿Qué profesional necesitas?">
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
                        style="border-radius:0px; border:none;  width:100%; background:#3AA3E3; color:#fff;"       
                        >
                    </div>
                    <div class="form-group col-lg-1">&nbsp;</div>
            </form>
        </div>
    </div>
</div>
<!-- alerta -->
<div class="alert alert-warning alert-dismissible text-center hidden" id="alert-search" role="alert" style="margin-bottom: 0px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Opps!</strong> No se encontraron resultados, prueba otra vez.
</div>
<section style="height: 100%">
    <div class="row">
        <div class=" col-md-3" style="height: 100%">
            <ul class="uls "  aria-labelledby="dropdownMenu1" style="margin-left:0px;margin-top: 14px; min-width: 300px;overflow: scroll; max-height: 100%;">
                <center class="" id="loadTop">
                    <br/>
                    Cargando...
                    <br/>
                    <i class="fa fa-circle-o-notch fa-spin fa-2x" style="color:#3AA3E3;"></i>
                    <br/>
                </center>
                <div id="topWuokers">
                    
                </div>
                <div class="bg-info text-center" style="width:100%; height: 60px;margin-bottom: -9px;">
                    <br/>
                    publicidad
                </div>
                <li role="separator" class="divider"></li>
                <li class="text-center"><a href="#">Ver Todos</a></li>
            </ul>
        </div>
        <div class="col-md-9"style="margin:0px;">
            <div class="container "id="map-search" style="width: 100%; height: 100%; margin: 0px;">
                <center>
                    <br/>
                    Buscando resultados
                    <br/>
                    <i class="fa fa-circle-o-notch fa-spin fa-2x" style="color:#3AA3E3;"></i>
                </center>
            </div>
        </div>
    </div>
</section>



<div class="modal fade bs-example-modal-sm" id="perfilUser" style="margin-top: 30px;" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="border-radius: 5px; border-top: 7px solid #3AA3E3;" id="userInfo">       
    </div>
  </div>
</div>
<input type="hidden" name="url_base" id="url_base" value="<?php echo base_url(); ?>">


<script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.fittext.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/wow.min.js"></script>

<style>
    .topHover:hover{
        border-left: 4px solid #3AA3E3;
    }
     ul,li{
        text-decoration: none;
        
    }
    
</style>

