<center>
<style>
    /* Shrink Wrap Layout Pattern CSS */
    @media only screen and (max-width: 599px) {
        td[class="hero"] img {
            width: 100%;
            height: auto !important;
        }
        td[class="pattern"] td{
            width: 100%;
        }
    }
    body
    {
        font-family: 'Roboto',Arial,Tahoma,sans-serif;
        background-color: #00bcd4;
    }

    .logo{margin-bottom:20px;}
    .logo a{font-size:36px;display:block;width:100%;text-align:center;color:#fff;}
    .logo small{display:block;width:100%;text-align:center;color:#fff;margin-top:-5px;}
    .logo{margin-bottom:20px;}
    .logo a{font-size:36px;display:block;width:100%;text-align:center;color:#fff;}
    .logo small{display:block;width:100%;text-align:center;color:#fff;margin-top:-5px;}
    a{font-size:14px;text-decoration:none;color:#00bcd4;}
    .logo{margin-bottom:20px;}
    .logo a{font-size:36px;display:block;width:100%;text-align:center;color:#fff;}
    .logo small{display:block;width:100%;text-align:center;color:#fff;margin-top:-5px;}
</style>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td class="pattern" width="600">
            <table cellpadding="0" cellspacing="0">
                <tr>

                    <td class="hero">
                        <div class="logo">
                            <a href="https://calculaminota.herokuapp.com"><b>CalculaMiNota</b> </a>
                            <small>Gestor de calficaciones</small>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="font-family: arial,sans-serif; color: white;">
                        <h1>Cambio de contraseña</h1>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="font-family: arial,sans-serif; font-size: 14px; line-height: 20px !important; color: snow; padding-bottom: 20px;">
                        Hola {{$user->name}}!
                    </td>
                </tr>
                <tr>
                    <td align="left" style="font-family: arial,sans-serif; font-size: 14px; line-height: 20px !important; color: snow; padding-bottom: 20px;">
                        Hemos visto que has decidido cambiar tu contraseña, continua precionando el siguiente botón para proceder con el cambio. En caso de no haber sido tú, puedes ignorar este correo electrónico, tu cuenta seguirá funcionando como normalmente lo ha hecho.
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <a style="color:red" href="{{ (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '//' . $_SERVER['HTTP_HOST'] . '/reset/' .'?token='.$token.'&email='.urlencode($user->getEmailForPasswordReset()) }}"> Aqui </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</center>
<!--
<div style="color: red">
    Haz click aquí para poder cambiar tu contraseña: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
</div>
-->
