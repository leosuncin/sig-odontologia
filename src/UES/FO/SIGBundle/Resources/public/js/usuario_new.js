define([
        './util/generate_username',
        './util/validador',
        './util/bootswitch',
        './util/strengthPwd'
    ],
    function(genUsername, validador, bootswitch, strengthPwd) {
        'use strict';
        $('#usuario_new_actions_crear')
            .parent()
            .append($('#usuario_new_actions_regresar'));

        $('#usuario_new_nombres').keypress(genUsername);
        $('#usuario_new_apellidos').keypress(genUsername);
        $('#usuario_new_username').focus(genUsername);

        validador('form[name="usuario_new"]', {
            'usuario_new[nombres]': {
                minlength: 3,
                maxlength: 50
            },
            'usuario_new[apellidos]': {
                minlength: 3,
                maxlength: 50
            },
            'usuario_new[username]': {
                minlength: 8,
                maxlength: 16,
                username: true
            },
            'usuario_new[password]': {
                minlength: 8,
                maxlength: 16,
                password: true
            },
            'usuario_new[enabled]': {
                required: false
            }
        });
        bootswitch('#usuario_new_enabled');
        strengthPwd('[type="password"]');
    });