<?php
    //Se setea la variable para saber si la cesta esta vacia:
    $basket_void = TRUE;

    //Se setea algo en la variable para que no de error:
    $HTTP_SESSION_VARS["basket"]["0"] = 0;

    //Se realiza un bucle de la matriz que contiene la cesta:
    foreach ($HTTP_SESSION_VARS["basket"] as $product_id => $value)
     {
        //Se calcula que la variable que guarda la cantidad este seteada, y sea numerica mayor que cero:
        if (isset($HTTP_SESSION_VARS["basket"][$product_id]["quantity"]) && is_numeric($HTTP_SESSION_VARS["basket"][$product_id]["quantity"]) && $HTTP_SESSION_VARS["basket"][$product_id]["quantity"] > 0)
         {
            //Entonces, la cesta no esta vacia:
            $basket_void = FALSE;
         }
     }
    
    //Si la cesta esta vacia, se muestra el mensaje:
    if (isset($basket_void) && $basket_void)
     {
        echo $basket_void_text;
     }
    ///...y si no, se muestra el formulario:
    else
     {
        //Se incluye el archivo que contiene el proceso del formulario:
        include "include/checkout/process.php";
     }
?>
