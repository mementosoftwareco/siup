ALTER TABLE PERSONAS 
DROP CONSTRAINT PERSONAS_ID_TIPO_IDENTIFICACIO;

DELETE FROM TIPOS_IDENTIFICACION;

ALTER TABLE TIPOS_IDENTIFICACION  
MODIFY (ID_TIPO_IDENTIFICACION VARCHAR(20) );

ALTER TABLE PERSONAS  
MODIFY (ID_TIPO_IDENTIFICACION NULL);

UPDATE PERSONAS SET ID_TIPO_IDENTIFICACION = NULL;

ALTER TABLE PERSONAS  
MODIFY (ID_TIPO_IDENTIFICACION VARCHAR(20) );

drop trigger "SIUP"."TIPOS_IDENTIFICACION_ID_TIPO_I";

drop sequence "SIUP"."TIPOS_IDENTIFICACION_ID_TIPO_I";

Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('CC','CEDULA DE CIUDADANIA','CEDULA DE CIUDADANIA');
Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('CE','CEDULA DE EXTRANJERIA','CEDULA DE EXTRANJERIA');
Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('NIT','NUMERO IDENTIFICACION TRIBUTA','NUMERO IDENTIFICACION TRIBUTA');
Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('NUI','NUMERO UNICO DE IDENTIFICACION','NUMERO UNICO DE IDENTIFICACION');
Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('PA','PASAPORTE','PASAPORTE');
Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('RUT','REGISTRO UNICO TRIBUTARIO','REGISTRO UNICO TRIBUTARIO');
Insert into TIPOS_IDENTIFICACION (ID_TIPO_IDENTIFICACION,NOMBRE,DESCRIPCION)  values ('TI','TARJETA DE IDENTIDAD','TARJETA DE IDENTIDAD');

update personas set ID_TIPO_IDENTIFICACION = 'CC';

alter table "SIUP"."PERSONAS" add constraint PERSONAS_ID_TIPO_IDENTIFICACIO foreign key("ID_TIPO_IDENTIFICACION") references "TIPOS_IDENTIFICACION"("ID_TIPO_IDENTIFICACION");

--ACTUALIZACION DEL TIPO DE DATO PARA EL ID DE PROGRAMA DE NUMERO A CADENA DE CARACTERES

UPDATE INSCRIPCIONES SET ID_PROGRAMA = NULL;

ALTER TABLE INSCRIPCIONES  
MODIFY (ID_PROGRAMA VARCHAR(20) );

--ACTUALIZANDO POR ESTADOS CIVILES


ALTER TABLE INSCRIPCIONES 
DROP CONSTRAINT INSCRIPCIONES_ID_ESTADO_CIVIL_;

DELETE FROM ESTADOS_CIVIL;

ALTER TABLE ESTADOS_CIVIL  
MODIFY (ID_ESTADO_CIVIL VARCHAR2(20) );

UPDATE INSCRIPCIONES SET ID_ESTADO_CIVIL = NULL;

ALTER TABLE INSCRIPCIONES  
MODIFY (ID_ESTADO_CIVIL VARCHAR(20) );


INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('C','CASADO(A)', 'CASADO(A)');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('D','DIVORCIADO (A)','DIVORCIADO (A)');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('N','NO DECLARADO','NO DECLARADO');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('P','SEPARADO (A)','SEPARADO (A)');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('R','RELIGIOSO (A)','RELIGIOSO (A)');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('S','SOLTERO (A)','SOLTERO (A)');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('U','UNION LIBRE','UNION LIBRE');
INSERT INTO ESTADOS_CIVIL (ID_ESTADO_CIVIL, NOMBRE, DESCRIPCION) VALUES ('V','VIUDO (A)','VIUDO (A)');

--Cambios por los grupos etnicos

UPDATE INSCRIPCIONES SET ID_GRUPO_ETNICO = NULL;

DELETE FROM GRUPOS_ETNICOS;

INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('1','INDIGENA','INDIGENA');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('2','MONTUBIO','MONTUBIO');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('3','AFROCOLOMBIANO','AFROCOLOMBIANO');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('4','NEGRO','NEGRO');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('5','MULATO','MULATO');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('6','MESTIZO','MESTIZO');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('7','BLANCO','BLANCO');
INSERT INTO GRUPOS_ETNICOS (ID_GRUPO_ETNICO, NOMBRE, DESCRIPCION) VALUES ('8','OTRO','OTRO');


