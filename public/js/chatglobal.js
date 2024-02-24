var idUsuarioSeleccionado = null;

function seleccionChat(elemento) {
    idUsuarioSeleccionado = elemento.id;
    // Obtener todos los elementos con la clase 'nav-link'
    var elementosNav = document.querySelectorAll('.nav-link');

    // Iterar sobre cada elemento 'nav-link'
    elementosNav.forEach(function(elementoNav) {
        // Remover la clase 'active' de todos los elementos
        elementoNav.classList.remove('active');
    });

    // Agregar la clase 'active' al elemento seleccionado
    elemento.classList.add('active');

    enviarMensaje();
    setInterval(cargar_mensajes, 2000);
}


function enviarMensaje() {
    var mensaje = $('#buzon').val(); // Obtener el valor del textarea

    // Verificar si el campo 'mensaje' no está vacío
    if (mensaje.trim() !== '' && idUsuarioSeleccionado !== null) {
        $.ajax({
            url: baseUrl + '/envio', // Ruta a la que enviar la solicitud AJAX
            method: 'POST',
            data: { mensaje: mensaje, idUsuario: idUsuarioSeleccionado, _token: $('meta[name="csrf-token"]').attr('content') }, // Datos a enviar al servidor
            success: function(response) {
                // $('#mostrar_mensaje').text(response); // Actualizar el contenido de mostrar_mensaje con la respuesta del servidor
                $('#buzon').val('');

                $('#mostrar_mensaje').empty();
            
                // Agregar el contenido recibido como respuesta al div 'mostrar_mensaje'
                // $('#mostrar_mensaje').html(response);
                response.forEach(function(mensaje) {
                    // Crear un nuevo elemento <p> para el mensaje
                    var nuevoMensaje = $('<p></p>').text(mensaje.mensaje);

                    // Agregar el ID del usuario como atributo 'data-id-usuario'
                    nuevoMensaje.attr('id', mensaje.id_usuario);

                    // Agregar el nuevo mensaje al div 'mostrar_mensaje'
                    $('#mostrar_mensaje').append(nuevoMensaje);

                    if (mensaje.id_usuario == idUsuarioSeleccionado) {
                        nuevoMensaje.addClass('izquierda');
                    } else {
                        nuevoMensaje.addClass('derecha');
                    }
                });
            },
        });
    }else if(mensaje.trim() == '' && idUsuarioSeleccionado !== null){
        $.ajax({
            url: baseUrl + '/envio', // Ruta a la que enviar la solicitud AJAX
            method: 'POST',
            data: { idUsuario: idUsuarioSeleccionado, _token: $('meta[name="csrf-token"]').attr('content') }, // Datos a enviar al servidor
            success: function(response) {
                // $('#mostrar_mensaje').text(response); // Actualizar el contenido de mostrar_mensaje con la respuesta del servidor

                $('#mostrar_mensaje').empty();
            
                // Agregar el contenido recibido como respuesta al div 'mostrar_mensaje'
                // $('#mostrar_mensaje').html(response);
                response.forEach(function(mensaje) {
                    // Crear un nuevo elemento <p> para el mensaje
                    var nuevoMensaje = $('<p></p>').text(mensaje.mensaje);

                    nuevoMensaje.attr('id', mensaje.id_usuario);

                    // Agregar el nuevo mensaje al div 'mostrar_mensaje'
                    $('#mostrar_mensaje').append(nuevoMensaje);

                    if (mensaje.id_usuario== idUsuarioSeleccionado) {
                        nuevoMensaje.addClass('izquierda');
                    } else {
                        nuevoMensaje.addClass('derecha');
                    }
                    // Agregar el ID del usuario como atributo 'data-id-usuario'

                });
            },
        });
    }
     else {
        // Si el campo 'mensaje' está vacío, puedes mostrar un mensaje de error o realizar alguna otra acción
        console.error('El campo mensaje está vacío o no se ha seleccionado ningún usuario');
    }
}
function cargar_mensajes(){
    $.ajax({
        url: baseUrl + '/envio', // Ruta a la que enviar la solicitud AJAX
        method: 'POST',
        data: { idUsuario: idUsuarioSeleccionado, _token: $('meta[name="csrf-token"]').attr('content') }, // Datos a enviar al servidor
        success: function(response) {
            // $('#mostrar_mensaje').text(response); // Actualizar el contenido de mostrar_mensaje con la respuesta del servidor

            $('#mostrar_mensaje').empty();
        
            // Agregar el contenido recibido como respuesta al div 'mostrar_mensaje'
            // $('#mostrar_mensaje').html(response);
            response.forEach(function(mensaje) {
                // Crear un nuevo elemento <p> para el mensaje
                var nuevoMensaje = $('<p></p>').text(mensaje.mensaje);

                nuevoMensaje.attr('id', mensaje.id_usuario);

                // Agregar el nuevo mensaje al div 'mostrar_mensaje'
                $('#mostrar_mensaje').append(nuevoMensaje);

                if (mensaje.id_usuario== idUsuarioSeleccionado) {
                    nuevoMensaje.addClass('izquierda');
                } else {
                    nuevoMensaje.addClass('derecha');
                }
                // Agregar el ID del usuario como atributo 'data-id-usuario'

            });
        },
    });
}

