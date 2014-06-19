define(function() {
    'use strict';
    return function() {
        var nombre = document.getElementById('usuario_new_nombres').value;
        var apellido = document.getElementById('usuario_new_apellidos').value;
        if (nombre.length > 0 && apellido.length > 0) {
            var username = nombre.split(" ")[0] + '_' + apellido.split(" ")[0];
            username = username.slice(0, 16).toLowerCase();
            document.getElementById('usuario_new_username').value = username;
        }
    };
});