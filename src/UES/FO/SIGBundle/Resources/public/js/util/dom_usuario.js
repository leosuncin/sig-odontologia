define(function() {
    return {
        nuevo: function() {
            var crear = document.getElementById('usuario_actions_crear');
            var regresar = document.getElementById('usuario_actions_regresar');
            this.dom(crear, regresar);
        },
        actualizar: function() {
            var modificar = document.getElementById('usuario_modificar');
            var regresar = document.getElementById('usario_regresar');
            var revertir = document.getElementById('usuario_revertir');
            var eliminar = document.getElementById('usuario_eliminar');
            var contrasenia = document.getElementById('usuario_pwd')
            contrasenia.className = 'btn btn-info';
            var acciones = this.getPadre(modificar);
            acciones.appendChild(modificar);
            acciones.appendChild(regresar);
            acciones.appendChild(revertir);
            if (eliminar) {
                acciones.appendChild(eliminar);
                eliminar.className = 'btn btn-danger';
            }
            acciones.appendChild(contrasenia);
        },
        contrasenia: function() {
            var cambiar = document.getElementById('form_actions_cambiar');
            var regresar = document.getElementById('form_actions_regresar');
            this.dom(cambiar, regresar);
        },
        getPadre: function(button) {
            var padre = button.parentElement.parentElement;
            padre.className = 'col-lg-offset-4 form-actions'
            return padre;
        },
        dom: function(btn1, btn2) {
            var wrapper = btn1.parentElement;
            wrapper.appendChild(btn2);
        }
    };
})