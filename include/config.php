<?php
    //Incluimos el archivo de configuracion para la base de datos:
    include "include/config/db.php";
    
    //Incluimos el archivo de configuracion para el aspecto:
    include "include/config/aspect.php";
    
    //Incluimos el archivo de configuracion para los datos de la empresa:
    include "include/config/data.php";
    
    //Incluimos el archivo de configuracion para el resto de configuracion:
    include "include/config/more.php";
    
    //Incluimos el archivo de lenguaje segun el definido para la web (en config/data.php) y si no existe, se incluye el general:
    if (file_exists("include/config/language/".$web_language.".php")) { include "config/language/".$web_language.".php"; }
    else { include "config/language/default.php"; }
?>
