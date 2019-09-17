
const formularioContactos = document.querySelector('#contacto');

eventos();

function eventos(){
    // Cuando el formulario de crear o editar se ejecuta
    formularioContactos.addEventListener('submit', leerFormulario);
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

        if(accion === 'crear'){
            // Crearemos un nuevo Contacto
            isertarDB(infoContacto);
        } else {
            // Editaremos el Contacto
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
    // Pasar datos
    xhr.onload = function(){
        if(this.status === 200){
            // Leemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);
            console.log(respuesta.empresa);
        }
    }
    // Enviar datos
    xhr.send(datos);
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
