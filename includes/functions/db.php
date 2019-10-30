
<?php 

    // Credenciales de la base de datos
    define('DB_USUARIO', 'root');
    define('DB_CONTRASEÑA', '');
    define('DB_HOST', '127.0.0.1');
    define('DB_NOMBRE', 'agendaphp');

    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRASEÑA, DB_NOMBRE);

    echo $conexion->ping();
    
?>