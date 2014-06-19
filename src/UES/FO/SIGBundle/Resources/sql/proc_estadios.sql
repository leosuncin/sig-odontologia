DROP PROCEDURE IF EXISTS estadiosNolla2;
DELIMITER $$
USE `ortodonciabdg`$$
CREATE PROCEDURE `estadiosNolla2`(IN fecha_inicio Date, IN fecha_fin Date, IN pieza INT,
								  OUT totalcero INT, OUT totaluno INT, OUT totaldos INT,
								  OUT totaltres INT, OUT totalcuatro INT, OUT totalcinco INT,
								  OUT totalseis INT, OUT totalsiete INT, OUT totalocho INT,
								  OUT totalnueve INT, OUT totaldiez INT)

BEGIN

IF pieza=1 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_1=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_1=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_1=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_1=10 INTO totaldiez;

END IF;

IF pieza=2 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_2=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_2=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_2=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_2=10 INTO totaldiez;

END IF;

IF pieza=3 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_3=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_3=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_3=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_3=10 INTO totaldiez;

END IF;

IF pieza=4 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_4=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_4=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_4=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_4=10 INTO totaldiez;

END IF;

IF pieza=5 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.estadiosdenolla.e_1_5=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_5=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_5=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_5=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_5=10 INTO totaldiez;

END IF;

IF pieza=6 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_6=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_6=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_6=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_6=10 INTO totaldiez;

END IF;

IF pieza=7 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_7=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_7=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_7=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_7=10 INTO totaldiez;

END IF;

IF pieza=8 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_8=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_8=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_1_8=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_1_8=10 INTO totaldiez;

END IF;

IF pieza=9 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_1=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_1=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_1=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_1=10 INTO totaldiez;

END IF;

IF pieza=10 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_2=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_2=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_2=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_2=10 INTO totaldiez;

END IF;

IF pieza=11 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_3=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_3=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_3=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_3=10 INTO totaldiez;

END IF;

IF pieza=12 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_4=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_4=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_4=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_4=10 INTO totaldiez;

END IF;

IF pieza=13 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_5=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_5=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_5=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_5=10 INTO totaldiez;

END IF;


IF pieza=14 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_6=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_6=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_6=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_6=10 INTO totaldiez;

END IF;

IF pieza=15 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_7=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_7=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_7=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_7=10 INTO totaldiez;

END IF;

IF pieza=16 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_8=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_8=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_2_8=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_2_8=10 INTO totaldiez;

END IF;

IF pieza=17 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_1=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_1=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_1=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_1=10 INTO totaldiez;

END IF;

IF pieza=18 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_2=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_2=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_2=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_2=10 INTO totaldiez;

END IF;

IF pieza=19 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_3=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_3=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_3=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_3=10 INTO totaldiez;

END IF;

IF pieza=20 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_4=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_4=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_4=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_4=10 INTO totaldiez;

END IF;

IF pieza=21 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_5=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_5=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_5=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_5=10 INTO totaldiez;

END IF;

IF pieza=22 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_6=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_6=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_6=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_6=10 INTO totaldiez;

END IF;

IF pieza=23 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_7=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_7=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_7=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_7=10 INTO totaldiez;

END IF;

IF pieza=24 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_8=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_8=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_3_8=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_3_8=10 INTO totaldiez;

END IF;

IF pieza=25 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_1=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_1=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_1=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_1=10 INTO totaldiez;

END IF;

IF pieza=26 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_2=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_2=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_2=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_2=10 INTO totaldiez;

END IF;

IF pieza=27 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_3=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_3=10 INTO totaldiez;

END IF;

IF pieza=28 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_4=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_4=10 INTO totaldiez;

END IF;

IF pieza=29 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_5=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_5=10 INTO totaldiez;

END IF;

IF pieza=30 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_6=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_6=10 INTO totaldiez;

END IF;

IF pieza=31 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_7=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_7=10 INTO totaldiez;

END IF;

IF pieza=32 THEN


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=0 INTO totalcero;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=1 INTO totaluno;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=2 INTO totaldos;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=3 INTO totaltres;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=4 INTO totalcuatro;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=5 INTO totalcinco;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=6 INTO totalseis;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=7 INTO totalsiete;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=8 INTO totalocho;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and estadiosdenolla.e_4_8=9 INTO totalnueve;


select count(*) from estadiosdenolla JOIN datosgenerales
where datosgenerales.fecharegistro between fecha_inicio and fecha_fin
and  datosgenerales.codexpediente=estadiosdenolla.codexpediente
and  estadiosdenolla.e_4_8=10 INTO totaldiez;

END IF;
END$$
DELIMITER ;