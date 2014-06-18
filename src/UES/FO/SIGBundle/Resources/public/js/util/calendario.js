define(['bootstrap-datepicker', 'moment'], function($, moment) {
    'use strict';
    $.ajax({
        url: Routing.generate('periodo'),
        type: 'GET',
        dataType: 'json'
    }).done(function(response) {
        var inicio, fin;
        inicio = moment(response.inicio, 'YYYY-MM-DD');
        fin = moment(response.fin, 'YYYY-MM-DD');
        $('.datepicker').datepicker('setStartDate', inicio.toDate()).datepicker('setEndDate', fin.toDate());
    });
    return function() {
        return $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            clearBtn: true,
            language: 'es',
            autoClose: true
        });
    };
})