define(['bootstrap-datepicker'], function($) {
    return function() {
        return $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            clearBtn: true,
            language: 'es',
            autoClose: true
        });
    };
})
