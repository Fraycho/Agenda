
const formularioContactos = document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody');

eventos();

function eventos(){
    // Cuando el formulario de crear o editar se ejecuta
    formularioContactos.addEventListener('submit', leerFormulario);

    // Boton eliminar
    listadoContactos.addEventListener('click', eliminarContacto)
}

function leerFormulario(e){
    
    // Leer datos de los inputs
    const nombre = document.querySelector('#nombre').value,
          empresa = document.querySelector('#empresa').value,
          telefono = document.querySelector('#telefono').value,
          accion = document.querySelector('#accion').value;
    
    if(nombre === '' || empresa === '' || telefono === ''){
        // 2 parametros: texto y clase
        mostrarNotificacion('Todos los campos son obligatorios', 'error');
    } else {
        // Pasa la vadilcaion, llamar a Ajax
        const infoContacto = new FormData();
        infoContacto.append('nombre', nombre);
        infoContacto.append('empresa', empresa);
        infoContacto.append('telefono', telefono);
        infoContacto.append('accion', accion);

        console.log(...infoContacto);

        if(accion === 'crear'){
            // Crearemos un nuevo Contacto
            isertarDB(infoContacto);
            console.log("Contacto creado");
        } else {
            // Editaremos el Contacto

            console.log("Contacto Editado");
        }
    }
}


// Inserta en la base de datos via Ajax

function isertarDB(datos){
    // Llamado a Ajax

    // Crear el objeto
    const xhr = new XMLHttpRequest();
    // Abrir conexion
    xhr.open('POST', 'includes/models/modelo-contactos.php', true);
    // Leer respuesta
    xhr.onload = function(){
        if(this.status === 200){

            // Leemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);          
            console.log(respuesta);

            // Inserta un nuevo elemento a la tabla
            const nuevoContacto = document.createElement('tr');
            nuevoContacto.innerHTML = `
                <td>${respuesta.datos.nombre}</td>
                <td>${respuesta.datos.empresa}</td>
                <td>${respuesta.datos.telefono}</td>
            `

            // Contenedor para los botones
            const contenedorAcciones = document.createElement('td');

            // Icono Editar------------------------------------------------------------------
            const iconoEditar = document.createElement('i');
            iconoEditar.classList.add("fas", "fa-pen-square");

            // Enlace editar
            const botonEditar = document.createElement('a');
            botonEditar.appendChild(iconoEditar);
            botonEditar.href = `editar.php?id=${respuesta.datos.id_insertado}`;
            botonEditar.classList.add("btn", "btn-editar");

            contenedorAcciones.appendChild(botonEditar);

            // Incono Borrar ---------------------------------------------------------------
            const iconoBorrar = document.createElement('i');
            iconoBorrar.classList.add("fas", "fa-trash-alt");

            // Boton borrar
            const botonBorrar = document.createElement('button');
            botonBorrar.appendChild(iconoBorrar);
            botonBorrar.setAttribute('data-id', respuesta.datos.id_insertado);
            botonBorrar.classList.add("btn", "btn-borrar");

            contenedorAcciones.appendChild(botonBorrar);

            // Agregar al <tr>
            nuevoContacto.appendChild(contenedorAcciones);

            // Agregar elemento creado a la tabla
            listadoContactos.appendChild(nuevoContacto);

            // Limpiar formulario -------------------------------------------------------------
            document.querySelector('form').reset();

            // Notificacion
            mostrarNotificacion('Contacto creado correctamente', 'correcto');

        }
    }
    // Enviar datos
    xhr.send(datos);
}


// Eliminar contacto

function eliminarContacto(e){
    if( e.target.parentElement.classList.contains('btn-borrar') ){
        //Tomar el id
        const id = e.target.parentElement.getAttribute('data-id');
        
        console.log(id);
        const respuesta = confirm('¿Está Seguro(a)?');

        if(respuesta){
            // Llamado a AJAX
            // Crear el objeto
            const xhr = new XMLHttpRequest();

            // Abrir la conexion
            xhr.open('GET', `includes/models/modelo-contactos.php?id=${id}&accion=borrar`, true);

            // Leer la respuesta
            xhr.onload = function(){
                if(this.status === 200){
                    const resultado = JSON.parse(xhr.responseText);
                    if(resultado.respuesta === 'correcto'){
                        //Eliminar registro del DOM
                        console.log(e.target.parentElement.parentElement.parentElement);
                        e.target.parentElement.parentElement.parentElement.remove();

                        // Notificacion
                        mostrarNotificacion('Contacto Eliminado', 'correcto');
                    } else {
                        // Notificacion
                        mostrarNotificacion('Hubo un error...', 'error');
                    }
                    console.log(resultado);
                }
            }
            
            // Enviar la peticion
            xhr.send();
        }
    }
    
}


// Notificacion en Pantalla

function mostrarNotificacion(mensaje, clase){
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    // Formulario
    formularioContactos.insertBefore(notificacion, document.querySelector('form legend'));

    // Ocultar y Mostrar notificacion
    setTimeout(() => {
        notificacion.classList.add('visible');

        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    }, 100);

}
