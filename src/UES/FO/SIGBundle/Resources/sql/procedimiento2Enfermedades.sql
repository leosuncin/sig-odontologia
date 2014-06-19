DROP PROCEDURE IF EXISTS pr_reporte_enfermedades2;
DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_enfermedades2`(IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN enfermedad INT, 
                                           OUT total4 INT, OUT total5 INT, OUT total6 INT, 
                                           OUT total7 INT, OUT total8 INT, OUT total9 INT, 
                                           OUT total10 INT, OUT total11 INT, OUT totalf4 INT, 
                                           OUT totalf5 INT, OUT totalf6 INT, OUT totalf7 INT, 
                                           OUT totalf8 INT, OUT totalf9 INT, OUT totalf10 INT, 
                                           OUT totalf11 INT)

BEGIN
   #Calcula numero de Ninos y Ninas de 4 anios que poseen alguna enfermedad.
  
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total4;

SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf4;
   
   #Calcula numero de Ninos y Ninas de 5 anios que poseen alguna enfermedad.
   
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total5;


SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf5;
	
	

   #Calcula numero de Ninos y Ninas de 6 anios que poseen alguna enfermedad.
  
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total6;


SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf6;


   #Calcula numero de Ninos y Ninas de 7 anios que poseen alguna enfermedad.
   
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total7;



SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf7;
	   
  	
	#Calcula numero de Ninos y Ninas de 8 anios que poseen alguna enfermedad.
  
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total8;



SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf8;
	   
   	
#Calcula numero de Ninos y Ninas de 9 anios que poseen alguna enfermedad.
  
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total9;



SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf9;
	   
	
#Calcula numero de Ninos y Ninas de 10 anios que poseen alguna enfermedad.
  
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total10;



SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf10;
	   
  	
	#Calcula numero de Ninos y Ninas de 11 anios que poseen alguna enfermedad.
   
	   
SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=1
AND registroenfermedades.idenfermedad=enfermedad INTO total11;


SELECT COUNT(*) FROM  datosgenerales, registroenfermedades
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=registroenfermedades.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=2
AND registroenfermedades.idenfermedad=enfermedad INTO totalf11;



	   	
	
END$$


DELIMITER ;