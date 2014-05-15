/*==============================================================*/
/* dbms name:      mysql 4.0                                    */
/* created on:     09/05/2014 03:28:07 p.m.                     */
/*==============================================================*/
create database ortodonciabdg;
use ortodonciabdg;
/*==============================================================*/
/* table: usuario                                               */
/*==============================================================*/

create table usuario
(
   idusuario                      int                    not null auto_increment,
   nombres                        varchar(50)                    not null,
   apellidos                      varchar(50)                    not null,
   username                       varchar(10)                  not null unique,
   password                       varchar(150)                    not null,
   salt                           varchar(100)                    not null,
   nivel                          int                            not null,
   enabled                        boolean                          not null,
   locked                         boolean                           not null,
   role                           mediumtext                    not null,
   primary key (idusuario)
)
engine = innodb;

/*==============================================================*/
/* table: datosgenerales                                        */
/*==============================================================*/
create table datosgenerales
(
   codexpediente                  varchar(10)                    not null,
   edadregistro                   int                            not null,
   genero                         varchar(1)                     not null,
   fechanacimiento                date                           not null,
   fecharegistro                  date                           not null,
   primary key (codexpediente)
)
engine = innodb;

/*==============================================================*/
/* table: bitacora                                              */
/*==============================================================*/
create table bitacora
(
   idusuario                      int                    not null,
   idaccion                       int              not null auto_increment,
   accion                         varchar(50)                    not null,
   fechayhora                     datetime                       not null,
   primary key (idaccion),
   foreign key (idusuario) references usuario(idusuario)
)
engine = innodb;

/*==============================================================*/
/* table: catalogoenfermedades                                  */
/*==============================================================*/
create table catalogoenfermedades
(
   idenfermedad                   int           	not null auto_increment,
   nombreenfermedad               varchar(20)                    not null,
   primary key (idenfermedad)
)
engine = innodb;

/*==============================================================*/
/* table: citas                                                 */
/*==============================================================*/
create table citas
(
   codexpediente                  varchar(10)                    not null,
   numcita                        int      		  not null auto_increment,
   fechacita                      date                           not null,
   primary key (numcita),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;



/*==============================================================*/
/* table: diagnosticogeneral                                    */
/*==============================================================*/
create table diagnosticogeneral
(
   codexpediente                  varchar(10)                    not null,
   idcita                         int        	  not null auto_increment,
   tratamiento                    int                            not null,
   primary key (idcita),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;


/*==============================================================*/
/* table: estadiosdenolla                                       */
/*==============================================================*/
create table estadiosdenolla
(
   idestadio                      int             not null auto_increment,
   codexpediente                  varchar(10)                    not null,
   e51                            int                            not null,
   e52                            int                            not null,
   e53                            int                            not null,
   e54                            int                            not null,
   e55                            int                            not null,
   e61                            int                            not null,
   e62                            int                            not null,
   e63                            int                            not null,
   e64                            int                            not null,
   e65                            int                            not null,
   e71                            int                            not null,
   e72                            int                            not null,
   e73                            int                            not null,
   e74                            int                            not null,
   e75                            int                            not null,
   e81                            int                            not null,
   e82                            int                            not null,
   e83                            int                            not null,
   e84                            int                            not null,
   e85                            int                            not null,
   /*primary key (codexpediente)*/
     primary key (idestadio),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;


/* table: facialfrontal                                         */
/*==============================================================*/
create table facialfrontal
(
  
   idfacialfrontal                int       	  not null auto_increment,
   nombrefacialfrontal            varchar(20)                    not null,
   primary key (idfacialfrontal)
)
engine = innodb;

/*==============================================================*/
/* table: lineamediafacial                                      */
/*==============================================================*/
create table lineamediafacial

(
   idlineamediafacial             int             not null auto_increment,
   codexpediente                  varchar(10)                    not null,
   mx                             int                            not null,
   mxdesviacion                   int                            not null,
   md                             int                            not null,
   mddesviacion                   int                            not null,
 primary key (idlineamediafacial),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;

/*==============================================================*/
/* table: mordidacruzada                                        */
/*==============================================================*/
create table mordidacruzada
(
   idmordidacruzada			 	  int             not null auto_increment,
   codexpediente                  varchar(10)                    not null,
   cuadsuperior                   int                            not null,
   piezasuperior                  int                            not null,
   cuadinferior                   int                            not null,
   piezainferior                  int                            not null,
   inferior                       varchar(5)                     not null,
   superior                       varchar(5)                       not null,
   primary key (idmordidacruzada),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;

/*==============================================================*/
/* table: perfiltotal                         */
/*==============================================================*/
create table perfiltotal
(
  
   idperfiltotal                  int             not null auto_increment,
   nombreperfiltotal              varchar(20)                    not null,
   primary key (idperfiltotal)
)
engine = innodb;

/*==============================================================*/
/* table: perfiluntercioinferior                                */
/*==============================================================*/
create table perfiluntercioinferior
(
   
   idperfiluntercioinferior       int             not null auto_increment,
   nombreperfiluntercioinferior   varchar(20)                    not null,
   primary key (idperfiluntercioinferior)
)
engine = innodb;
/*==============================================================*/
/* table: tipodeperfil                                          */
/*==============================================================*/
create table tipodeperfil
(
   idtipodeperfil				  int        	  not null auto_increment,
   codexpediente                  varchar(10)                    not null,
   idfacialfrontal                int                            not null,
   idperfiltotal                  int                            not null,
   idperfiluntercioinferior       int                            not null,
   
   primary key (idtipodeperfil),
   foreign key (codexpediente) references datosgenerales(codexpediente),
   foreign key (idperfiluntercioinferior) references perfiluntercioinferior(idperfiluntercioinferior),
   foreign key (idfacialfrontal) references facialfrontal(idfacialfrontal),
   foreign key (idperfiltotal) references perfiltotal(idperfiltotal)
)
engine = innodb;
/*==============================================================*/
/* table: plantratamiento                                       */
/*==============================================================*/
create table plantratamiento
(
 
   idplan                         int     		  not null auto_increment,
   codexpediente				  varchar(10),
   nombretratamiento              varchar(30)                    not null,
   primary key (idplan),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;

/*==============================================================*/
/* table: registroenfermedades                                  */
/*==============================================================*/
create table registroenfermedades
(
   idregistro                     int     		  not null auto_increment,
   codexpediente                  varchar(10),
   idenfermedad                   int,
   primary key (idregistro),
   foreign key (codexpediente) references datosgenerales(codexpediente),
   foreign key (idenfermedad) references catalogoenfermedades(idenfermedad) 
)
engine = innodb;

/*==============================================================*/
/* table: relacionessagitales                                   */
/*==============================================================*/
create table relacionessagitales
(
   idrelacionessagitales	      int    	 	  not null auto_increment,
   codexpediente                  varchar(10)                    not null,
   molarderecha                   int                            not null,
   molarizquierda                 int                            not null,
   caninaderecha                  int                            not null,
   caninaizquierda                int                            not null,
   primary key (idrelacionessagitales),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;

/*==============================================================*/
/* table: sobremordida                                          */
/*==============================================================*/
create table sobremordida
(
   idsobremordida				  int             not null auto_increment,
   codexpediente                  varchar(10)                    not null,
   horizontal                     int                            not null,
   vertical                       int                            not null,
   primary key (idsobremordida),
   foreign key (codexpediente) references datosgenerales(codexpediente)
)
engine = innodb;

/*
alter table bitacora add constraint fk_genera foreign key (idusuario)
      references usuario (idusuario) on delete restrict on update restrict;

alter table citas add constraint fk_puede_tener foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table datosgenerales add constraint fk_presenta_un foreign key (_table__pk3, idfacialfrontal, idperfiltotal, idperfiluntercioinferior)
      references tipodeperfil (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;

alter table datosgenerales add constraint fk_presenta_una foreign key (_table__pk2)
      references lineamediafacial (codexpediente) on delete restrict on update restrict;

alter table datosgenerales add constraint fk_tiene foreign key (_table__pk4)
      references relacionessagitales (codexpediente) on delete restrict on update restrict;

alter table datosgenerales add constraint fk_tiene_una foreign key (_table__pk)
      references sobremordida (codexpediente) on delete restrict on update restrict;

alter table diagnosticogeneral add constraint fk_posee foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table estadiosdenolla add constraint fk_posee_varios foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table facialfrontal add constraint fk_tiene_un2 foreign key (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior)
      references tipodeperfil (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;

alter table lineamediafacial add constraint fk_presenta_una2 foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table mordidacruzada add constraint fk_presenta_tipos foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table perfilfrontal add constraint fk_contiene_un2 foreign key (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior)
      references tipodeperfil (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;

alter table perfiluntercioinferior add constraint fk_contiene_tipo2 foreign key (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior)
      references tipodeperfil (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;

alter table plantratamiento add constraint fk_se_asigna foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table registroenfermedades add constraint fk_contiene foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table registroenfermedades add constraint fk_esta_contenido_en foreign key (idenfermedad)
      references catalogoenfermedades (idenfermedad) on delete restrict on update restrict;

alter table relacionessagitales add constraint fk_tiene2 foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table sobremordida add constraint fk_tiene_una2 foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table tipodeperfil add constraint fk_contiene_tipo foreign key (_table__pk10, _table__pk7, _table__pk8, _table__pk9)
      references perfiluntercioinferior (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;

alter table tipodeperfil add constraint fk_contiene_un foreign key (_table__pk11, _table__pk4, _table__pk5, _table__pk6)
      references perfilfrontal (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;

alter table tipodeperfil add constraint fk_presenta_un2 foreign key (codexpediente)
      references datosgenerales (codexpediente) on delete restrict on update restrict;

alter table tipodeperfil add constraint fk_tiene_un foreign key (_table__pk12, _table__pk, _table__pk2, _table__pk3)
      references facialfrontal (codexpediente, idfacialfrontal, idperfiltotal, idperfiluntercioinferior) on delete restrict on update restrict;
*/
