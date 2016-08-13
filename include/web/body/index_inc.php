<?php
    //Se calcula la extension de la imagen del logotipo:
    if (file_exists("img/web/logo.png")) { $logo_path = "img/web/logo.png"; }
    elseif (file_exists("img/web/logo.gif")) { $logo_path = "img/web/logo.gif"; }
    else { $logo_path = "img/web/logo.jpg"; } //Si no existe con .png ni .gif, se usa .jpg
    
    //Se muestra el logotipo:
    echo "<center><img src=\"".$logo_path."\" width=\"340\" height=\"80\" vspace=\"0\" hspace=\"\" border=\"0\" alt=\"".$title."\" title=\"".$title."\"></center><br>";
    
    //Se muestra la descripcion:
    echo $welcome_text;
?>
