<?php
    //Si no se ha envido el formulario, se muestra:
    if (!isset($HTTP_POST_VARS["form_sent"]))
     {
        //Mostrar el formulario:
        include "include/checkout/form.php";
     }
    //...y si se ha enviado:
    else
     {

        //Calcular que todo este bien, agregando errores si no y si lo esta crear variable de sesion:
        $errors = "";
        if (!isset($HTTP_POST_VARS["name"]) || isset($HTTP_POST_VARS["name"]) && trim($HTTP_POST_VARS["name"]) == "") { $errors .= "<b>".$form_name_label."</b> ".$send_error."<br>"; }
        else { $HTTP_SESSION_VARS["name"] = $HTTP_POST_VARS["name"]; }
        if (!isset($HTTP_POST_VARS["last_name"]) || isset($HTTP_POST_VARS["last_name"]) && trim($HTTP_POST_VARS["last_name"]) == "") { $errors .= "<b>".$form_last_name_label."</b> ".$send_error."<br>"; }
        else { $HTTP_SESSION_VARS["last_name"] = $HTTP_POST_VARS["last_name"]; }
        if (!isset($HTTP_POST_VARS["street"]) || isset($HTTP_POST_VARS["street"]) && trim($HTTP_POST_VARS["street"]) == "") { $errors .= "<b>".$form_street_label."</b> ".$send_error."<br>"; }
        else { $HTTP_SESSION_VARS["street"] = $HTTP_POST_VARS["street"]; }
        if (!isset($HTTP_POST_VARS["city"]) || isset($HTTP_POST_VARS["city"]) && trim($HTTP_POST_VARS["city"]) == "") { $errors .= "<b>".$form_city_label."</b> ".$send_error."<br>"; }
        else { $HTTP_SESSION_VARS["city"] = $HTTP_POST_VARS["city"]; }
        if (!isset($HTTP_POST_VARS["zip_code"]) || isset($HTTP_POST_VARS["zip_code"]) && trim($HTTP_POST_VARS["zip_code"]) == "") { $errors .= "<b>".$form_zip_code_label."</b> ".$send_error."<br>"; }
        else { $HTTP_SESSION_VARS["zip_code"] = $HTTP_POST_VARS["zip_code"]; }
        if (!isset($HTTP_POST_VARS["contact_email"]) || isset($HTTP_POST_VARS["contact_email"]) && trim($HTTP_POST_VARS["contact_email"]) == "") { $errors .= "<b>".$form_contact_email_label."</b> ".$send_error."<br>"; }
        else { $HTTP_SESSION_VARS["contact_email"] = $HTTP_POST_VARS["contact_email"]; }
        
        //Se valida el E-Mail:
        
        
        //Si no esta bien, se muestran los errores y el formulario:
        if ($errors != "")
         {
            echo "<center><table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\"><tr><td align=\"center\"><center><b>".$send_errors_word."</b></center></td></tr><tr><td>";
            echo $errors;
            echo "</td></tr></table></center><br>";
            include "include/checkout/form.php";
         }
        //...y si esta bien, se incluye el archivo para enviar el formulario:
        else
         {
             //Se incluye el archivo que contiene la funcion de enviar E-Mail:
             include "send.php";
             //Se llama a la funcion para enviar el pedido:
             checkout_send($HTTP_POST_VARS["name"],$HTTP_POST_VARS["last_name"],$HTTP_POST_VARS["street"],$HTTP_POST_VARS["city"],$HTTP_POST_VARS["zip_code"],$HTTP_POST_VARS["contact_email"]);
         }
     }
?>
