<?php
    //Abrimos la conexion con mySQL:
    $id_db = mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD) or die(mysql_error());
    
    //Seleccionamos la base de datos en mySQL:
    mysql_select_db(DB_NAME) or die(mysql_error());
?>
