<?php
    //Se setea la variable para saber si la cesta esta o no vacia:
    $basket_void = TRUE;
    //Se muestra la tabla:
    echo "<center><table border=\"1\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\">";
    echo "<tr><td align=\"center\"><font size=\"2\" color=\"".$color_text."\" face=\"verdana\"><b>".$table["name"]."</b></font></td><td align=\"center\"><font size=\"2\" color=\"".$color_text."\" face=\"verdana\"><b>".$table["description"]."</b></font></td><td align=\"center\"><font size=\"2\" color=\"".$color_text."\" face=\"verdana\"><b>".$table["category"]."</b></font></td><td align=\"center\"><font size=\"2\" color=\"".$color_text."\" face=\"verdana\"><b>".$table["price"]."</b></font></td><td align=\"center\"><font size=\"2\" color=\"".$color_text."\" face=\"verdana\"><b>".$table["total_price"]."</b></font></td><td align=\"center\"><font size=\"2\" color=\"".$color_text."\" face=\"verdana\"><b>".$table["quantity"]."</b></font></td></tr>";
    //Se setea algo en la variable para que no de error:
    $HTTP_SESSION_VARS["basket"]["0"] = 0;
    //Se desglosa la variable de sesion que contiene la cesta:
    foreach ($HTTP_SESSION_VARS["basket"] as $product_id => $value)
     {
        //Se escribe el comando:
        $command = "SELECT * FROM ".DB_TABLE_PRODUCTS_NAME." LEFT JOIN ".DB_TABLE_CATEGORIES_NAME." ON ".DB_TABLE_CATEGORIES_NAME.".category_id = ".DB_TABLE_PRODUCTS_NAME.".wine_category WHERE ".DB_TABLE_PRODUCTS_NAME.".wine_id = '".$product_id."'";
        //Se ejecuta el comando:
        $result = mysql_query($command);
        //Se muestran los resultados (si existen):
        while ($row = mysql_fetch_assoc($result))
         {
            //Se setea la variable para saber que la cesta no esta vacia:
            $basket_void = FALSE;
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

            echo "<td align=\"center\"><center><font size=\"2\" color=\"".$color_text."\" face=\"arial\">".$wine_image_link."<img src=\"img/products/mini/".$wine_image."\" width=\"40\" height=\"40\" hspace=\"0\" vspace=\"0\" border=\"0\" alt=\"".$row["wine_name"]."\" title=\"".$row["wine_name"]."\"><br><b>".$row["wine_name"]."</b></a></font></center></td>";

            echo "<td align=\"center\"><center><font size=\"2\" color=\"".$color_text."\" face=\"arial\">".$row["wine_description"]."</font></center></td>";
            echo "<td align=\"center\"><center><font size=\"2\" color=\"".$color_text."\" face=\"arial\">".ucfirst(strtolower($row["category_name"]))."</font></center></td>";
            echo "<td align=\"center\"><center><font size=\"1\" color=\"".$color_text."\" face=\"terminal\"><b>".number_format($row["wine_price"], $decimal_numbers, $decimal_separator, $miles_separator)."</b></font></center></td>";
            $sum_price = $row["wine_price"] * $HTTP_SESSION_VARS["basket"][$product_id]["quantity"];
            echo "<td align=\"center\"><center><font size=\"1\" color=\"".$color_text."\" face=\"terminal\"><b>".number_format($sum_price, $decimal_numbers, $decimal_separator, $miles_separator)."</b></font></center></td>";
            //Si no soporta cookies el navegador, se cera un input hidden para ponerlo en los dos formularios posteriores:
            if (SID) { $input_hidden = "<input type=\"hidden\" name=\"".session_name()."\" value=\"".session_id()."\">"; }
            else { $input_hidden = ""; }
            echo "<td align=\"center\">
                    <center><font size=\"2\" color=\"".$color_text."\" face=\"arial\">
                        <form method=\"get\" action=\"".$this_file."\" style=\"display:inline;\">
                            ".$input_hidden."
                            <input type=\"hidden\" name=\"action\" value=\"edit\">
                            <input type=\"hidden\" name=\"id\" value=\"".$product_id."\">
                            <input type=\"text\" name=\"quantity\" value=\"".$HTTP_SESSION_VARS["basket"][$product_id]["quantity"]."\" size=\"3\">
                            <br>
                            <input type=\"submit\" name=\"button_edit\" value=\"".$edit_button_value."\">
                        </form>
                        <br>
                        <form method=\"get\" action=\"".$this_file."\" style=\"display:inline;\">
                            ".$input_hidden."
                            <input type=\"hidden\" name=\"action\" value=\"delete\">
                            <input type=\"hidden\" name=\"id\" value=\"".$product_id."\">
                            <input type=\"submit\" name=\"button_delete\" value=\"".$delete_button_value."\">
                        </form>
                    </font></center></td>";
            echo "</tr>";
         }
     }
    
    //Si la cesta esta vacia, avisa:
    if (isset($basket_void) && $basket_void) { echo "<tr><td colspan=\"6\"><center>".$basket_void_text."</center></td></tr></table>"; }
    //Si no esta vacia, muestra el boton para ir a comprar:
    else { echo "</table><br><a href=\"checkout.php?".$sid_get."\" title=\"".$to_buy_text."\">".$to_buy_text."</a>"; }

    echo "</center>";
?>
