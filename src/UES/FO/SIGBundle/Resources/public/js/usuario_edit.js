define([
    './util/validador',
    './util/bootswitch'
], function(validador, bootswitch) {
    'use strict';
    $('[name$="[actions][modificar]"]')
        .parent()
        .append($('#usario_edit_actions_regresar'));
    $('[name$="[actions][pwd]"]')
        .removeClass('btn-default')
        .addClass('btn-info');
    $('[name$="[actions][eliminar]"]')
        .removeClass('btn-default')
        .addClass('btn-danger');

    validador('form[name^="usuario_edit"]', {
        'usuario_edit[nombres]': {
            minlength: 3,
            maxlength: 50
        },
        'usuario_edit[apellidos]': {
            minlength: 3,
            maxlength: 50
        },
        'usuario_edit[enabled]': {
            required: false
        },
        'usuario_edit[locked]': {
            required: false
        },
        'usuario_edit_simple[nombres]': {
            minlength: 3,
            maxlength: 50
        },
        'usuario_edit_simple[apellidos]': {
            minlength: 3,
            maxlength: 50
        }
    });

    bootswitch('[type="checkbox"]');
})