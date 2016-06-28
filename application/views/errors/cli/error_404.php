<?php
/*
defined('BASEPATH') OR exit('No direct script access allowed');

echo "\nERROR: ",
	$heading,
	"\n\n",
	$message,
	"\n\n";
 */
?>
<section class="bg-info img-responsive" style="height: 350px;">
    <img src="<?php echo base_url(); ?>asset/img/404_05.png" style="height: 100%; width: 100%;">
</section>
<section>
    <br/>
    <br/>
    <br/>
    <center>
        <h4 class="title">Busca y encuentra al profesional que necesitas</h4>
    </center>
    <form name="form-search" id="form-search" action="<?php echo base_url(); ?>search" method="GET" style="margin-top: 20px;">
            <div class="form-group col-lg-1">&nbsp;</div>
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
    <br/>
    <br/>
</section>
<section class="">
    <div class="container-fluid">
        <div class="row  text-center">
        <div class="col-lg-12">
            <br/>
            <h2 class="title" style="color:#47525d;"></h2>
            <br/>
        </div>
            <div class="col-lg-12">
                
            </div>
        </div>
        </div>
        <br/>
</section>
<br/>
<style>
    
    .title{
        font-weight: 300;
    }
</style>