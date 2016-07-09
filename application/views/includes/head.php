
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Empleos, profesionales, trabajos, servicios, freelancer">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>asset/img/icon-60-60px.png">
    <meta property="og:title" content="Wuorks | El profesional que necesitas" />
    <meta property="og:description" content="Servicios, profesionales, empresas, trabajos y más..." />
    <meta property="og:image" content="<?php echo base_url();?>asset/img/logo-cl.png" />

    <title> <?php echo $titulo; ?> </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/wuorks.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.min.css" type="text/css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/animate.min.css" type="text/css">
    
    <!--fb-plugin-->
    <meta property="og:url"           content="https://www.wuorks.cl" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $titulo; ?>" />
    <meta property="og:description"   content="Encontrar a un profesional nunca fue tan fácil" />
    <meta property="og:image"         content="https://www.wuorks.cl/asset/images-wuorks/logo-cl.png" />

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v3"></script>
   
    <?php
        foreach ($files['styles'] as $st){
            echo "<link href='".base_url().$st."' rel='stylesheet'>\n";
        }
        ?>

        <?php
            foreach ($files['scripts'] as $sc){
                echo "<script src='".base_url().$sc."' type='text/javascript'></script>\n";
            }
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script>
          $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
            
          });
          $(function() {
            $("#region").change(function() {
                $("#region option:selected").each(function() {

                    txtRegion = $('#region').val();
                    var url_base = $('#url_base').val();
                    $.post(url_base+"profile/getComunas", {
                        idregion : txtRegion
                    }, function(data) {
                        $("#comuna").html(data);
                   });
                });
            });
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-79998916-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>

<body   onload="initialize()" style="background: #fbfbfb;">
<!-- integracion fb-plugins-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1036795289715314";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<!-- /integración fb-plugins-->
<style type="text/css">
    .btn-wuorks{
        background-color: #288feb;
        color: #fff;
        border-color: #288feb;
    }
    .btn-wuorks:hover{
        /*opacity: 0.3;*/
        background-color: #337ab7;
        color: #fff;
        border-color: #288feb;
    }
</style>