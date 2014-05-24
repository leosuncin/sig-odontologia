define(['bootstrap-switch', 'strength-meter'], function($, $$) {
    return {
        bootswitch: function(el, onText, offText, onChange) {
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
        },
        strengthPwd: function(el) {
            $(el).strength({
                showToggle: false,
                inputTemplate: '{input}',
                //mainTemplate: '<td>{input}</td><td class="kv-meter-container hidden-xs">{meter}</td>',
                verdictTitles: {
                    0: 'Muy corta',
                    1: 'Muy debil',
                    2: 'Debil',
                    3: 'Buena',
                    4: 'Fuerte',
                    5: 'Muy fuerte',
                }
            });
        }
    }
});