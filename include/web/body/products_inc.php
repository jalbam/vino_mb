<?php
    //Incluimos el archivo para conectar a mySQL:
    include "include/db/open.php";
    
    //Incluimos la funcion para listar los productos:
    include "include/products/list.php";

    //Si se ha enviado buscar un producto:
    if (isset($HTTP_GET_VARS["search"]) && trim($HTTP_GET_VARS["search"]) != "")
     {
        //Se recoge la varible "search" enviada por GET en "$search" pero quitando espacios y escapando caracteres mySQL para prevenir mySQL injection:
        $search = mysql_real_escape_string(trim(urldecode($HTTP_GET_VARS["search"])));
        //Se escribe el comando (incompleto, seguramente, ya que hay que agregar el WHERE mas abajo):
        $comando = "SELECT * FROM ".DB_TABLE_PRODUCTS_NAME." LEFT JOIN ".DB_TABLE_CATEGORIES_NAME." ON ".DB_TABLE_CATEGORIES_NAME.".category_id = ".DB_TABLE_PRODUCTS_NAME.".wine_category ";
        //Se separa en una matriz las palabras enviadas por GET en el formulario (por espacios en blanco):
        $search_words = explode(" ", $search);
        //Contador para saber si es la primera vez que entre en el bucle y utilizar WHERE delante o solo OR:
        $search_count = 0;
        //Se realiza un bucle para insertar cada palabra en la busqueda:
        foreach ($search_words as $search_word)
         {
            //Se suprimen los espacios en blanco:
            $search_word = trim($search_word);
            //Elimina palabras peligrosas de la busqueda:
            if (strtoupper($search_word) == "UPDATE") { $search_word = ""; } //Elimina palabra UPDATE
            if (strtoupper($search_word) == "DROP") { $search_word = ""; } //Elimina palabra DROP
            if (strtoupper($search_word) == "SELECT") { $search_word = ""; } //Elimina palabra SELECT
            if (strtoupper($search_word) == "WHERE") { $search_word = ""; } //Elimina palabra WHERE
            if (strtoupper($search_word) == "ON") { $search_word = ""; } //Elimina palabra ON
            if (strtoupper($search_word) == "OR") { $search_word = ""; } //Elimina palabra OR
            if (strtoupper($search_word) == "LIKE") { $search_word = ""; } //Elimina palabra LIKE
            //Comprueba que la palabra no este vacia (espacio(s) en blanco):
            if ($search_word != "")
             {
                //Si es la primera vez que entre en bucle, se pone delante la palabra WHERE y si no la palabra OR:
                if ($search_count == 0) { $comando .= " WHERE "; } else { $comando .= " OR "; }
                //Se introduce el comando en la variable:
                $comando .= DB_TABLE_PRODUCTS_NAME.".wine_name LIKE '%".$search_word."%' OR ".DB_TABLE_PRODUCTS_NAME.".wine_description LIKE '%".$search_word."%'";
                //Se incrementa el contador:
                $search_count++;
             }
         }
        echo "<center>".$search_button_value." <b>".htmlspecialchars(stripslashes(trim(urldecode($HTTP_GET_VARS["search"]))))."</b></center><br>";
    }
    //...o si se ha enviado listar todos:
    elseif ($category == "all")
     {
        //Se escribe el comando:
        $comando = "SELECT * FROM ".DB_TABLE_PRODUCTS_NAME." LEFT JOIN ".DB_TABLE_CATEGORIES_NAME." ON ".DB_TABLE_CATEGORIES_NAME.".category_id = ".DB_TABLE_PRODUCTS_NAME.".wine_category";
        echo "<center>".$label_products_action." ".$label_products_all."</center><br>";
     }
    //...o si se ha enviado buscar alguna categoria:
    else
     {
        //Se escapan los caracteres especiales de mySQL de "$category" para prevenir mySQL injection:
        $category = mysql_real_escape_string($category);
        //Se escribe el comando:
        $comando = "SELECT * FROM ".DB_TABLE_PRODUCTS_NAME." LEFT JOIN ".DB_TABLE_CATEGORIES_NAME." ON ".DB_TABLE_CATEGORIES_NAME.".category_id = ".DB_TABLE_PRODUCTS_NAME.".wine_category WHERE ".DB_TABLE_CATEGORIES_NAME.".category_name = '".strtolower($category)."'";
        echo "<center>".$label_products_action." ".ucfirst(strtolower($category))."</center><br>";
     }

    //Calculamos que $count no este seteado (no se ha entrado en Buscar) o que no sea a cero (no se ha buscado nada o nada valido):
    if (!isset($search_count) || isset($search_count) && $search_count != 0)
     {
        //Llamamos a la funcion para que nos liste los productos:
        products_list($comando);
     }
    //Si no, es que se ha realizado una busqueda pero sin palabras o palabras invalidas:
    else { echo $search_illegal; }

    //Incluimos el archivo para desconectar de mySQL:
    include "include/db/close.php";
?>
