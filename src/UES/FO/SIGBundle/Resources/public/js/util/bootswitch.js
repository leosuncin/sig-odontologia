define(['bootstrap-switch'], function($) {
    'use strict';
    return function(el, onText, offText, onChange) {
        if (typeof onText == 'undefined' || onText === null || onText.length == 0)
            onText = 'Cierto';
        if (typeof offText == 'undefined' || offText === null || offText.length == 0)
            offText = 'Falso';
        return $(el).bootstrapSwitch({
            size: 'normal',
            animate: true,
            onText: onText,
            onColor: 'success',
            offText: offText,
            offColor: 'warning',
            labelText: '<i class="glyphicon glyphicon-transfer"></i>',
            onSwitchChange: onChange
        });
    };
});