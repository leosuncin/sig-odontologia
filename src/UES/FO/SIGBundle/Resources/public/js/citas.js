define(['./util/calendario', './util/submit_form'], function(calendario, submit) {
	calendario();
    submit('form[name="parametros"]', Routing.generate('validar-cantidad-citas'));
})
