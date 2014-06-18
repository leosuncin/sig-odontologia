
-- -----------------------------------------------------
-- procedure pr_reporte_cantidad_citas
-- -----------------------------------------------------

DROP PROCEDURE IF EXISTS pr_reporte_cantidad_citas;

DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_cantidad_citas` (IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN edad INT,  OUT  totalxmasc INT, OUT  totalxfem INT, OUT totalxedad INT, OUT totalxfecha INT)

BEGIN

#validacion por fecha
SELECT COUNT(*) FROM citas WHERE citas.fechacita between fecha_inicio AND fecha_fin INTO totalxfecha;

#validacion por sexo
#en la base 0-masc y 1-fem
#en el combo 0-ambos, 1-masc y 2-fem

#ambos
IF sexo=0 THEN 
    SELECT COUNT(*) FROM citas, datosgenerales WHERE citas.fechacita between  fecha_inicio AND fecha_fin AND citas.codexpediente = datosgenerales.codexpediente AND datosgenerales.genero = 0 INTO totalxmasc;
    
    SELECT COUNT(*) FROM citas, datosgenerales WHERE citas.fechacita between  fecha_inicio AND fecha_fin AND citas.codexpediente = datosgenerales.codexpediente AND datosgenerales.genero = 1 INTO totalxfem;

#niño
ELSEIF sexo=1 THEN
    SELECT COUNT(*) FROM citas, datosgenerales WHERE citas.fechacita between  fecha_inicio AND fecha_fin AND citas.codexpediente = datosgenerales.codexpediente AND datosgenerales.genero = 0 INTO totalxmasc;
    SET totalxfem=0;

#niña
ELSE 
    SELECT COUNT(*) FROM citas, datosgenerales WHERE citas.fechacita between  fecha_inicio AND fecha_fin AND citas.codexpediente = datosgenerales.codexpediente AND datosgenerales.genero = 1 INTO totalxfem; 
    SET totalxmasc=0;    
END IF;

#por edad
IF edad = 3 THEN
SELECT COUNT(*) FROM citas, datosgenerales WHERE citas.fechacita between fecha_inicio AND fecha_fin AND citas.codexpediente = datosgenerales.codexpediente INTO totalxedad;	
ELSE
SELECT COUNT(*) FROM citas, datosgenerales WHERE citas.fechacita between fecha_inicio AND fecha_fin AND citas.codexpediente = datosgenerales.codexpediente AND datosgenerales.edadregistro = edad INTO totalxedad;
END IF;

END$$

DELIMITER ;