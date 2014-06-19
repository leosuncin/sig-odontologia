define(['./util/validador', './util/strengthPwd'], function(validador, strengthPwd) {
    'use strict';
    return function() {
        validador('form[name="form"]', {
            'form[password][first]': {
                minlength: 8,
                maxlength: 16,
                password: true
            },
            'form[password][second]': {
                minlength: 8,
                maxlength: 16,
                confirm_password: true
            }
        });
        strengthPwd('#form_password_first');
    };
})