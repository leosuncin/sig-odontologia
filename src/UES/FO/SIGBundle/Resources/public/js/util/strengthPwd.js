define(['strength-meter'], function($) {
    'use strict';
    return function(el) {
        $(el).strength({
            showToggle: false,
            inputTemplate: '{input}',
            verdictTitles: {
                0: 'Muy corta',
                1: 'Muy debil',
                2: 'Debil',
                3: 'Buena',
                4: 'Fuerte',
                5: 'Muy fuerte',
            }
        });
    };
});