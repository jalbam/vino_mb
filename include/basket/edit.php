<?php
    //Declaramos la funcion para agregar a la cesta:
    function basket_edit($product_id, $product_quantity)
     {
        //Se convierten en global algunas variables necesarias:
        global $HTTP_SESSION_VARS;        
        
        //Comprobar que el ID enviado existe en la base de datos:
        $command = "SELECT * FROM ".DB_TABLE_PRODUCTS_NAME." WHERE wine_id = '".$product_id."'"; //Se escribe el comando.
        $result = mysql_query($command) or die(mysql_error()); //Se ejecuta el comando.
        
        //Si el resultado es mayor a 0, el producto existe:
        if (mysql_num_rows($result) > 0) { $product_exists = TRUE; }
        //...y si no, no existe:
        else { $product_exists = FALSE; }
        
        //Si el producto existe, se edita su cantidad:
        if ($product_exists)
         {
             //Se agrega quitando los simbolos los decimales, si los hubiera:
             $HTTP_SESSION_VARS["basket"][$product_id]["quantity"] = (int) $product_quantity;
         }
     }
?>
