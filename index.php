<?php
    //Definimos el nombre general del archivo:
    $general_name = "index";
    
    //Definimos el nombre del archivo:
    $this_file = $general_name.".php";

    //Incluimos el archivo de configuracion:
    include "include/config.php";

    //Definimos el titulo a mostrar:
    $show_title = $label_index;

    //Incluimos el archivo que hace las demas inclusiones:
    include "include/web_all.php";
?>
