define(function() {
    return function() {
        var nombre = document.getElementById('usuario_nombres').value;
        var apellido = document.getElementById('usuario_apellidos').value;
        if (nombre.length > 0 && apellido.length > 0) {
            var username = nombre.split(" ")[0] + '_' + apellido.split(" ")[0];
            username = username.slice(0, 16).toLowerCase();
            document.getElementById('usuario_username').value = username;
        }
    };
});