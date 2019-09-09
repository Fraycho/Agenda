
<?php include "includes/layout/header.php"; ?>

    <div class="contenedor-barra">

        <h1>Agenda de Contactos</h1>

    </div>



    <div class="bg-amarillo contenedor sombra">
        
        <form action="#" id="contacto">

            <legend>Añada un Contacto <span>Todos los campos son obligatorios</span></legend>

            <div class="campos">

                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" placeholder="Nombre Contacto" id="nombre">
                </div>
                <div class="campo">
                    <label for="empresa">Empresa:</label>
                    <input type="text" placeholder="Empresa Contacto" id="empresa">
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" placeholder="Teléfono Contacto" id="telefono">
                </div>
                
            </div>

            <div class="campo enviar">
                <input type="submit" value="Añadir">
            </div>

        </form>

    </div>



    <div class="bg-blanco contenedor sombra contactos">

        <div class="contenedor-contactos">

            <h2>Contactos</h2>

            <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar Contactos...">

            <p class="total-contactos"><span>2</span> Contactos</p>

            <div class="contenedor-tabla">

                <table id="listado" class="listado-contactos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Fray</td>
                            <td>Visual-Fymez</td>
                            <td>034 450 1450</td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=1"><i class="fas fa-pen-square"></i></a>
                                <button data-id="1" type="button" class="btn btn-borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Fray</td>
                            <td>Visual-Fymez</td>
                            <td>034 450 1450</td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=1"><i class="fas fa-pen-square"></i></a>
                                <button data-id="1" type="button" class="btn btn-borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Fray</td>
                            <td>Visual-Fymez</td>
                            <td>034 450 1450</td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=1"><i class="fas fa-pen-square"></i></a>
                                <button data-id="1" type="button" class="btn btn-borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div> <!-- Tabla -->

        </div>

    </div>




<?php include "includes/layout/footer.php"; ?>