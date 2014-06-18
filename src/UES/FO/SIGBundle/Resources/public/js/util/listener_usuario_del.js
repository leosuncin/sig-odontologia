define(['./notificacion'], function(notificar) {
    'use strict';
    return function(modal, route) {
        return $(modal + '-acept').click(function() {
            var btn = $(this);
            btn.button('loading');
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json'
            }).done(function(data) {
                notificar(data.message + '.<br/>Espere a ser redirigido, en caso de no ser así haga clic <a href="' + data.url + '">aquí</a>', 'success');
                location.href = data.url;
            }).fail(function(data) {
                var response = JSON.parse(data.responseText);
                notificar(response.message, 'warning');
            }).always(function() {
                btn.button('reset');
                $(modal).modal('hide');
            });
        });
    };
})