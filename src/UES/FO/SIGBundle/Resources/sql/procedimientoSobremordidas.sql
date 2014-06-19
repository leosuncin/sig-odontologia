DROP PROCEDURE IF EXISTS pr_reporte_sobremordidas;
DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_sobremordidas`(IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN mmHorizontal INT, IN mmVertical INT, 
											OUT  totalx4 INT, OUT totalx4nina INT, OUT  totalx5 INT, OUT totalx5nina INT,
											OUT  totalx6 INT, OUT totalx6nina INT, OUT  totalx7 INT, OUT totalx7nina INT,
											OUT  totalx8 INT, OUT totalx8nina INT, OUT  totalx9 INT, OUT totalx9nina INT,
											OUT  totalx10 INT, OUT totalx10nina INT, OUT  totalx11 INT, OUT totalx11nina INT,
											OUT  totalx12 INT, OUT totalx12nina INT)

BEGIN
   #Calcula numero de Ninos y Ninas de 4 anios que poseen sobremordidas.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=4
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx4;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=4
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx4nina;
   ELSE
	   #Calcula numero de nin@s de 4 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=4
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx4;
	END IF;

	#Calcula numero de Ninos y Ninas de 5 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=5
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx5;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=4
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx5nina;
   ELSE
	   #Calcula numero de nin@s de 5 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=5
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx5;
	END IF;

	#Calcula numero de Ninos y Ninas de 6 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=6
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx6;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=6
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx6nina;
   ELSE
	   #Calcula numero de nin@s de 6 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=6
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx6;
	END IF;

	#Calcula numero de Ninos y Ninas de 7 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=7
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx7;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=7
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx7nina;
   ELSE
	   #Calcula numero de nin@s de 7 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=7
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx7;
	END IF;

	#Calcula numero de Ninos y Ninas de 8 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=8
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx8;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=8
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx8nina;
   ELSE
	   #Calcula numero de nin@s de 8 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=8
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx8;
	END IF;

   #Calcula numero de Ninos y Ninas de 9 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=9
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx9;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=9
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx9nina;
   ELSE
	   #Calcula numero de nin@s de 9 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=9
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx9;
	END IF;

	#Calcula numero de Ninos y Ninas de 10 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=4
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx10;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=4
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx10nina;
   ELSE
	   #Calcula numero de nin@s de 10 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=10
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx10;
	END IF;

	#Calcula numero de Ninos y Ninas de 11 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=11
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx11;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=11
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx11nina;
   ELSE
	   #Calc de nin@s de 11 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=11
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx11;
    END IF;

	#Calcula numero de Ninos y Ninas de 12 anios que poseen sobremordida.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=12
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx12;

	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=12
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx12nina;
   ELSE
	   #Calcula numero de nin@s de 12 anios poseem sobremordida
	   SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=12
	   and horizontal=mmHorizontal and vertical=mmVertical INTO totalx12;
	END IF;
END$$
DELIMITER ;