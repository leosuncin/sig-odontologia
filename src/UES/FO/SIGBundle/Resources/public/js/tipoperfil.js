define(['./util/calendario', './util/submit_form'], function(calendario, submit) {
	calendario();
    submit('form[name="parametros"]', Routing.generate('validar-tipo-perfil'));
    $('#parametros_perfil').change(function() {
    	switch($('#parametros_perfil').val()) {
    		case '1':
    			$('#parametros_tipo').html('<option value="1">Dolicofacial</option><option value="2">Mesofacial</option><option value="3">Braquifacial</option>');
    			break;
			case '2':
				$('#parametros_tipo').html('<option value="1">Ortognatico</option><option value="2">Divergente Anterior</option><option value="3">Divergente Posterior</option>');
				break;
			case '3':
				$('#parametros_tipo').html('<option value="1">Recto</option><option value="2">Concavo</option><option value="3">Convexo</option>');
				break;
    	}
    });
})
