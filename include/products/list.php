<?php
    //Declaramos la funcion para listar los productos:
    function products_list($comando)
     {
        
        //Define como globales algunas variables externas que son necesarias:
        global $HTTP_SESSION_VARS;
        global $category;
        global $color_text;
        global $table;
        global $results_void_text;
        global $decimal_numbers;
        global $decimal_separator;
        global $miles_separator;
        global $sid_get;
        global $add_to_basket_title;
       
        $resultado = mysql_query($comando) or die(mysql_error());
    
        //Se crea la tabla:
        echo "<center><table border=\"1\" cellspcing=\"0\" cellpadding=\"2\" align=\"center\" width=\"340\"><tr>";
        echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center><b>".$table["name"]."</b></center></font></td>";
        echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center><b>".$table["description"]."</b></center></font></td>";
        echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center><b>".$table["price"]."</b></center></font></td>";
        echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center><b>".$table["category"]."</b></center></font></td>";
        echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center><b>".$table["buy"]."</b></center></font></td></tr>";

        //Se setea la variable para saber si hay resultados:
        $hay_resultados = FALSE;
            
        //Se rellena la tabla con los datos:
        while ($row = mysql_fetch_assoc($resultado))
         {
            //Se setea la variable conforme hay resultados:
            $hay_resultados = TRUE;
            
            //Se continua con la tabla:
            echo "<tr>";

            //Calcula que imagen existe, para mostrarla:
            if (file_exists("img/products/mini/".$row["wine_id"].".png")) { $wine_image = $row["wine_id"].".png"; } //Si existe img/products/mini/*.png
            elseif (file_exists("img/products/mini/".$row["wine_id"].".gif")) { $wine_image = $row["wine_id"].".gif"; } //Si existe img/products/mini/*.gif
            else { $wine_image = $row["wine_id"].".jpg"; } //Si no existe ninguna de las anteriores se llama a img/products/mini/*.jpg
            $wine_image_path = "img/products/mini/".$wine_image;

            //Calcula el tipo de enlace (si soporta JavaScript o no):
            if (isset($HTTP_SESSION_VARS["javascript_support"]) && $HTTP_SESSION_VARS["javascript_support"])
             {
                //Si soporta JavaScript, el enlace llamara a una funcion JavaScript para abrir la ventana:
                $wine_image_link = "<a href=\"javascript:open_image('img/products/zoom/".$wine_image."');\" title=\"".$row["wine_name"]."\">";
             }
            else { $wine_image_link = "<a href=\"".$wine_image_path."?".$sid_get."\" target=\"_blank\">"; }
            
            echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center>".$wine_image_link."<img src=\"img/products/mini/".$wine_image."\" width=\"40\" height=\"40\" hspace=\"0\" vspace=\"0\" border=\"0\" alt=\"".$row["wine_name"]."\" title=\"".$row["wine_name"]."\"><br><b>".$row["wine_name"]."</b></a></center></font></td>";
            echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center>".$row["wine_description"]."</center></font></td>";
            echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"1\" face=\"verdana, arial\"><center><b>".number_format($row["wine_price"], $decimal_numbers, $decimal_separator, $miles_separator)."</b></center></font></td>";

            //Se pone la primera letra del nombre de la categoria en mayuscula y las demas en minuscula:
            $row["category_name"] = ucfirst(strtolower($row["category_name"]));

            //Si estamos en "todos", se crea un enlace hacia la categoria:
            if ($category == "all") { echo "<td align=\"center\"><center><a href=\"products.php?category=".$row["category_name"]."&".$sid_get."\" title=\"".$row["category_name"]."\" style=\"font-size:14px;\">".$row["category_name"]."</a></center></td>"; }
            //...y si no, se muestra sin enlace (porque ya estamos en ella):
            else { echo "<td align=\"center\"><font color=\"".$color_text."\" size=\"2\" face=\"verdana, arial\"><center>".$row["category_name"]."</center></font></td>"; }

            echo "<td align=\"center\"><center><a href=\"basket.php?id=".$row["wine_id"]."&action=add&".$sid_get."\"><img src=\"img/web/basket.gif\" alt=\"".$add_to_basket_title."\" title=\"".$add_to_basket_title."\" border=\"0\"></a></center></td>";
            echo "</tr>";
         }
        
        //Si no han habido resultados, se indica:
        if (!isset($hay_resultados) || isset($hay_resultados) && !$hay_resultados) { echo "<tr><td colspan=\"5\" align=\"center\"><center>".$results_void_text."</center></td></tr>"; }
        
        //Se cierra la tabla:
        echo "</table></center>";
     }
?>
