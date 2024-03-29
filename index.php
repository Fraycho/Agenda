
<?php
    include "includes/functions/funciones.php";
    include "includes/layout/header.php";
?>

    <div class="contenedor-barra">

        <h1>Agenda de Contactos</h1>

    </div>



    <div class="bg-amarillo contenedor sombra">
        
        <form action="#" id="contacto">

            <legend>Añada un Contacto <span>Todos los campos son obligatorios</span></legend>

            <?php include "includes/layout/formulario.php"; ?>

        </form>

    </div>



    <div class="bg-blanco contenedor sombra contactos">

        <div class="contenedor-contactos">

            <h2>Contactos</h2>

            <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar Contactos...">

            <p class="total-contactos"><span>2</span> Contactos</p>

            <div class="contenedor-tabla">

                <table id="listado-contactos" class="listado-contactos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $contactos = obtenerContactos();

                        if($contactos->num_rows):
                            foreach($contactos as $contacto): ?>
            
                                <tr>
                                    <td><?php echo $contacto['nombre']; ?></td>
                                    <td><?php echo $contacto['empresa']; ?></td>
                                    <td><?php echo $contacto['telefono']; ?></td>
                                    <td>
                                        <a class="btn btn-editar" href="editar.php?id=<?php echo $contacto['id']; ?>"><i class="fas fa-pen-square"></i></a>
                                        <button data-id="<?php echo $contacto['id']; ?>" type="button" class="btn btn-borrar"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                        <?php endforeach;
                        endif; ?>

                    
                    </tbody>
                    
                </table>
            </div> <!-- Tabla -->

        </div>

    </div>




<?php include "includes/layout/footer.php"; ?>