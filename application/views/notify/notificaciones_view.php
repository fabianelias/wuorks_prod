<div class="separator"style="height: 51px;">
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
<div class="row text-center"  
    style="
    background-color: #4a90e2;
    border-color: #4a90e2;
    color:#fff;
    height: 50px;
    "
    role="alert">
    <h2 class="title" style="color:#fff;">
        <small class="title" style="color:#fff; font-weight: 100;">
           
            <?php 
                    $jobs ="";
                    $not = 0;
                    if($this->session->userdata("notifi")){
                        $total_noti = $this->session->userdata("notificaciones");
                        $jobs = $total_noti;
                    }
                    echo count($total_noti);?>  Notificaciones <i class="fa fa-bell"></i>.
        </small>
    </h2>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            
        </div>
        <div class="col-md-12">
            <div class="col-md-2 title">
           
            </div>
            <div class="col-md-8">
             <?php 
             if(!empty($jobs)){
                 if($this->session->userdata('wuorks_key')){
                     //Si no esta registrado solo mostramos 3 avisos invitandolo a registrarse o loguearse
                 $x = 0; 
                 foreach ($jobs as $job){
                 ?>
                  <div class="jobs panel panel-default" id="miniJob-<?php echo $job['key_aviso'];?>">
                    <div class="panel-body">
                        <h4 class="title"><?php echo strtoupper($job['title']);?></h4>
                        <p class="title">
                            <?php
                            echo ucfirst($job['mensaje']);
                            ?>
                        </p>
                    </div>
                      <div class="panel-footer" style="background-color: #fff;">
                          <a  style="margin-top:3px;"
                              href="<?php echo $job["url_de"];?>" id="job_<?php echo $job['key_aviso'];?>" class="btn-block btn-primary btn-sm btn">
                            <i class="fa fa-lg fa-check-circle"></i>
                            <?php echo $job["txt_btn"];?>
                            </a>
                      </div>
                  </div>
                 <?php
                    if($x = 1){
                       // break; 
                    }
                     $x++;
                    }
                 }else{
                }
             }else{
                 echo "<center style='height:300px;'>"
                 . "<br><br><br>"
                         . "<h3 class='title'>Nada por aquí.</h3>"
                         . "<br><br><br>"
                 . "</center>";
             }
             ?>
            </div>
            <div class="col-md-2">
            
            </div>
        </div>
    </div>
    
</div>

<style type="text/css">

    .title{
        font-weight:200;
        color: #47525d;
    }
    .jobs:hover{
        box-shadow: 0 0 5px rgba(0,0,0,.2);
    }
    
</style>
<script type="text/javascript">
    function aplicar(ku){
        $.get("<?php echo base_url();?>jobs/aplicar/"+ku, 
        function(data, status){
            
            if(data == "success"){
                $("#job_"+ku+"").addClass('disabled');
                $("#job_"+ku+"").html('<i class="fa fa-lg fa-check-circle"></i> Aplicado');
            }
            else if(data == "error"){
                alert("Ya postulaste a este MiniJobs");
                $("#job_"+ku+"").addClass('disabled');
                $("#job_"+ku+"").html('<i class="fa fa-lg fa-check-circle"></i> Ya postulaste a este MiniJobs');
            }else{
                window.location.href="<?php echo base_url("oauth/in?return=").  current_url();?>";
            }
        });
    }
</script>