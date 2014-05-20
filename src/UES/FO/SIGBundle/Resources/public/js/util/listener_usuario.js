define(['../validator/validadores', './notificacion'], function(validador, notificar) {
    return {
        eliminarUsuario: function(url) {
            return $('#modal-confirm-del-acept').click(function(event) {
                var btn = $(this);
                btn.button('loading');
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json'
                })
                    .done(function(data) {
                        notificar(data.message + '.<br/>Espere a ser redirigido, en caso de no ser así haga clic <a href="' + data.url + '">aquí</a>', 'success');
                        location.href = data.url;
                    })
                    .fail(function(data) {
                        var response = JSON.parse(data.responseText);
                        notificar(response.message, 'warning');
                    })
                    .always(function() {
                        btn.button('reset');
                        $('#modal-confirm-del').modal('hide');
                    });
            });
        },
        passwordUsuario: function(get, put) {
            $('#modal-confirm-pwd').on('show.bs.modal', function(e) {
                if ($('#modal-content').has('form').length <= 0) {
                    $.ajax({
                        url: get,
                        type: 'GET',
                        dataType: 'html'
                    })
                        .done(function(response) {
                            $('#modal-content').html(response);
                            validador.contrasenia('form[name="form"]');
                        });
                }
                $('#modal-confirm-pwd-acept').button('reset');
            });

            return $('#modal-confirm-pwd-acept').click(function(event) {
                var btn = $(this);
                if ($('form[name="form"]').valid()) {
                    btn.button('loading');
                    $.ajax({
                        url: put,
                        type: 'PUT',
                        dataType: 'json',
                        data: $('form[name="form"]').serialize()
                    })
                        .done(function(response) {
                            notificar(response.message, 'success');
                            btn.button('reset');
                        })
                        .fail(function(e) {
                            var response = JSON.parse(e.responseText);
                            $('#modal-content').html(response.view);
                            notificar(response.message, 'warning', function() {
                                $('#modal-confirm-pwd').modal('show');
                            });
                            btn.button('reset');
                        });
                    $('#modal-confirm-pwd').modal('hide');
                }
            });
        }
    }
})