define(['./validador', './notificacion', './strengthPwd'], function(validador, notificar, strengthPwd) {
    'use strict';
    return function(modal, routeGet, routePut) {
        function onLoad() {
            strengthPwd('[name$="[new_password][first]"]');
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
        };

        $(modal).on('show.bs.modal', function() {
            var modalBody = $(modal + ' .modal-body');
            if (modalBody.has('form').length <= 0) {
                $.ajax({
                    url: routeGet,
                    type: 'GET',
                    dataType: 'html'
                }).fail(function(e) {
                    console.log(e);
                    modalBody.html('<div class="alert aler-danger"><strong>ERROR:</strong> no se pudo cargar el contenido</div>');
                }).done(function(response) {
                    modalBody.html(response);
                    modalBody.removeClass('loading');
                    window.setTimeout(onLoad, 100);
                });
            }
            $(modal + '-acept').button('reset');
        });

        $(modal).on('shown.bs.modal', onLoad);

        return $(modal + '-acept').click(function() {
            var btn = $(this);
            if ($('form[name="usuario_pwd"]').valid()) {
                btn.button('loading');
                $.ajax({
                    url: routePut,
                    type: 'PUT',
                    dataType: 'json',
                    data: $('form[name="usuario_pwd"]').serialize()
                }).done(function(response) {
                    notificar(response.message, 'success');
                    btn.button('reset');
                }).fail(function(e) {
                    var response = JSON.parse(e.responseText);
                    $(modal + ' .modal-body').html(response.view);
                    notificar(response.message, 'warning', function() {
                        $(modal).modal('show');
                    });
                    btn.button('reset');
                });
                $(modal).modal('hide');
            }
        });
    }
})