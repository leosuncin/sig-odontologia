define(['jquery-validation'], function($, add) {
    $.validator.addMethod("password", function(value) {
        return /(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){8,16}.+$)/.test(value);
    }, function(params, element) {
        var passwd = element.value;
        var mensaje = "La contraseña por lo menos debe tener";
        if (!/(?=.*[a-z])/g.test(passwd))
            mensaje += " una letra en minúscula, ";
        if (!/(?=.*[A-Z])/g.test(passwd))
            mensaje += " una letra en mayúscula, ";
        if (!/(?=.*\d)/g.test(passwd))
            mensaje += " un numero";
        return mensaje;
    });

    $.validator.addMethod('username', function(value) {
        return /^[A-Za-z0-9_-]*$/.test(value);
    }, 'El nombre de usuario solo debe contener letras, numeros, _ y -');

    $.validator.addMethod("nombre", function(value) {
        return /^[A-ZÑÁÉÍÓÚa-zñáéíóú]+(\s[A-ZÑÁÉÍÓÚa-zñáéíóú]+)*$/.test(value);
    }, 'El nombre solo debe contener letras');

    $.validator.addMethod("confirm_password", function(value) {
        return $('#form_new_password_first').val() == $('#form_new_password_second').val();
    }, 'Debe repetir la nueva contraseña');

    return function(form, reglas) {
        return $(form).validate({
            rules: reglas,
            showErrors: function(errorMap, errorList) {
                $.each(this.successList, function(index, value) {
                    return $(value).popover("hide");
                });
                return $.each(errorList, function(index, value) {
                    var _popover;
                    _popover = $(value.element).popover({
                        trigger: 'manual',
                        placement: 'bottom',
                        content: value.message,
                        template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'
                    });
                    _popover.data("bs.popover").options.content = value.message; /* Booststrap 3*/
                    /*_popover.data("popover").options.content = value.message;/* Bootstrap 2*/
                    return $(value.element).popover("show");
                });
            }
        });
    };
})
