define(['jquery-validation'], function($) {
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

    $.validator.addMethod("nombre", function(value) {
        return /^[A-Za-z]+(\s[A-Za-z]+)*$/.test(value);
    }, 'El nombre solo debe contener letras');
})