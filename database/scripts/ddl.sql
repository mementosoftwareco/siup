--Tabla de perfiles

create table PERFILES(
ID NUMERIC(10,0) PRIMARY KEY,
NOMBRE VARCHAR2(50),
DESCRIPCION VARCHAR2(100)
);

--Tabla de Departamentos

create table DEPARTAMENTOS (
ID NUMERIC(10,0) PRIMARY KEY,
NOMBRE VARCHAR2(50),
CODIGO VARCHAR2(30)
);

create table MUNICIPIOS (
ID NUMERIC(10,0) PRIMARY KEY,
NOMBRE VARCHAR2(50),
CODIGO VARCHAR2(30),
CODIGO_DEPTO VARCHAR2(30)
);

create table CENTROS_POBLADO (
ID NUMERIC(10,0) PRIMARY KEY,
NOMBRE VARCHAR2(50),
CODIGO VARCHAR2(30),
CODIGO_MUNICIPIO VARCHAR2(30)
);

alter table educaciones add programa_pregrado varchar2(400);
ALTER TABLE UBICACIONES_GEOGRAFICAS MODIFY (MUNICIPIO NULL);
ALTER TABLE EDUCACIONES MODIFY (TIPO_EDUCACION NULL);