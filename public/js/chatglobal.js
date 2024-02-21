function enviarMensaje() {
    var mensaje = $('#buzon').val(); // Obtener el valor del textarea

    // Verificar si el campo 'mensaje' no está vacío
    if (mensaje.trim() !== '') {
        $.ajax({
            url: '/enviar-mensaje', // Ruta a la que enviar la solicitud AJAX
            method: 'POST',
            data: { mensaje: mensaje }, // Datos a enviar al servidor
            success: function(response) {
                $('#mostrar_mensaje').text(response); // Actualizar el contenido de mostrar_mensaje con la respuesta del servidor
            },
        });
    } else {
        // Si el campo 'mensaje' está vacío, puedes mostrar un mensaje de error o realizar alguna otra acción
        console.error('El campo mensaje está vacío');
    }
}