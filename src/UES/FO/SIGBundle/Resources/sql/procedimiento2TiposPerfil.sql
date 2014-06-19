DROP PROCEDURE IF EXISTS pr_reporte_tipos_perfil2;
DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_tipos_perfil2`(IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN perfil INT, IN tipo INT, 
                                           OUT totalx4 INT, OUT totalx5 INT, OUT totalx6 INT, 
                                           OUT totalx7 INT, OUT totalx8 INT, OUT totalx9 INT, 
                                           OUT totalx10 INT, OUT totalx11 INT, OUT total2x4 INT, 
                                           OUT total2x5 INT, OUT total2x6 INT, OUT total2x7 INT, 
                                           OUT total2x8 INT, OUT total2x9 INT, OUT total2x10 INT, 
                                           OUT total2x11 INT)

BEGIN
   #Calcula numero de Ninos y Ninas de 4 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx4;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x4;

END IF;
  	
 #Calcula numero de Ninos y Ninas de 4 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx4;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x4;
	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 4 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx4;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x4;

 
	   
	END IF;
	
	

   #Calcula numero de Ninos y Ninas de 5 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx5;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x5;

	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 5 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx5;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x5;

	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 5 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx5;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x5;

  
	   
	END IF;	
	
	
	
	

   #Calcula numero de Ninos y Ninas de 6 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx6;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x6;

  
	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 6 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx6;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x6;
	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 6 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx6;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x6;

   
	   
	END IF;	
	
	

   #Calcula numero de Ninos y Ninas de 7 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx7;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x7;

   
	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 7 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx7;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x7;

	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 7 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx7;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x7;

  
	   
	END IF;	
	


   #Calcula numero de Ninos y Ninas de 8 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx8;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x8;


	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 8 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx8;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x8;

  
	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 8 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx8;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x8;

   
	   
	END IF;	
	
	
	
	
   #Calcula numero de Ninos y Ninas de 9 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx9;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x9;

 
	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 9 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx9;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x9;

  
	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 9 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx9;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x9;

     
	END IF;
	


   #Calcula numero de Ninos y Ninas de 10 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx10;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x10;

  
	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 10 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx10;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x10;

   
	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 10 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx10;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x10;

  
	   
	END IF;	
	
	
	
   #Calcula numero de Ninos y Ninas de 11 anios para facial frontal
   IF perfil = 1 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=1
AND tipodeperfil.idfacialfrontal=tipo INTO totalx11;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=2
AND tipodeperfil.idfacialfrontal=tipo INTO total2x11;

  
	   
	END IF;
	
	
	
 #Calcula numero de Ninos y Ninas de 11 anios para perfil total
   IF perfil = 2 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=1
AND tipodeperfil.idperfiltotal=tipo INTO totalx11;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=2
AND tipodeperfil.idperfiltotal=tipo INTO total2x11;

 
	   
	END IF;
		
	
	
	
	 #Calcula numero de Ninos y Ninas de 11 anios para perfil un tercio inferior
   IF perfil = 3 THEN
	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=1
AND tipodeperfil.idperfiluntercioinferior=tipo INTO totalx11;

	   
SELECT COUNT(*) FROM  datosgenerales, tipodeperfil
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=tipodeperfil.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=2
AND tipodeperfil.idperfiluntercioinferior=tipo INTO total2x11;

   
	   
	END IF;
	
	
	
		
END$$


DELIMITER ;