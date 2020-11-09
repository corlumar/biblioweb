<div id="navigation">  
    <?php
    session_start();
    $nombre = $_SESSION['nombre'];
    ?> 
    <p> Usuario: <?php echo $nombre; ?> | <a href="cerrar_Sesion.php"> Cerrar Sesión</a> | <a href="javascript:history.back()"> Volver Atrás</a> | <a href="index.php"> Inicio</a></p>
</div>
