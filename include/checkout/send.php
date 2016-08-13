<?php
    //Se declara la funcion para enviar el pedido:
    function checkout_send($name, $last_name, $street, $city, $zip_code, $contact_email)
     {
        //Se hacen globales algunas variables necesarias:
        global $title;
        global $email;
        global $form_name_label;
        global $form_last_name_label;
        global $form_street_label;
        global $form_city_label;
        global $form_zip_code_label;
        global $form_contact_email_label;
        global $send_email_error;
        global $send_email_ok;
        global $send_email_again;
        global $sid_get;
                
        //Crear las cabeceras:
        $headers ="Date: ".date("l j F Y, G:i")."\r\n"; 
        $headers .="MIME-Version: 1.0\r\n"; 
        $headers .="From: ".$title."<".$email.">\r\n";
        $headers .="Return-path: ".$email."\r\n";
        $headers .="Reply-To: ".$email."\r\n";
        $headers .="Errors-To: ".$email."\r\n";
        $headers .="X-Personal_name:".$title."\r\n";
        $headers .= "X-Mailer:PHP/".phpversion()."\r\n"; 
        $headers .="Content-type: text/html; charset=iso-8859-1\r\n"; 
        
        //Crear el texto del E-Mail:
        $email_text = $form_name_label.": ".$name."<br>\n";
        $email_text = $form_last_name_label.": ".$last_name."<br>\n";
        $email_text = $form_street_label.": ".$street."<br>\n";
        $email_text = $form_city_label.": ".$city."<br>\n";
        $email_text = $form_zip_code_label.": ".$zip_code."<br>\n";
        $email_text = $form_contact_email_label.": ".$contact_email."<br>\n";

        //Enviar E-Mail:
        $sent_email = @mail($email, "Pedido en ".$title, $email_text, $headers);
        
        //Si se ha enviado correctamente, lo notifica:
        if ($sent_email) { echo "<center><b>".$send_email_ok."</b></center>"; }
        //...y si no, lo notifica y da la oportunidad de reintentar:
        else
         {
            echo "<center><b>".$send_email_error."</b><br><br>";
            echo "<a href=\"checkout.php?".$sid_get."\" title=\"".$send_email_again."\">".$send_email_again."</a></center>";
         }
     }
?>
