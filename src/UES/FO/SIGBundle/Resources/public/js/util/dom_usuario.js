define(['jquery'], function($) {
    return function() {
        var crear = $('#usuario_crear');
        var limpiar = $('#usuario_limpiar');
        var regresar = $('#usuario_regresar');
        var acciones = crear.parent().parent();
        acciones.removeClass('form-group').addClass('col-lg-offset-4 form-actions');
        acciones.append(crear).append(limpiar).append(regresar);
    };
})