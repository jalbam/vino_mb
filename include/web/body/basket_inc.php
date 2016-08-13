<?php
    //Se abre la conexion con mySQL.
    include "include/db/open.php";
    
    //Si se ha enviado el ID y este es numerico y no esta vacio:
    if (isset($HTTP_GET_VARS["id"]) && trim($HTTP_GET_VARS["id"]) != "" && is_numeric(trim($HTTP_GET_VARS["id"])))
     {

        //Se guarda en una variable el ID enviado por GET, quitandole espacios en blanco al principio y al final:
        $product_id = trim($HTTP_GET_VARS["id"]);

        //Si se ha enviado la accion ADD (agregar a la cesta):
        if (isset($HTTP_GET_VARS["action"]) && strtoupper(trim($HTTP_GET_VARS["action"])) == "ADD")
         {
            //Se agrega el producto:
            include "include/basket/add.php";
            basket_add($product_id);
         }

        //Si se ha enviado la accion DELETE (eliminar de la cesta):
        elseif (isset($HTTP_GET_VARS["action"]) && strtoupper(trim($HTTP_GET_VARS["action"])) == "DELETE")
         {
            //Se borra el producto:
            include "include/basket/delete.php";
            basket_delete($product_id);
         } //Fin de DELETE.

        //Si se ha enviado la accion EDIT (editar cantidad):
        elseif (isset($HTTP_GET_VARS["action"]) && strtoupper(trim($HTTP_GET_VARS["action"])) == "EDIT")
         {
            //Si se ha enviado la cantidad correctamente (parametro necesario):
            if (isset($HTTP_GET_VARS["quantity"]) && is_numeric(trim($HTTP_GET_VARS["quantity"])))
             {
                //Se le quitan los espacios en blanco al principio y al final:
                $product_quantity = trim($HTTP_GET_VARS["quantity"]);
                
                //Si la cantidad enviada es 0, se borra el producto:
                if ($product_quantity == 0)
                 {
                    include "include/basket/delete.php";
                    basket_delete($product_id);
                 }
                //Si es mayor que cero, se setea a la nueva cantidad:
                elseif ($product_quantity > 0)
                 {
                    //Se edita el producto:
                    include "include/basket/edit.php";
                    basket_edit($product_id, $product_quantity);
                 }
             }
         } //Fin de EDIT.
     }
    
    //Se muestran los productos:
    include "include/basket/list.php";

    //Se cierra la conexion con mySQL.
    include "include/db/open.php";
?>
