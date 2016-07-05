<?php

Class Email_template{
    
    public function  confirmar_registro($url_verificacion,$nombre){
        $html =       
                "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                <meta charset='utf-8' />
                <meta name='viewport' content='width=device-width' />
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                <title>Confirmar cuenta creada</title>
                </head>
                <body   bgcolor='#f6f6f6' 
                        style=' margin: 0;
                                padding: 0;
                                font-family: Helvetica, Arial, sans-serif;
                                font-size: 100%;
                                line-height: 1.6;
                                -webkit-font-smoothing: antialiased;
                                -webkit-text-size-adjust: none;
                                width: 100%!important;
                                height: 100%;'>
                <!-- body -->
                <table class='body-wrap' bgcolor='#f6f6f6' style='  width: 100%;
                                                                    padding: 20px;
                                                                    border: 1px solid #f0f0f0;
                                                                    padding: 0px;'>
                        <tr>
                                <td></td>
                                <td class='container' bgcolor='#FFFFFF' style=' border: 1px solid #f0f0f0;
                                                                                font-size: 12px;
                                                                                color: #666;
                                                                                display: block!important;
                                                                                max-width: 600px!important;
                                                                                margin: 0 auto!important; /* makes it centered */
                                                                                clear: both!important;
                                                                                padding: 0px;'>
                                        <!-- content -->
                                        <div class='content' style='max-width: 600px;
                                                                    margin: 0 auto;
                                                                    display: block;'>
                                        <table style='width: 100%'>
                                                <tr style='background-color:#fff;    box-shadow: 0 1px 1px rgba(0,0,0,.1);'>
                                                    <td style='padding:20px;'>
                                                        <img src='https://www.wuorks.cl/asset/img/logo-cl.png'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td style='text-align:justify; padding:20px;'>
                                                                <h2 style=' font-family: Helvetica, Arial, sans-serif;
                                                                            color: #000;
                                                                            margin: 40px 0 10px;
                                                                            line-height: 1.2;
                                                                            font-weight: 200;
                                                                            font-size: 28px;'>Validar email</h2>
                                                                <br/>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Hola,</p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Bienvenid@ <b>".$nombre.", </b>estas a un paso de terminar tu registro</b>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Para finalizar confirma tu cuenta aqui:</p>
                                                                <table style='width: 100%'>
                                                                        <tr>
                                                                                <td style='padding: 20px 0;  text-align:center;'>
                                                                                        <p style='  font-size: 12px; 
                                                                                                    color: #666;
                                                                                                    margin-bottom: 10px;
                                                                                                    font-weight: normal;
                                                                                                    font-size: 14px;'>
                                                                                            <a href='".$url_verificacion."' style='   text-decoration: none;
                                                                                                                                    color: #FFF;
                                                                                                                                    background-color: #48BA87;
                                                                                                                                    border: solid #48BA87;
                                                                                                                                    border-width: 10px 20px;
                                                                                                                                    line-height: 2;
                                                                                                                                    font-weight: bold;
                                                                                                                                    margin-right: 10px;
                                                                                                                                    text-align: center;
                                                                                                                                    cursor: pointer;
                                                                                                                                    display: inline-block;
                                                                                                                                    border-radius: 25px;
                                                                                                                                    padding: 0 30px;'>Validar email</a></p>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                                <br/>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Si tienes dificultades para seguir el enlace <a href='mailto:contacto@wuorks.com' style='color: #348eda;'>escr&iacute;benos</a> y nos contactaremos contigo a la brevedad.</p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Saludos, equipo <a href='http://www.wuorks.com' style='color: #348eda;'>WUORKS</a></p>
                                                        </td>
                                                </tr>
                                        </table>
                                        </div>
                                        <!-- /content -->
                                </td>
                                <td></td>
                        </tr>
                </table>
                <!-- /body -->
                <!-- footer -->
                <table class='footer-wrap' style='  width: 100%;	
                                                    clear: both!important;
                                                    font-size: 12px;
                                                    color: #666;'>
                        <tr>
                                <td></td>
                                <td class='container'>
                                        <!-- content -->
                                        <div class='content'>
                                                <table>
                                                        <tr>
                                                                <td align='center'>
                                                                        <p style='  font-size: 12px; 
                                                                                    color: #666;
                                                                                    margin-bottom: 10px;
                                                                                    font-weight: normal;
                                                                                    font-size: 14px;'>Tienes problemas para ver este correo? <a href='mailto:' style='color: #348eda;'>Escr&iacute;benos</a>.
                                                                        </p>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <!-- /content -->
                                </td>
                                <td></td>
                        </tr>
                </table>
                <!-- /footer -->
                </body>
                </html>";
        
        
        return utf8_decode($html);
                
    }
    
    /***************************************************************************
     * @PLANTILLA PARA EMAIL DE CONTACTO ENTRE USUARIOS
    ****************************************************************************/
    public function email_mensajes($nombre,$nom_profesion,$url_envio){
        $html =       
                "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                <meta charset='utf-8' />
                <meta name='viewport' content='width=device-width' />
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                <title>Confirmar cuenta creada</title>
                </head>
                <body   bgcolor='#f6f6f6' 
                        style=' margin: 0;
                                padding: 0;
                                font-family: Helvetica, Arial, sans-serif;
                                font-size: 100%;
                                line-height: 1.6;
                                -webkit-font-smoothing: antialiased;
                                -webkit-text-size-adjust: none;
                                width: 100%!important;
                                height: 100%;'>
                <!-- body -->
                <table class='body-wrap' bgcolor='#f6f6f6' style='  width: 100%;
                                                                    padding: 20px;
                                                                    border: 1px solid #f0f0f0;
                                                                    padding: 0px;'>
                        <tr>
                                <td></td>
                                <td class='container' bgcolor='#FFFFFF' style=' border: 1px solid #f0f0f0;
                                                                                font-size: 12px;
                                                                                color: #666;
                                                                                display: block!important;
                                                                                max-width: 600px!important;
                                                                                margin: 0 auto!important; /* makes it centered */
                                                                                clear: both!important;
                                                                                padding: 0px;'>
                                        <!-- content -->
                                        <div class='content' style='max-width: 600px;
                                                                    margin: 0 auto;
                                                                    display: block;'>
                                        <table style='width: 100%'>
                                                <tr style='background-color:#fff;'>
                                                    <td style='padding:20px;'>
                                                    <img src='http://www.wuorks.com/asset/images-wuorks/logo-cl.png'>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td style='text-align:justify; padding:20px;'>
                                                                <h3 style=' font-family: Helvetica, Arial, sans-serif;
                                                                            color: #000;
                                                                            margin: 40px 0 10px;
                                                                            line-height: 1.2;
                                                                            font-weight: 200;
                                                                            font-size: 28px;'>Hola ".$nombre."</h3>
                                                                <br/>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'></p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Tienes un mensaje por tu profesion ".$nom_profesion.".<br>
                                                                                ingresa a wuorks para revisarlo.</b>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Suerte!.</p>
                                                                <table style='width: 100%'>
                                                                        <tr>
                                                                                <td style='padding: 20px 0;  text-align:center;'>
                                                                                        <p style='  font-size: 12px; 
                                                                                                    color: #666;
                                                                                                    margin-bottom: 10px;
                                                                                                    font-weight: normal;
                                                                                                    font-size: 14px;'>
                                                                                            <a href='".$url_envio."' style='   text-decoration: none;
                                                                                                                                    color: #FFF;
                                                                                                                                    background-color: #48BA87;
                                                                                                                                    border: solid #48BA87;
                                                                                                                                    border-width: 10px 20px;
                                                                                                                                    line-height: 2;
                                                                                                                                    font-weight: bold;
                                                                                                                                    margin-right: 10px;
                                                                                                                                    text-align: center;
                                                                                                                                    cursor: pointer;
                                                                                                                                    display: inline-block;
                                                                                                                                    border-radius: 25px;
                                                                                                                                    padding: 0 30px;'>Ver mensaje</a></p>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                                <br/>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Si tienes dificultades para seguir el enlace <a href='mailto:contacto@wuorks.com' style='color: #348eda;'>escr&iacute;benos</a> y nos contactaremos contigo a la brevedad.</p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Saludos, equipo <a href='http://www.wuorks.com' style='color: #348eda;'>WUORKS</a></p>
                                                        </td>
                                                </tr>
                                        </table>
                                        </div>
                                        <!-- /content -->
                                </td>
                                <td></td>
                        </tr>
                </table>
                <!-- /body -->
                <!-- footer -->
                <table class='footer-wrap' style='  width: 100%;	
                                                    clear: both!important;
                                                    font-size: 12px;
                                                    color: #666;'>
                        <tr>
                                <td></td>
                                <td class='container'>
                                        <!-- content -->
                                        <div class='content'>
                                                <table>
                                                        <tr>
                                                                <td align='center'>
                                                                        <p style='  font-size: 12px; 
                                                                                    color: #666;
                                                                                    margin-bottom: 10px;
                                                                                    font-weight: normal;
                                                                                    font-size: 14px;'>Tienes problemas para ver este correo? <a href='mailto:".$contact_email."' style='color: #348eda;'>Escr&iacute;benos</a>.
                                                                        </p>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <!-- /content -->
                                </td>
                                <td></td>
                        </tr>
                </table>
                <!-- /footer -->
                </body>
                </html>";
        
        
        return utf8_encode(utf8_decode($html));
    }
    /****************************************************************************
     * @E-mail para envio de aviso de contrato
     *****************************************************************************/
    /***************************************************************************
     * @PLANTILLA PARA EMAIL DE CONTACTO ENTRE USUARIOS
    ****************************************************************************/
    public function email_contrato($detinatario,$contratado, $contratador,$com){
        $html =       
                "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                <meta name='viewport' content='width=device-width' />
                <meta http-equiv='Content-Type' content='text/html' charset='UTF-8' />
                <title>Nueva contratacion</title>
                </head>
                <body   bgcolor='#f6f6f6' 
                        style=' margin: 0;
                                padding: 0;
                                font-family: Helvetica, Arial, sans-serif;
                                font-size: 100%;
                                line-height: 1.6;
                                -webkit-font-smoothing: antialiased;
                                -webkit-text-size-adjust: none;
                                width: 100%!important;
                                height: 100%;'>
                <!-- body -->
                <table class='body-wrap' bgcolor='#f6f6f6' style='  width: 100%;
                                                                    padding: 20px;
                                                                    border: 1px solid #f0f0f0;
                                                                    padding: 0px;'>
                        <tr>
                                <td></td>
                                <td class='container' bgcolor='#FFFFFF' style=' border: 1px solid #f0f0f0;
                                                                                font-size: 12px;
                                                                                color: #666;
                                                                                display: block!important;
                                                                                max-width: 600px!important;
                                                                                margin: 0 auto!important; /* makes it centered */
                                                                                clear: both!important;
                                                                                padding: 0px;'>
                                        <!-- content -->
                                        <div class='content' style='max-width: 600px;
                                                                    margin: 0 auto;
                                                                    display: block;'>
                                        <table style='width: 100%'>
                                                <tr style='background-color:#fff; border-bottom:1px solid #cecece;'>
                                                    <td style='padding:20px;'>
                                                        <img src='http://www.wuorks.com/asset/images-wuorks/logo-cl.png'>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td style='text-align:justify; padding:20px;'>
                                                                <h3 style=' font-family: Helvetica, Arial, sans-serif;
                                                                            color: #000;
                                                                            margin: 40px 0 10px;
                                                                            line-height: 1.2;
                                                                            font-weight: 200;
                                                                            font-size: 28px;'>Hola ".$detinatario."</h3>
                                                                <br/>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'></p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Te han contratado por tu profesión <b>".$contratado[0]['nom_profesion']."</b>,
                                                                                Estos son los datos para comunicarte .</b>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Nombre: <b>".$contratador[0]['nombres']." ".$contratador[0]['apellidos']."</b></p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>email: ".$contratador[0]['email']." </p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Telefono contacto: <b>".$contratador[0]['telefono_celular']."</b> </p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Comentario: <b>".$com."</b> </p>
                                                                <table style='width: 100%'>
                                                                        <tr>
                                                                                <td style='padding: 20px 0;  text-align:center;'>
                                                                                        <p style='  font-size: 12px; 
                                                                                                    color: #666;
                                                                                                    margin-bottom: 10px;
                                                                                                    font-weight: normal;
                                                                                                    font-size: 14px;'>SUERTE!!</p>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                                <br/>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Si tienes dificultades para seguir el enlace <a href='mailto:contacto@wuorks.com' style='color: #348eda;'>escr&iacute;benos</a> y nos contactaremos contigo a la brevedad.</p>
                                                                <p style='  font-size: 12px; 
                                                                            color: #666;
                                                                            margin-bottom: 10px;
                                                                            font-weight: normal;
                                                                            font-size: 14px;'>Saludos, equipo <a href='http://www.wuorks.com' style='color: #348eda;'>WUORKS</a></p>
                                                        </td>
                                                </tr>
                                        </table>
                                        </div>
                                        <!-- /content -->
                                </td>
                                <td></td>
                        </tr>
                </table>
                <!-- /body -->
                <!-- footer -->
                <table class='footer-wrap' style='  width: 100%;	
                                                    clear: both!important;
                                                    font-size: 12px;
                                                    color: #666;'>
                        <tr>
                                <td></td>
                                <td class='container'>
                                        <!-- content -->
                                        <div class='content'>
                                                <table>
                                                        <tr>
                                                                <td align='center'>
                                                                        <p style='  font-size: 12px; 
                                                                                    color: #666;
                                                                                    margin-bottom: 10px;
                                                                                    font-weight: normal;
                                                                                    font-size: 14px;'>Tienes problemas para ver este correo? <a href='mailto:soporte@wuorks.cl' style='color: #348eda;'>Escr&iacute;benos</a>.
                                                                        </p>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <!-- /content -->
                                </td>
                                <td></td>
                        </tr>
                </table>
                <!-- /footer -->
                </body>
                </html>";
        
        
        return utf8_decode($html);
    }
}
