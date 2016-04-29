<div class="container" style="background:#E9573F;">
    <div class="header-content">
        <div class="header-content-inner">
            <div class="col-md-6 col-lg-6">
                <form name="form-search" id="form-search" action="<?php echo base_url(); ?>search" method="GET">
                    <div class="form-group col-lg-12">
                         <input name="nombre" id="nombre" class="form-control l" value="" placeholder="nombre">
                    </div>
                    <div class="form-group col-lg-12">
                         <input name="apellido_p" id="apellido_p" class="form-control l" value="" placeholder="Apellido paterno">
                    </div>
                    <div class="form-group col-lg-12">
                         <input name="apellido_m" id="apellido_m" class="form-control l" value="" placeholder="Apellido materno">
                    </div>
                    <div class="form-group col-lg-12">
                         <input name="address" id="address" class="form-control l" value="" placeholder="Tu dirección">
                    </div>
                    <div class="form-group col-lg-12">
                         <input name="cell_phone_number" id="cell_phone_number" class="form-control l" value="" placeholder="Numero de telefono">
                    </div>
                    <div class="form-group col-lg-12">
                        <select name="region" id="region" class="form-control l">
                            <option>Metropolitana</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <select name="commune" id="commune" class="form-control l">
                            <option>Peñalolen</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <input type="submit" name="btn-search" id="btn-search" class="btn btn-primary" value="Buscar">
                    </div>
                    
                </form>
            </div>
            <div class="col-md-6 col-lg-6">
                <h1>Completa tu registro</h1>
                
                <h3>Estos datos son importantes</h3>
            </div>
        </div>
    </div>
</div>

<style>
    .l{
        background: #FC6E51;
        color: #fff;
        height: 40px;
        font-size: 18px;
        font-weight: 450;
        border:0px; 
    }
    input::-webkit-input-placeholder {
        color: red;
      }
      input:-moz-placeholder {
        color: red; 
      }
      input:-ms-input-placeholder { 
        color: red; 
      }
</style>