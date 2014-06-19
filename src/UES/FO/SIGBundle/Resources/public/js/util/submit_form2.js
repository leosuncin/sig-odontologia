define(['bootstrap', './errors_form'], function($, form) {
    'use strict';
    var btn = $('button[type="submit"]');
    var preview = $('#preview-report');

    $('button[type="reset"]').click(function() {
        btn.button('reset');
        form.resetAll();
        if (preview.has('iframe').length > 0) {
            preview.html('<div id="spinner"><div class="loader">Cargando...</div></div>');
            preview.addClass('hidden');
        }
    });

    return function(el, route) {
        return $(el).submit(function(e) {
            e.preventDefault();
            form.resetAll();
            btn.button('loading');
            preview.addClass('loading').removeClass('hidden');

            $.ajax({
                url: route,
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize()
            }).done(function(response) {
                var data = JSON.parse(response);
                window.setTimeout(function() {
                    if (preview.has('iframe').length > 0) {
                        $('iframe').prop('src', data.route);
                    } else {
                        preview.html('<iframe class="col-xs-12" frameborder="0" src="' + data.route + '" height="' + $(window).height() + '"></iframe>');
                    }
                    preview.removeClass('loading');
                    location.href = '#preview-report';
                }, 2000);
            }).fail(function(response) {
                preview.removeClass('loading').addClass('hidden');
                if (response.status == 400) {
                    var data = $.parseJSON($.parseJSON(response.responseText));
                    form.errorAll('parametros', data);
                }
            }).always(function() {
                btn.button('reset');
            });
        });
    };
})