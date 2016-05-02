<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?php if($tab == "perfil"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>profile">Tu perfil</a>
    </li>
    <?php 
    if($this->session->userdata("user_type") == 1){
        //profesional
    ?>
    <li role="presentation" class="<?php if($tab == "profession"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>profile/profession">Tus profesiones</a>
    </li>
    <li role="presentation" class="<?php if($tab == "contract"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>profile/jobs">Mini Jobs</a>
    </li>
    <?php
    }else{
        //empresa
    ?>
    <li role="presentation" class="<?php if($tab == "company"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>profile/company" aria-controls="company" role="tab">Tu empresa</a>
    </li>
    <li role="presentation" class="<?php if($tab == "avisos"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>profile/jobs" aria-controls="company" role="tab">Publicar aviso</a>
    </li>
    <?php
    }
    ?>
    <li role="presentation" class="<?php if($tab == "contract"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>profile/contract">Tus contratos</a>
    </li>
    <!--
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tus Mensajes</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Notificaciones</a></li>
    -->
</ul>

