<script language="JavaScript1.2" type="text/javascript">
    <!--
    //Se declara la funcion:
    function open_image(url)
     {
        <?php
            //Calculamos si el navegador no soporta cookies:
            if (SID)
             {
                echo "var sid_get = '?".session_name()."=".session_id()."';";
             }
            else { echo "var sid_get = '?sid=no';"; }
        ?>
        //Se abre la ventana:
        var window_image = window.open(url + sid_get, "_blank", "scrollbars=yes,menubar=no,height=450,width=610,resizable=yes,toolbar=no,location=no,status=no");
        //Se pone en primer plano la ventana:
        window_image.focus();
     }
    //-->
</script>
