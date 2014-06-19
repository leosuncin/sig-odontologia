DROP PROCEDURE IF EXISTS pr_reporte_lineas_medias2;
DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_lineas_medias2`(IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN orientacionmx INT,
                                           IN orientacionmd INT,IN milimetrosmx INT,IN milimetrosmd INT, 
                                           OUT totalx4 INT, OUT totalx5 INT, OUT totalx6 INT, 
                                           OUT totalx7 INT, OUT totalx8 INT, OUT totalx9 INT, 
                                           OUT totalx10 INT, OUT totalx11 INT, OUT total2x4 INT, 
                                           OUT total2x5 INT, OUT total2x6 INT, OUT total2x7 INT, 
                                           OUT total2x8 INT, OUT total2x9 INT, OUT total2x10 INT, 
                                           OUT total2x11 INT)

BEGIN
   #Calcula numero de Ninos y Ninas de 4 anios 
   
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx4;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=4
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x4;

   
	
	
	
	
#Calcula numero de Ninos y Ninas de 5 anios 
  
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx5;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=5
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x5;

   	
	
	
	
#Calcula numero de Ninos y Ninas de 6 anios 
 
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx6;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=6
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x6;

   	
	
	
#Calcula numero de Ninos y Ninas de 7 anios 
   
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx7;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=7
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x7;

  	
	
#Calcula numero de Ninos y Ninas de 8 anios 
 
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx8;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=8
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x8;

  
	
	
	

#Calcula numero de Ninos y Ninas de 9 anios 
   
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx9;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=9
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x9;

   
	
	
#Calcula numero de Ninos y Ninas de 10 anios 
   
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx10;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=10
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x10;

	
#Calcula numero de Ninos y Ninas de 11 anios 
   
	   
SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=1
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO totalx11;

SELECT COUNT(*) FROM  datosgenerales, lineamediafacial
WHERE datosgenerales.fecharegistro BETWEEN fecha_inicio AND fecha_fin
AND datosgenerales.codexpediente=lineamediafacial.codexpediente
AND datosgenerales.edadregistro=11
AND datosgenerales.genero=2
AND lineamediafacial.mx=milimetrosmx 
AND lineamediafacial.md=milimetrosmd
AND lineamediafacial.mxdesviacion=orientacionmx
AND lineamediafacial.mddesviacion=orientacionmd
INTO total2x11;

  
	

END$$


DELIMITER ;