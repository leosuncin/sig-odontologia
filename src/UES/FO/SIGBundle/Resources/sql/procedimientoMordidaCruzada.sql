DROP PROCEDURE IF EXISTS pr_reporte_mordidacruzada;
DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_mordidacruzadas`(IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, IN cuadrantesup INT, IN piezasup INT, IN cuadranteinf INT, IN piezainf INT,
											OUT  totalx4 INT, OUT totalx4nina INT, OUT  totalx5 INT, OUT totalx5nina INT,
											OUT  totalx6 INT, OUT totalx6nina INT, OUT  totalx7 INT, OUT totalx7nina INT,
											OUT  totalx8 INT, OUT totalx8nina INT, OUT  totalx9 INT, OUT totalx9nina INT,
											OUT  totalx10 INT, OUT totalx10nina INT, OUT  totalx11 INT, OUT totalx11nina INT,
											OUT  totalx12 INT, OUT totalx12nina INT)

BEGIN
   #Calcula numero de Ninos y Ninas de 4 anios que poseen mordidacruzadas.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=4
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx4;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=4
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx4nina;
   ELSE
	   #Calcula numero de nin@s de 4 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=4
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx4;
	END IF;

	#Calcula numero de Ninos y Ninas de 5 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=5
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx5;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=5
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx5nina;
   ELSE
	   #Calcula numero de nin@s de 5 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=5
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx5;
	END IF;

	#Calcula numero de Ninos y Ninas de 6 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=6
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx6;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=6
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx6nina;
   ELSE
	   #Calcula numero de nin@s de 6 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=6
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx6;
	END IF;

	#Calcula numero de Ninos y Ninas de 7 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=7
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx7;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=7
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx7nina;
   ELSE
	   #Calcula numero de nin@s de 7 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=7
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx7;
	END IF;

	#Calcula numero de Ninos y Ninas de 8 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=8
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx8;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=8
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx8nina;
   ELSE
	   #Calcula numero de nin@s de 8 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=8
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx8;
	END IF;

   #Calcula numero de Ninos y Ninas de 9 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=9
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx9;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=9
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx9nina;
   ELSE
	   #Calcula numero de nin@s de 9 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=9
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx9;
	END IF;

	#Calcula numero de Ninos y Ninas de 10 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=10
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx10;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=10
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx10nina;
   ELSE
	   #Calcula numero de nin@s de 10 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=10
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx10;
	END IF;

	#Calcula numero de Ninos y Ninas de 11 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=11
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx11;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=11
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx11nina;
   ELSE
	   #Calc de nin@s de 11 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=11
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx11;
    END IF;

	#Calcula numero de Ninos y Ninas de 12 anios que poseen mordidacruzada.
   IF sexo = 0 THEN
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=12
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx12;

	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=12
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx12nina;
   ELSE
	   #Calcula numero de nin@s de 12 anios poseem mordidacruzada
	   SELECT count( * ) from datosgenerales JOIN mordidacruzada where datosgenerales.codexpediente=mordidacruzada.codexpediente 
	   and fecharegistro between fecha_inicio and fecha_fin and genero=sexo and edadregistro=12
	   and cuadsuperior=cuadrantesup and piezasuperior=piezasup
	   and cuadinferior=cuadranteinf and piezainferior=piezainf INTO totalx12;
	END IF;
END$$
DELIMITER ;