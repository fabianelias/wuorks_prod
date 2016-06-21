<div class="separator"style="height: 52px;">
    
</div>
<?php  
    if($this->session->flashdata('mensajes')){
    ?>
      <div class="alert alert-info text-center" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <a href="javascript:;" class="alert-link"><?php echo $this->session->flashdata('mensajes') ?></a>
      </div>
<?php
   }
?>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="profile">
                  <div class="row">
                    <?php
                    $i  = $infoUser["data"][0];
                    ?>
                      <br>
                      <div class="col-md-12 ">
                          <div class="col-md-3">
                              <img src="<?php echo base_url(); ?>asset/img/user_avatar/<?php echo $i["avatar"]; ?>" style="height: 230px; width: 100%; border-radius:5px;">
                              <h3><?php echo $i["name"]; ?></h3>
                              <h4 class="title"><?php echo $this->session->userdata('username'); ?></h4>
                          </div>
                          <div class="col-md-9">
                              <!-- Sub menu -->
                              <?php 
                              $this->load->view('inc/inc_sub_menu_view');
                              ?>
                              <br/>
                              <br/>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    Información basica
                                    <a href="<?php echo base_url(); ?>profile/editProfile" class="btn btn-sm btn-primary" style="margin-left:25px;">
                                        <i class="fa fa-edit fa-lg"></i>&nbsp;
                                        Editar información
                                    </a>
                                </div>
                                <div class="panel-body">
                                    <div class="table table-responsive col-md-4">
                                        <table class="table ">
                                            <thead>
                                                <?php 
                                                if($i['address'] == "" || $i["commune"] == "" || $i["region"] == "" || $i["cell_phone_number"] == 0 || $i["rut"] == ""){
                                                    echo "<tr>";
                                                    echo "<td><p class='btn btn-sm btn-warning'><i class='fa fa-warning'></i> Es importante que completes todos tus datos</p></td>";
                                                    echo "</tr>";
                                                }else{
                                                   echo "<tr>";
                                                   echo "<td><p class='btn-sm btn-success'><i class='fa fa-lg fa-smile-o'></i> Todo en orden</p></td>";
                                                   echo "</tr>"; 
                                                }
                                                ?>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:20%;">
                                                       Nombre
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($i['name']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Apellido paterno
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($i['last_name_p']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Apellido materno
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($i['last_name_m']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Dirección
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($i['address']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Comuna
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($infoUser['comuna_nom']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Región
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($infoUser['region_nom']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Nro. celular
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo $i["cell_phone_number"]?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Nro. telefono (opcional)
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo $i["telephone_number"]?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="panel panel-default">
                                  <div class="panel-heading">Información de la cuenta</div>
                                <div class="panel-body">
                                    <div class="table table-responsive col-md-4">
                                        <table class="table ">
                                            <thead>
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Email
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo strtoupper($i['email']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Contraseña
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php 
                                                        if(empty($i["id_social"])){
                                                        ?>
                                                           <a href="<?php echo base_url();?>profile/change_pass" class="btn btn-sm btn-primary">Cambiar</a>
                                                        <?php
                                                        }else{
                                                        ?>
                                                           <a href="javascript:;" class="btn btn-sm btn-primary disabled">Cambiar</a> <small>Te has registrado con facebook</small>
                                                        <?php
                                                        }
                                                        ?>
                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Fecha de registro
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php 
                                                        $date = date('d/m/Y',  strtotime($i['create_time']));
                                                        echo $date;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Usuario
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php
                                                        switch ($i["user_type"]){
                                                            case 1: $user_type = "PROFESIONAL"; break;
                                                            case 2: $user_type = "EMPRESA";     break;
                                                        }
                                                        echo $user_type;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Cuenta
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php
                                                        switch ($i["type_account"]){
                                                            case 0: $type_account = "WUOKER";      break;
                                                            case 1: $type_account = "WUOKERS-PRO"; break;
                                                        }
                                                        echo $type_account;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%;">
                                                        Codigo usuario
                                                    </td>
                                                    <td style="width:80%;">
                                                        <?php echo $i["wuorks_key"]?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="profession">...</div>
              <div role="tabpanel" class="tab-pane" id="messages">...</div>
              <div role="tabpanel" class="tab-pane" id="settings">...</div>
            </div>
        </div>
    </div>
    
</div>

<style type="text/css">

    .title{
        font-weight: 300;
        color: #47525d;
    }
    
    
</style>
