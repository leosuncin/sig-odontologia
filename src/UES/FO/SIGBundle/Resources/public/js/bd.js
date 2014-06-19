define(['./util/calendario', './util/submit_form2'], function(calendario, submit) {
	calendario();
    submit('form[name="parametros"]', Routing.generate('validar-respaldo'));
})
