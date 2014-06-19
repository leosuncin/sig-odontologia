define(['./util/notificacion', './usuario_pwd_recover'], function(notificar, usuario_pwd_recover) {
    'use strict';
    var $modal = $('#modal-recover-pwd');
    var $accept = $('#modal-recover-pwd-acept');

    function listener() {
        usuario_pwd_recover();
        if ($('form[name="form"]').valid()) {
            $accept.button('loading');
            $.ajax({
                url: Routing.generate('usuario_restore_pwd', {
                    'username': $(this).data('username')
                }),
                type: 'POST',
                dataType: 'json',
                data: $('form[name="form"]').serialize(),
            }).done(function(response) {
                notificar(response.message, 'success', function() {
                    location.reload();
                });
            }).fail(function(error) {
                var response = JSON.parse(error.responseText);
                $('#modal-recover-pwd .modal-content').html(response.view);
                notificar(response.message, 'warning', function() {
                    $modal.modal('show');
                });
            }).always(function() {
                $accept.button('reset');
                $modal.modal('hide');
            });
        }
    };

    $modal.on('shown.bs.modal', usuario_pwd_recover);

    $modal.on('show.bs.modal', function() {
        document.getElementById('modal-recover-pwd-acept').addEventListener('click', listener, false);
    });

    $modal.on('loaded.bs.modal', function() {
        document.getElementById('modal-recover-pwd-acept').addEventListener('click', listener, false);
    });
})