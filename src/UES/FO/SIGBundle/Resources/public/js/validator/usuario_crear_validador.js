define(['jquery-validation', '../util/mostrar_errores.js', '../util/addMethodValidator'], function($, mostrarErrores) {
    return {
        rules: {
            'usuario[nombres]': {
                minlength: 3,
                maxlength: 50
            },
            'usuario[apellidos]': {
                minlength: 3,
                maxlength: 50
            },
            'usuario[username]': {
                minlength: 6,
                maxlength: 10
            },
            'usuario[password]': {
                minlength: 8,
                maxlength: 16,
                password: true
            },
            'usuario[enabled]': {
                required: false
            }
        },
        showErrors: function(errorMap, errorList) {
            $.each(this.successList, function(index, value) {
                return $(value).popover("hide");
            });
            return $.each(errorList, function(index, value) {
                var _popover;
                _popover = $(value.element).popover({
                    trigger: 'manual',
                    placement: 'auto',
                    content: value.message,
                    template: '<div class="popover"><div class="arrow"></div><div class="popover-content"></div></div>'
                });
                _popover.data("bs.popover").options.content = value.message; /* Booststrap 3*/
                /*_popover.data("popover").options.content = value.message;/* Bootstrap 2*/
                return $(value.element).popover("show");
            });
        }
    };
});