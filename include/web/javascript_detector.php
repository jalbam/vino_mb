<?php
    //Se define la url para hacer el refresco, en caso de soportar JavaScript:
    $javascript_url_refresh = $this_file . "?javascript_support=enabled";

    //Si no soporta cookies, se agrega la ID de session en la url (para pasarla por GET):
    if (SID) { $javascript_url_refresh .= "&".session_name()."=".session_id(); }
?>
<script language="JavaScript1.2" type="text/javascript">
    <!--
    location.href="<?php echo $javascript_url_refresh; ?>";
    //-->    
</script>
<?php
    //Se setea la variable para indicar que ya se ha llamado a este archivo (ya se intento refrescar):
    $HTTP_SESSION_VARS["javascript_refreshed"] = TRUE;
?>
