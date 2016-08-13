<?php
    //Calculamos si estamos en el Inicio (index.php):
    if ($this_file == "index.php") { echo "= <b title=\"".$you_are_here."\">".$label_index."</b> ="; }
    else { echo "<a href=\"index.php?".$sid_get."\" title=\"".$label_index."\">".$label_index."</a>"; }
?>
<br>
<br>
<?php
    //Incluimos el archivo que define si se ha seleccionado una categoria valida:
    include "category_filter.php";
    
    //Si estamos en "Todos", se selecciona:
    if ($category == "all" && $this_file == "products.php") { echo "= <b title=\"".$you_are_here."\">".$label_products_all."</b> =<br>"; }
    //Si no, se muestra como enlace:
    else { echo "<a href=\"products.php?category=all&".$sid_get."\" title=\"".$label_products_all."\">".$label_products_all."</a><br>"; }
    
    //Se hace un bucle de la matriz que contiene las categorias:
    foreach ($categories as $category_name)
     {
        //Si la pagina actual es products.php y la categoria enviada por GET esta en la BD:
        if ($this_file == "products.php" && $category != "all" && $category == $category_name)
         {
            //...entonces, estamos en products.php?category=$category_valor:
            echo "= <b title=\"".$you_are_here."\">".ucfirst(strtolower($category_name))."</b> =<br>";
         }
        //Si no es asi, no estamos en products.php?category=$category_valor y lo creamos como enlace:
        else { $category_name = ucfirst(strtolower($category_name)); echo "<a href=\"products.php?category=".$category_name."&".$sid_get."\" title=\"".$category_name."\">".$category_name."</a><br>"; }
     }
?>
<br>
<?php
    //Calculamos si estamos en Cesta (basket.php):
    if ($this_file == "basket.php") { echo "= <b title=\"".$you_are_here."\">".$label_basket."</b> ="; }
    else { echo "<a href=\"basket.php?".$sid_get."\" title=\"".$label_basket."\">".$label_basket."</a>"; }
?>
<br>
<?php
    //Calculamos si estamos en Pedido (checkout.php):
    if ($this_file == "checkout.php") { echo "= <b title=\"".$you_are_here."\">".$label_checkout."</b> ="; }
    else { echo "<a href=\"checkout.php?".$sid_get."\" title=\"".$label_checkout."\">".$label_checkout."</a>"; }
?>
<br>
<br>
<a href="mailto:unahojadepapel@hotmail.com" title="E-Mail">E-Mail</a>
