<?php
    //Conectamos a mySQL:
    include "include/db/open.php";
    
    //Se ejecuta el comando mySQL:
    $comando = "SELECT category_name FROM ".DB_TABLE_CATEGORIES_NAME;
    $resultado = mysql_query($comando) or die(mysql_error());
    
    //Si se ha enviado por GET la variable "category", se recoge en $category:
    if (isset($HTTP_GET_VARS["category"])) { $category = strtoupper(trim($HTTP_GET_VARS["category"])); }
    
    //Se define la variable para saber si se ha enviado por GET una categoria valida:
    $category_selected = FALSE; //De momento es FALSE.
    
    //La matriz que guardara las categorias se setea vacia:
    $categories = "";
    $categories = array();
    
    //Se busca en los resultados con un bucle:
    while ($row = mysql_fetch_assoc($resultado))
     {
        //Se quitan espacios alrededor y se pone en mayusculas la categoria extraida de la BD:
        $row["category_name"] = strtoupper(trim($row["category_name"]));
        //Si la categoria enviada por GET coincide con la de la BD, se ha seleccionado una categoria valida:
        if (isset($category) && $category == $row["category_name"]) { $category_selected = TRUE; }
        //Se guarda en la matriz la categoria:
        $categories[] = $row["category_name"];
     }
     
    //Si no se ha enviado una categoria valida:
    if (!isset($category_selected) || isset($category_selected) && !$category_selected)
     {
        //Se setea $category="all" para ver todos los productos:
        $category = "all";
     }
    
    //Desconectamos de mySQL:
    include "include/db/close.php";
?>
