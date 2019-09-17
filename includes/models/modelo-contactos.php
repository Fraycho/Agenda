
<?php 

    if($_POST['accion'] == 'crear'){

        // Crea nuevo registro en la base de datos

        require_once('../functions/db.php');
        
        // Validar las entradas

        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

        try {
            $stmt = $conexion->prepare("INSERT INTO contactos (nombre, empresa, telefono) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $empresa, $telefono);
            $stmt->execute();
            $respuesta = array(
                'respuesta' => 'correcto',
                'info' => $stmt->affected_rows
            );
            $stmt->close();
            $conexion->close();
        } catch(Exception $e) {
            $respuesta = array(
                'error' => $e->getMessage()
            );
        }

        echo json_encode($respuesta);

    }
