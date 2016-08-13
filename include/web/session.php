<?php
    //Se define un nombre para la sesion:
    session_name("vino_session");
    
    //Se abre la sesion o se continua si ya ha sido abierta:
    session_start("vino_session");

    //Se setea el limite de ejecucion a infinito (excepto si PHP esta en modo seguro -safe mode-):
    set_time_limit(0);
?>
