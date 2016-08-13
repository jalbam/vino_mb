<?php
    //Declaramos la funcion para agregar a la cesta:
    function basket_add($product_id)
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
        
        //Si el producto existe, se agrega a la cesta:
        if ($product_exists)
         {
            //Si ya existe y con una cantidad mayor o igual a 0, se incrementa:
            if (isset($HTTP_SESSION_VARS["basket"][$product_id]["quantity"]) && $HTTP_SESSION_VARS["basket"][$product_id]["quantity"] >= 0)
             {
                $HTTP_SESSION_VARS["basket"][$product_id]["quantity"]++;
             }
            //Si no existe, se setea con la cantidad de una unidad:
            else { $HTTP_SESSION_VARS["basket"][$product_id]["quantity"] = 1; }
         }
     }
?>
