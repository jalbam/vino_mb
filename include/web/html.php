<?php
    //Calculamos si el navegador no soporta cookies, para pasarlas por cada enlace:
    if (SID) { $sid_get = SID; }
    else { $sid_get = "sid=no"; }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        
        <!-- Programa por Yasmina Llaveria del Castillo y Joan Alba Maldonado -->
        
        <title><?php echo $show_title." - ".$title; ?></title>

        <?php
            //Si todavia no se ha hecho el refresco con javscript, se realiza:
            if (!isset($HTTP_SESSION_VARS["javascript_refreshed"]) || isset($HTTP_SESSION_VARS["javascript_refreshed"]) && !$HTTP_SESSION_VARS["javascript_refreshed"])
             {
                $HTTP_SESSION_VARS["javascript_refreshed"] = FALSE;
                include "javascript_detector.php";
             }

            //Si la variable "javascript" se ha enviado por GET y su valor es "enabled", entonces se soporta JavaScript:
            if (isset($HTTP_GET_VARS["javascript_support"]) && $HTTP_GET_VARS["javascript_support"] == "enabled") { $HTTP_SESSION_VARS["javascript_support"] = TRUE; }

            //Si se soporta JavaScript, se incluye la funcion "open_image":
            if (isset($HTTP_SESSION_VARS["javascript_support"]) && $HTTP_SESSION_VARS["javascript_support"])
             {
                include "include/web/javascript_function.php";
             }
        ?>

        <?php
            //Incluimos CSS:
            include "include/web/css.php";
        ?>

        <link rev="made" href="mailto:<?php echo $email; ?>">
        <link rel="SHORTCUT ICON" href="favicon.ico">

        <?php    
            //Incluimos Meta-tags:
            include "include/web/meta.php";
        ?>
    </head>

    <body bgcolor="<?php echo $color_bg; ?>" text="<?php echo $color_text; ?>" link="<?php echo $color_link; ?>" alink="<?php echo $color_link_active; ?>" vlink="<?php echo $color_link_visited; ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <br>
        <center>
            <table border="1" align="center" width="550" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td align="center">
                        <center title="&copy; <?php echo $copyright; ?>">
                            <?php echo $title_html; ?>
                        </center>
                    </td>
                </tr>
            </table>
            <table border="1" align="center" width="550" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td align="center" width="120" valign="top">
                        <center>
                            <table border="0" cellspacing="0" cellpadding="0" height="10"><tr><td><br></td></tr></table>
                            <font color="<?php echo $color_text; ?>" size="3" face="times new roman">
                            <?php
                                //Incluimos el formulario de busqueda:
                                include "include/web/search.php";

                                echo "<br><br>";

                                //Incluimos menu:
                                include "include/web/menu.php";
                            ?>
                            </font>
                            <table border="0" cellspacing="0" cellpadding="0" height="10"><tr><td><br></td></tr></table>
                        </center>
                    </td>
                    <td align="center" width="430" valign="top">
                        <center>
                            <table border="0" cellspacing="0" cellpadding="0" height="10"><tr><td><br></td></tr></table>
                            <table border="0" align="center" width="410" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top" width="410">
                                        <center>
                                            <font color="<?php echo $color_text; ?>" size="4" face="arial">
                                            <?php
                                                echo $show_title;
                                            ?>
                                            </font>
                                        </center>
                                        <br>
                                        <font color="<?php echo $color_text; ?>" size="3" face="arial">
                                        <?php
                                            //Incluimos el cuerpo:
                                            include "include/web/body/".$general_name."_inc.php";
                                        ?>
                                        </font>
                                    </td>
                                </tr>                                
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" height="10"><tr><td><br></td></tr></table>
                        </center>
                    </td>
                </tr>
            </table>
            <font color="<?php echo $color_text; ?>" size="3" face="courier" title="&copy; <?php echo $copyright; ?>">&copy; <?php echo $copyright; ?></font>
            <br>
            <font color="<?php echo $color_text; ?>" size="1" face="arial" title="Yasmina Llaveria del Castillo y Joan Alba Maldonado">Yasmina Llaveria del Castillo y Joan Alba Maldonado</font>
        </center>
    </body>
</html>
