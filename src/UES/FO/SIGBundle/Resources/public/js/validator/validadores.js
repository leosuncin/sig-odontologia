define(['./validador'], function(validador) {
    return {
        nuevo: function(form) {
            return validador(form, {
                'usuario[nombres]': {
                    minlength: 3,
                    maxlength: 50,
                    // nombre: true
                },
                'usuario[apellidos]': {
                    minlength: 3,
                    maxlength: 50,
                    // nombre: true
                },
                'usuario[username]': {
                    minlength: 8,
                    maxlength: 16,
                    username: true
                },
                'usuario[password]': {
                    minlength: 8,
                    maxlength: 16,
                    password: true
                },
                'usuario[enabled]': {
                    required: false
                }
            });
        },
        actualizar: function(form) {
            return validador(form, {
                'usuario[nombres]': {
                    minlength: 3,
                    maxlength: 50,
                    // nombre: true
                },
                'usuario[apellidos]': {
                    minlength: 3,
                    maxlength: 50,
                    // nombre: true
                },
                'usuario[enabled]': {
                    required: false
                },
                'usuario[locked]': {
                    required: false
                }
            });
        },
        contrasenia: function(form) {
            return validador(form, {
                'form[old_password]': {
                    minlength: 8,
                    maxlength: 16,
                    password: true
                },
                'form[new_password][first]': {
                    minlength: 8,
                    maxlength: 16,
                    password: true
                },
                'form[new_password][second]': {
                    minlength: 8,
                    maxlength: 16,
                    confirm_password: true
                }
            });
        }
    };
});
