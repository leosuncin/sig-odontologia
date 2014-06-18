SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ortodonciabdg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ortodonciabdg` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `ortodonciabdg` ;

-- -----------------------------------------------------
-- Table `ortodonciabdg`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(50) NOT NULL,
  `apellidos` VARCHAR(50) NOT NULL,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `salt` VARCHAR(255) NOT NULL,
  `nivel` INT NOT NULL,
  `enabled` BOOLEAN NOT NULL DEFAULT 1,
  `locked` BOOLEAN NOT NULL DEFAULT 0,
  `role` MEDIUMTEXT NOT NULL,
  `recover` BOOLEAN NULL DEFAULT 0,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`datosgenerales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`datosgenerales` (
  `codexpediente` VARCHAR(10) NOT NULL,
  `edadregistro` INT NOT NULL,
  `genero` INT NOT NULL,
  `fechanacimiento` DATE NOT NULL,
  `fecharegistro` DATE NOT NULL,
  PRIMARY KEY (`codexpediente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`bitacora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`bitacora` (
  `idaccion` INT NOT NULL AUTO_INCREMENT,
  `idusuario` INT NOT NULL,
  `accion` VARCHAR(50) NOT NULL,
  `fechayhora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idaccion`),
  INDEX `fk_bitacora_usuario_idx` (`idusuario` ASC),
  CONSTRAINT `fk_bitacora_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `ortodonciabdg`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`catalogoenfermedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`catalogoenfermedades` (
  `idenfermedad` INT NOT NULL AUTO_INCREMENT,
  `nombreenfermedad` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idenfermedad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`citas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`citas` (
  `numcita` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `fechacita` DATE NOT NULL,
  PRIMARY KEY (`numcita`),
  INDEX `fk_citas_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_citas_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`diagnosticogeneral`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`diagnosticogeneral` (
  `idcita` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `tratamiento` INT NOT NULL,
  PRIMARY KEY (`idcita`),
  INDEX `fk_diagnosticogeneral_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_diagnosticogeneral_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`estadiosdenolla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`estadiosdenolla` (
  `idestadio` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `e51` INT NOT NULL,
  `e52` INT NOT NULL,
  `e53` INT NOT NULL,
  `e54` INT NOT NULL,
  `e55` INT NOT NULL,
  `e61` INT NOT NULL,
  `e62` INT NOT NULL,
  `e63` INT NOT NULL,
  `e64` INT NOT NULL,
  `e65` INT NOT NULL,
  `e71` INT NOT NULL,
  `e72` INT NOT NULL,
  `e73` INT NOT NULL,
  `e74` INT NOT NULL,
  `e75` INT NOT NULL,
  `e81` INT NOT NULL,
  `e82` INT NOT NULL,
  `e83` INT NOT NULL,
  `e84` INT NOT NULL,
  `e85` INT NOT NULL,
  PRIMARY KEY (`idestadio`),
  INDEX `fk_estadiosdenolla_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_estadiosdenolla_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`facialfrontal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`facialfrontal` (
  `idfacialfrontal` INT NOT NULL AUTO_INCREMENT,
  `nombrefacialfrontal` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idfacialfrontal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`lineamediafacial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`lineamediafacial` (
  `idlineamediafacial` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `mx` INT NOT NULL,
  `mxdesviacion` INT NOT NULL,
  `md` INT NOT NULL,
  `mddesviacion` INT NOT NULL,
  PRIMARY KEY (`idlineamediafacial`),
  INDEX `fk_lineamediafacial_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_lineamediafacial_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`mordidacruzada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`mordidacruzada` (
  `idmordidacruzada` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `cuadsuperior` INT NOT NULL,
  `piezasuperior` INT NOT NULL,
  `cuadinferior` INT NOT NULL,
  `piezainferior` INT NOT NULL,
  `inferior` VARCHAR(5) NOT NULL,
  `superior` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idmordidacruzada`),
  INDEX `fk_mordidacruzada_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_mordidacruzada_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`perfiltotal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`perfiltotal` (
  `idperfiltotal` INT NOT NULL AUTO_INCREMENT,
  `nombreperfiltotal` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idperfiltotal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`perfiluntercioinferior`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`perfiluntercioinferior` (
  `idperfiluntercioinferior` INT NOT NULL AUTO_INCREMENT,
  `nombreperfiluntercioinferior` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idperfiluntercioinferior`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`tipodeperfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`tipodeperfil` (
  `idtipodeperfil` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `idfacialfrontal` INT NOT NULL,
  `idperfiltotal` INT NOT NULL,
  `idperfiluntercioinferior` INT NOT NULL,
  PRIMARY KEY (`idtipodeperfil`),
  INDEX `fk_tipodeperfil_datosgenerales_idx` (`codexpediente` ASC),
  INDEX `fk_tipodeperfil_facialfrontal_idx` (`idfacialfrontal` ASC),
  INDEX `fk_tipodeperfil_perfiltotal_idx` (`idperfiltotal` ASC),
  INDEX `fk_tipodeperfil_perfiluntercioinferior_idx` (`idperfiluntercioinferior` ASC),
  CONSTRAINT `fk_tipodeperfil_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tipodeperfil_facialfrontal`
    FOREIGN KEY (`idfacialfrontal`)
    REFERENCES `ortodonciabdg`.`facialfrontal` (`idfacialfrontal`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tipodeperfil_perfiltotal`
    FOREIGN KEY (`idperfiltotal`)
    REFERENCES `ortodonciabdg`.`perfiltotal` (`idperfiltotal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipodeperfil_perfiluntercioinferior`
    FOREIGN KEY (`idperfiluntercioinferior`)
    REFERENCES `ortodonciabdg`.`perfiluntercioinferior` (`idperfiluntercioinferior`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`plantratamiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`plantratamiento` (
  `idplan` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `nombretratamiento` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idplan`),
  INDEX `fk_plantratamiento_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_plantratamiento_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`registroenfermedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`registroenfermedades` (
  `idregistro` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `idenfermedad` INT NULL,
  PRIMARY KEY (`idregistro`),
  INDEX `fk_registroenfermedades_datosgenerales_idx` (`codexpediente` ASC),
  INDEX `fk_registroenfermedades_catalogoenfermedades_idx` (`idenfermedad` ASC),
  CONSTRAINT `fk_registroenfermedades_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_registroenfermedades_catalogoenfermedades`
    FOREIGN KEY (`idenfermedad`)
    REFERENCES `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`relacionessagitales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`relacionessagitales` (
  `idrelacionessagitales` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `molarderecha` INT NOT NULL,
  `molarizquierda` INT NOT NULL,
  `caninaderecha` INT NOT NULL,
  `caninaizquierda` INT NOT NULL,
  PRIMARY KEY (`idrelacionessagitales`),
  INDEX `fk_relacionessagitales_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_relacionessagitales_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ortodonciabdg`.`sobremordida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ortodonciabdg`.`sobremordida` (
  `idsobremordida` INT NOT NULL AUTO_INCREMENT,
  `codexpediente` VARCHAR(10) NOT NULL,
  `horizontal` INT NOT NULL,
  `vertical` INT NOT NULL,
  PRIMARY KEY (`idsobremordida`),
  INDEX `fk_sobremordida_datosgenerales_idx` (`codexpediente` ASC),
  CONSTRAINT `fk_sobremordida_datosgenerales`
    FOREIGN KEY (`codexpediente`)
    REFERENCES `ortodonciabdg`.`datosgenerales` (`codexpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

USE `ortodonciabdg` ;

-- -----------------------------------------------------
-- procedure pr_reporte_asistencias
-- -----------------------------------------------------

DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_asistencias` (IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, OUT cant_ninios INT, OUT cant_ninias INT, OUT cant_total INT)
BEGIN
	SELECT DAY(fecha_inicio) + MONTH(fecha_inicio) + YEAR(fecha_inicio) INTO cant_ninios;
	SELECT DAY(fecha_fin) + MONTH(fecha_fin) + YEAR(fecha_fin) INTO cant_ninias;
	SELECT cant_ninios + cant_ninias INTO cant_total;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure pr_reporte_sobremordidas
-- -----------------------------------------------------
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
     and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=5
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
     and fecharegistro between fecha_inicio and fecha_fin and genero=1 and edadregistro=10
     and horizontal=mmHorizontal and vertical=mmVertical INTO totalx10;

     SELECT count( * ) from datosgenerales JOIN sobremordida where datosgenerales.codexpediente=sobremordida.codexpediente 
     and fecharegistro between fecha_inicio and fecha_fin and genero=2 and edadregistro=10
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

-- -----------------------------------------------------
-- procedure pr_reporte_mordidacruzada
-- -----------------------------------------------------
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

-- -----------------------------------------------------
-- procedure pr_reporte_tratamiento
-- -----------------------------------------------------

DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_tratamiento` (IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, OUT cant_ninios INT, OUT cant_ninias INT, OUT cant_total INT)
BEGIN
	SELECT DAY(fecha_inicio) + MONTH(fecha_inicio) + YEAR(fecha_inicio) INTO cant_ninios;
	SELECT DAY(fecha_fin) + MONTH(fecha_fin) + YEAR(fecha_fin) INTO cant_ninias;
	SELECT cant_ninios + cant_ninias INTO cant_total;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure pr_reporte_casos
-- -----------------------------------------------------

DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `pr_reporte_casos` (IN fecha_inicio Date, IN fecha_fin Date, IN sexo INT, OUT cant_ninios INT, OUT cant_ninias INT, OUT cant_total INT)
BEGIN
	SELECT DAY(fecha_inicio) + MONTH(fecha_inicio) + YEAR(fecha_inicio) INTO cant_ninios;
	SELECT DAY(fecha_fin) + MONTH(fecha_fin) + YEAR(fecha_fin) INTO cant_ninias;
	SELECT cant_ninios + cant_ninias INTO cant_total;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- function edad_registro
-- -----------------------------------------------------

DELIMITER $$
USE `ortodonciabdg`$$
CREATE FUNCTION `edad_registro` (nacimiento DATE, registro DATE) RETURNS INT DETERMINISTIC
	RETURN DATE_FORMAT(FROM_DAYS(TO_DAYS(registro) - TO_DAYS(nacimiento)), '%Y') + 0;$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `ortodonciabdg`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `ortodonciabdg`;
INSERT INTO `ortodonciabdg`.`usuario` (`idusuario`, `nombres`, `apellidos`, `username`, `password`, `salt`, `nivel`, `enabled`, `locked`, `role`, `recover`) VALUES (0, 'Usuario', 'Administrador', 'superadmin', 'jitzJL3isf7ZP2ZhBTLQkrCEbmaQNg/mnlBS8JCt94/2eUP9K5OCtC9UEZujJpz5mYtmHqAm3M7bS/NuTvhQgQ==', 'grdowsemqncog884ok0kwso8gos0g0c', 1, 1, 0, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `ortodonciabdg`.`catalogoenfermedades`
-- -----------------------------------------------------
START TRANSACTION;
USE `ortodonciabdg`;
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (1, 'Alergias');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (2, 'Desmayos');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (3, 'Presión sanguinea alta');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (4, 'Sinusitis');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (5, 'Hepatitis');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (6, 'Transtornos de la sangre');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (7, 'Asma');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (8, 'Artritis');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (9, 'Enfermedades venéreas');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (10, 'Diabetes');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (11, 'Gastritis');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (12, 'SIDA');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (13, 'Transtornos renales');
INSERT INTO `ortodonciabdg`.`catalogoenfermedades` (`idenfermedad`, `nombreenfermedad`) VALUES (14, 'Tuberculosis');

COMMIT;

