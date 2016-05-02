
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Empleos, profesionales, trabajos, servicios, freelancer">
    <meta name="author" content="">

    <title> <?php echo $titulo; ?> </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.min.css" type="text/css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/animate.min.css" type="text/css">
    
    <!--fb-plugin-->
    <meta property="og:url"           content="http://www.wuorks.com" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $titulo; ?>" />
    <meta property="og:description"   content="Encontrar a un profesional nunca fue tan fácil" />
    <meta property="og:image"         content="http://www.wuorks.com/asset/images-wuorks/logo-cl.png" />

    
    
    
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
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script>
          $(document).ready(function(){
              //document.getElementById("company_category_chosen").style.width="100";
          });
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