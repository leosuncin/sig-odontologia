
-- -----------------------------------------------------
-- procedure pr_reporte_relaciones_sagitales
-- -----------------------------------------------------

DROP PROCEDURE IF EXISTS pr_reporte_relaciones_sagitales;

DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_relaciones_sagitales` (IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN edad INT, IN diente INT, OUT masC1 INT, OUT masC2 INT, OUT masC3 INT, OUT masCC INT, OUT masNE INT, OUT femC1 INT, OUT femC2 INT, OUT femC3 INT, OUT femCC INT, OUT femNE INT, OUT edadC1 INT, OUT edadC2 INT, OUT edadC3 INT, OUT edadCC INT, OUT edadNE INT)

BEGIN


#Diente 0 --> Molarderecha
#       1 --> Molarizquierda
#		2 --> Canina derecha
#		3 --> Canina izquierda

#relaciones sagitales
#       1 --> C1
#       2 --> C2
#		3 --> C3
#		4 --> CC
#       5 --> NE


#sexo
#       0 --> Niños
#       1 --> Niñas

#***********+************+************+*************
#Validacion por sexo
#En la base 0-masc y 1-fem
#En el combo 0-ambos, 1-masc y 2-fem

#***************************************************
#    TODOS LOS RESULTADOS

IF diente = 0 THEN
	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarderecha = 1 INTO masC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarderecha = 2 INTO masC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarderecha = 3 INTO masC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarderecha = 4 INTO masCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarderecha = 5 INTO masNE;

   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarderecha = 1 INTO femC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarderecha = 2 INTO femC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarderecha = 3 INTO femC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarderecha = 4 INTO femCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarderecha = 5 INTO femNE;

   	#por edad
	IF edad = 3 THEN
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 1 INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 2 INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 3 INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 4 INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 5 INTO edadNE;
	ELSE
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 1 AND datosgenerales.edadregistro=edad INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 2 AND datosgenerales.edadregistro=edad INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 3 AND datosgenerales.edadregistro=edad INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 4 AND datosgenerales.edadregistro=edad INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarderecha = 5 AND datosgenerales.edadregistro=edad INTO edadNE;
	END IF;
ELSEIF diente = 1 THEN
	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarizquierda = 1 INTO masC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarizquierda = 2 INTO masC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarizquierda = 3 INTO masC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarizquierda = 4 INTO masCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.molarizquierda = 5 INTO masNE;

   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarizquierda = 1 INTO femC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarizquierda = 2 INTO femC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarizquierda = 3 INTO femC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarizquierda = 4 INTO femCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.molarizquierda = 5 INTO femNE;

   	#por edad
	IF edad = 3 THEN
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 1 INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 2 INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 3 INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 4 INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 5 INTO edadNE;
	ELSE
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 1 AND datosgenerales.edadregistro=edad INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 2 AND datosgenerales.edadregistro=edad INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 3 AND datosgenerales.edadregistro=edad INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 4 AND datosgenerales.edadregistro=edad INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.molarizquierda = 5 AND datosgenerales.edadregistro=edad INTO edadNE;
	END IF;

ELSEIF diente = 2 THEN 
	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaderecha = 1 INTO masC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaderecha = 2 INTO masC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaderecha = 3 INTO masC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaderecha = 4 INTO masCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaderecha = 5 INTO masNE;

   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaderecha = 1 INTO femC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaderecha = 2 INTO femC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaderecha = 3 INTO femC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaderecha = 4 INTO femCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaderecha = 5 INTO femNE;

   	#por edad
	IF edad = 3 THEN
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 1 INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 2 INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 3 INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 4 INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 5 INTO edadNE;
	ELSE
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 1 AND datosgenerales.edadregistro=edad INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 2 AND datosgenerales.edadregistro=edad INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 3 AND datosgenerales.edadregistro=edad INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 4 AND datosgenerales.edadregistro=edad INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaderecha = 5 AND datosgenerales.edadregistro=edad INTO edadNE;
	END IF;

ELSEIF diente = 3 THEN
	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaizquierda = 1 INTO masC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaizquierda = 2 INTO masC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaizquierda = 3 INTO masC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaizquierda = 4 INTO masCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=0 AND relacionessagitales.caninaizquierda = 5 INTO masNE;

   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaizquierda = 1 INTO femC1;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaizquierda = 2 INTO femC2;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaizquierda = 3 INTO femC3;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaizquierda = 4 INTO femCC;
   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND datosgenerales.genero=1 AND relacionessagitales.caninaizquierda = 5 INTO femNE;

   	#por edad
	IF edad = 3 THEN
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 1 INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 2 INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 3 INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 4 INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 5 INTO edadNE;
	ELSE
		SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 1 AND datosgenerales.edadregistro=edad INTO edadC1;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 2 AND datosgenerales.edadregistro=edad INTO edadC2;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 3 AND datosgenerales.edadregistro=edad INTO edadC3;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 4 AND datosgenerales.edadregistro=edad INTO edadCC;
	   	SELECT COUNT(*) FROM relacionessagitales, datosgenerales WHERE relacionessagitales.codexpediente = datosgenerales.codexpediente AND datosgenerales.fecharegistro between fecha_inicio AND fecha_fin AND relacionessagitales.caninaizquierda = 5 AND datosgenerales.edadregistro=edad INTO edadNE;
	END IF;
END IF;

END$$
DELIMITER ;