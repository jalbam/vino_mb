<form method="get" action="products.php" style="display:inline;">
    <?php
        //Calculamos si el navegador no soporta cookies, para enviar la sesion por GET:
        if (SID)
         {
            echo "<input type=\"hidden\" name=\"".session_name()."\" value=\"".session_id()."\">";
         }
    ?>
    <input type="text" name="search" size="10" value="" title="<?php echo $search_input_title; ?>">
    <input type="submit" name="button" value="<?php echo $search_button_value; ?>" title="<?php echo $search_button_title; ?>">
</form>
