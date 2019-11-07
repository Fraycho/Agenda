<?php 
    include "includes/layout/header.php"; 
    include "includes/functions/funciones.php";
?>

<?php 
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if(!$id){
        die('No es valido');
    }
    
    $resultado = obtenerContacto($id);
    $contacto = $resultado->fetch_assoc();
?>


<div class="contenedor-barra">

    <div class="contenedor barra">

        <a href="index.php" class="btn volver">Volver</a>
        <h1>Editar Contacto</h1>

    </div>

</div>

<div class="bg-amarillo contenedor sombra">
    
    <form id="contacto" action="#">

        <legend>Edite el Contacto <span>Todos los campos son obligatorios</span></legend>

        <?php include "includes/layout/formulario.php"; ?>

    </form>

</div>


<?php include "includes/layout/footer.php"; ?>