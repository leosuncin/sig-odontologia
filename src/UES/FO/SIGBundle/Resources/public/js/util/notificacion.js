define(['noty'], function($) {
    'use strict';
    return function(mensaje, tipo, fnClose) {
        return $('#navbar-menu').noty({
            text: mensaje,
            type: tipo,
            layout: 'top',
            dismissQueue: true,
            closeWith: ['click', 'button'],
            callback: {
                afterClose: fnClose
            }
        });
    };
})