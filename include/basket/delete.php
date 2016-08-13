<?php
    //Declaramos la funcion para borrar de la cesta:
    function basket_delete($product_id)
     {
        //Se hacen globales algunas variables necesarias:
        global $HTTP_SESSION_VARS;
        
        //Se elimina el producto de la cesta, siempre que ya este seteada:
        if (isset($HTTP_SESSION_VARS["basket"][$product_id])) { unset($HTTP_SESSION_VARS["basket"][$product_id]); }
     }
?>
