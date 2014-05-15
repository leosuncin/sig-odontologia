define(function() {
    return function() {
        var nombre = document.getElementById('usuario_nombres').value;
        var apellido = document.getElementById('usuario_apellidos').value;
        if (nombre.length > 0 && apellido.length > 0) {
            console.log(nombre.split(" ")[0] + '.' + apellido.split(" ")[0]);
            var username = nombre.split(" ")[0] + '.' + apellido.split(" ")[0];
            username = username.slice(0, 10).toLowerCase();
            document.getElementById('usuario_username').value = username;
        }
    };
});