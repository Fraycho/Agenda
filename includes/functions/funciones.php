<?php 

    function obtenerContactos(){
        include "db.php";

        try {
            return $conexion->query("SELECT id, nombre, empresa, telefono FROM contactos");
        } catch (Exception $e) {
            echo "Error" . $e->getMessage() . "<br>";
            return false;
        }
    }

    // Obtiene un contacto toma un id

    function obtenerContacto($id){
        include "db.php";

        try {
            return $conexion->query("SELECT id, nombre, empresa, telefono FROM contactos WHERE id = $id");
        } catch (Exception $e) {
            echo "Error" . $e->getMessage() . "<br>";
            return false;
        }
    }

?>