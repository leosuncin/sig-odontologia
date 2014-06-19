define(['./util/validador', './util/strengthPwd'], function(validador, strengthPwd) {
    'use strict';
    $('[name$="[actions][cambiar]"]')
        .parent()
        .append($('#usuario_pwd_actions_regresar'));

    validador('form[name="usuario_pwd"]', {
        'usuario_pwd[old_password]': {
            minlength: 8,
            maxlength: 16,
            password: true
        },
        'usuario_pwd[new_password][first]': {
            minlength: 8,
            maxlength: 16,
            password: true
        },
        'usuario_pwd[new_password][second]': {
            minlength: 8,
            maxlength: 16,
            confirm_password: true
        }
    });

    strengthPwd('[name$="[new_password][first]"]');
})