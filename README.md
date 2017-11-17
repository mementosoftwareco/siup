# SIUP - Sistema de registro de estudiantes


Ejecute los siguientes comandos

php artisan make:migration create_tipos_documento_table --create=tipos_documento

php artisan make:migration create_tipos_identification_table --create=tipos_identificacion

php artisan make:migration create_tipos_proceso_table --create=tipos_proceso

php artisan make:migration create_personas_table --create=personas

php artisan make:migration create_procesos_admision_table --create=procesos_admision

php artisan make:migration create_modalidades_table --create=modalidades

php artisan make:migration create_inscripciones_table --create=inscripciones

php artisan make:migration create_convenios_table --create=convenios

php artisan make:migration create_estados_civil_table --create=estados_civil

php artisan make:migration create_documentos_table --create=documentos

php artisan make:migration create_grupos_etnicos_table --create=grupos_etnicos

php artisan make:migration create_entrevistas_table --create=entrevistas

php artisan make:migration create_estados_validacion_table --create=estados_validacion

php artisan make:migration create_validaciones_table --create=validaciones

php artisan make:migration create_detalle_entrevistas_table --create=detalle_entrevistas

php artisan make:migration create_respuestas_table --create=respuestas

php artisan make:migration create_preguntas_table --create=preguntas

--modificacion de tablas el 16 de julio de 2017

alter table detalle_entrevistas drop constraint DETALLE_ENTREVISTAS_ID_RESPUES;
alter table detalle_entrevistas drop column id_respuesta;
drop table respuestas;
drop sequence "RESPUESTAS_ID_RESPUESTA_SEQ";
alter table detalle_entrevistas add texto_respuesta varchar2(1000);
alter table entrevistas add acepta_comunicacion varchar2(1);
alter table entrevistas add acepta_politicas_priv varchar2(1);

insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('He ingresado a la página de la universidad y he navegado por ella','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Leí el pensamiento Ibero (Misión y Visión) y me identifico en ellos','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('La universidad cuenta con un valor distintivo en comparación con otras instituciones','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Conozco los convenios con los que cuenta la universidad','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Conozco el proceso de admisión y los requisitos para mi matricula','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Cuento con los recursos tecnológicos para garantizar mi proceso de formación','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Tengo experiencia en procesos formativos bajo la modalidad virtual','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Revisé el programa que oferta el programa al que me inscribí','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Me identifico con el rol profesional y ocupacional de la carrera que elegí','N/A',1);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Al comenzar a estudiar una lectura, primero la leo toda de forma superficial','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('A medida que voy estudiando busco el significado de las palabras desconocidas ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Cuando estudio trato de resumir mentalmente lo más importante','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Cuando leo diferencio las ideas principales de las secundarias ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Establezco analogías elaborando metáforas con las cuestiones que estoy aprendiendo','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Uso aquello que aprendo, en la medida de lo posible, en mi vida diaria','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Me intereso por la aplicación que puedan tener los temas que estudio a los campos laborales que conozco','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Hago resúmenes de lo estudiado al final de cada tema','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Mientras estudio un tema hago mapas mentales o conceptuales ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Antes de iniciar el estudio de un tema distribuyo el tiempo de que dispongo ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Cuando se acercan los exámenes establezco un plan de trabajo para estudiar ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Cuando compruebo que las estrategias que utilizo para “aprender” no son eficaces busco otras alternativas','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Procuro que en el lugar que estudio no haya nada que pueda distraerme','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Me digo a mi mismo que puedo superar mi nivel de rendimiento actual ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Cuando tengo conflictos familiares, procuro resolverlos antes , si puedo, para concentrarme mejor en el estudio','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Me dirijo a mí mismo palabras de ánimo para estimularme y mantenerme en las tareas de estudio','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Estudio para ampliar mis conocimientos, para saber más, para ser más experto','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Me esfuerzo en el estudio para sentirme orgulloso ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Lo que he logrado en mi vida ha sido porque lo he buscado ','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Los logros que he tenido en mi vida se deben a mi esfuerzo','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Mejorará mi vida si me esfuerzo en ello','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Mantengo a mis amigos por decisión propia','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Las calificaciones que tengo se deben a mi empeño','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Tengo habilidad para relacionarme con las personas','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('He sacado buenas calificaciones porque le caigo bien a mis maestros','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Los logros que he tenido en mi vida se deben a la casualidad','N/A',2);
insert into preguntas (texto_pregunta, sugerencia, id_tipo_pregunta) values ('Lo que he logrado en mi vida ha sido porque así tenía que suceder','N/A',2);

--Agregar Captcha al proyecto:

Ejcutar el comando:

composer require captcha-com/laravel-captcha:"4.*"

Ejecutar el comando

php artisan vendor:publish

--Agregar BreadCrumbs
composer require davejamesmiller/laravel-breadcrumbs
php artisan vendor:publish

--Creando tablas para las vistas de parametros

create table siup_programas_table (
	cod_programa varchar2(4),
	desc_programa varchar2(30),
	modalidad varchar2(4000),
	activo varchar2(4),
	tipo_programa varchar2(120)
);

CREATE VIEW SIUP_PROGRAMAS AS 
   SELECT COD_PROGRAMA, DESC_PROGRAMA, MODALIDAD, ACTIVO, TIPO_PROGRAMA
   FROM SIUP_PROGRAMAS_TABLE;

create table siup_v_parametros_table (
	tabla varchar2(22),
	codigo varchar2(4),
	descripcion varchar2(30)
);

CREATE VIEW V_PARAMETROS AS 
   SELECT TABLA, CODIGO, DESCRIPCION
   FROM SIUP_V_PARAMETROS_TABLE;


Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PFT','FISIOTERAPIA','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPS','PSICOLOGIA','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPIV','LIC. EN PEDAG INFANTIL VIRTUAL',null,'Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EAU','ESP. EN AUDIOLOGIA',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EICD','ESP PROY INV CIENTIFICA DIST',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDFC','DIP NIV  FUND CARDIOPULM  SIST',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDSO','DIPLOM FISIO SALUD OCUPACIONAL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDTM','DIP TERAPIA MIOFUN Y DISFAGIA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGT','DIP GEST TALENTO HUM COMPETENC',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDIC','DIPL EN INVESTIGACION CINTIFIC',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CSG','CURSO SEMINARIO DE GRADO',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPIP','LIC. EN PEDAG INFANTIL PRESEN','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPID','LIC EN PEDAGOGIA INFANTIL DIST','DISTANCIA','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEEP','LIC. EN EDUCACION ESPECIAL PRE','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EFAC','ESP EN FONOAU EN CUIDA CRITICO',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EFAF','ESP EN FORML GEST PROG ACON FI',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EOAE','ESP ORIENT Y ASES EDUCATIVA',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EMED','ESP MEDIC Y EVAL CCIAS SOC DIS',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEED','LIC. EDUCACION ESPECIAL DIST','DISTANCIA','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GIP','TECNOL EN INFAN Y PREESCOLARES',null,'N','TECNOLOGICO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEEV','LIC EDUC ESPECIAL VIRTUAL',null,'Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDDF','DIP DID FLEX POB DIVERSAS VIRT',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CIPS','CURSO INTR PROG DE SALUD',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GDS','TECNOLOGIA EN DLLO SOFTWARE',null,'Y','TECNOLOGICO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDIA','CURSO DLLO INT DE INFAN Y ADOL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CSGR','CURSO CTOS ESP SIST GRAL RIESG',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDVM','DIPLOMADO EN VENTILACION MECAN',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CGIV','CURSO MOD DE GRADO INF VIRTUAL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPSV','PSICOLOGIA VIRTUAL',null,'Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CPPV','CURSO PREPA PSICOLOGÍA VIRT',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCCP','CURSO PREPA CONTADURIA PUBLIC',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DSRV','DIP SEG Y SAL TRAB RIESGOS PSI',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DSRP','DIP SEG Y SAL TRABA RIESG PRES',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EMEP','ESP MEDIC Y EVAL PRESENCIAL',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDIC','ESP DIS Y DLLO PROY  INV CIEN',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCPI','CURSO APROX A LA PRIM INFANCIA','DISTANCIA','Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEPB','LIC. EN EDUC PRE Y BAS PRIMARI',null,'N','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ESST','ESP GCIA DE SEG SALUD EN TRABA',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CNIF','VI ENCUENTRO DE INV EN FONOAUD',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDSM','DIP SOPORTE VITAL MULTI',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDES','DIP PRESC EJER FIS SALUD',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEB','CURSO ESTAD BASC VIRTUAL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCIV','CURSO INVESTIGACION DE MERCADO',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CESC','DIP EDUC SUPERIOR COLOMBIA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDIV','ESP DLLO INT INF ADOLES VIRTUA',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEA','DIP EVAL AFASIA Y TRAS RELAC',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAT','DIPLOMADO EN ACTUAL TRIBUTARIA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGU','DIP GESTION Y DOC UNIVERSITARI',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DGPV','DIPLOMADO EN GESTION PUBL VIRT',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PCP','CONTADURIA PUBLICA','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PMNI','MKT Y NEGOCIOS INTERNACIONALES','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CEOV','CURSO EVAL OBJETIVA DE LA VOZ',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ECID','ESP CONT INTERNO AUD SALUD PRE',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EGSP','ESP GER ORG SALUD PRESENC',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EAF','ESP. EN AUDITORIA FINANCIERA',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEP','PFPD ESTRAT PED PARA LA INCLUS',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CMGI','CURSO MOD GRADO INF Y ADOLES',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDSD','ESP FOR Y EVAL PROY DLLO SOC D',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDMI','DIPL EN ESTRAT Y MK INTERNAL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CMGA','CURSO MODALID GRADO AUDIOLOGIA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCFN','CURSO CORTO ECON Y COMERC INTE',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TLG','TECNICO PROFESIONAL EN LOG','PRESENCIAL','Y','TECNICO PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDPT','DIPLOM PSI TRAB E INNOVA ORGAN',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PFA','FONOAUDIOLOGIA','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCPS','CUR PRE INGRESO PROG SALUD','PRESENCIAL','Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PAF','ADMINISTRACION Y FINANZAS','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CSTC','SEM TALLER CRECIM DLLO PERSONA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDPD','DIP DIDAC FLEX POB DIVER PRESE',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GTLA','TECNOL EN TERAP LENG AUDICION',null,'N','TECNOLOGICO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EGSV','ESP GERENCIA  CALIDAD EN SALUD',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CNE','DIPLOM NEUROPSICOLOGIA ESCOLAR',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EUCS','ESP UNIVERSID Y CAMBIO SOCIAL',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDNF','DIPLOM NEUROREHAB ENFO FISIOTE',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CEFA','CURSO EST Y FORMA AUD ISO:9001',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDIF','DIP  EN NIIF',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGL','DIPLOM EN GEST LOG INTEGRAL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEC','DIPLOM EDUCACION POR CICLOS',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDDU','DIPLOM EN DOCENCIA UNIVERSITAR',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCPV','CURSO COMPL PAT LJE, HABLA VOZ',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGP','DIPLOMADO EN GESTION PUBLICA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PAL','ADMINISTRACION LOGISTICA','PRESENCIAL','Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GLG','TECNOLOGIA EN LOGISTICA','PRESENCIAL','Y','TECNOLOGICO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DINI','DIPLOMADO INTER DE INV E INDIC',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDSP','ESP FOR Y EVAL PROY DLLO SOC P',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EAI','ESP EN AUDITORIA INTEGRAL',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ERCI','ESP EN REHAB DISCAP COMUN INFA',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ECIP','ESP CONT INTERNO AUD SALUD PRE',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ECIA','ESP GER CONTROL INT AUD MEDICA',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PCTA','CONTADURIA PUBLICA ANTIGUO','PRESENCIAL','N','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GGTG','TECN GESTION TURISTICA Y GASTR',null,'Y','TECNOLOGICO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CAIG','CURSO ANALISIS E INTE DE GASES',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DEEI','DIPLOM ESPECIAL EDUCA INFANTIL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEI','LICENCIATURA EN EDUCA INFANTIL',null,'Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EFCC','ESP. EN FISIOT EN CUIDADO CRIT',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGD','DIPLOM GESTION DOCUMENTAL',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDFP','DIP ABORDJE FISI PAC PED Y NEO',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGF','DIPLOMADO EN GESTION FINANC',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDNA','DIPL NEUROPS TRAST APR',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CMGC','CURSO MODAL DE GRADO CUD CRITI',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAO','DIPLO EN DISEÑ Y ADAP ORT MANO',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCMS','CURSO CORTO MERCADEO DE SEVICI',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DCEB','DIP DLLO COMP EDU BASICA Y MED',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDU','ESP EN DOCENCIA UNIVERSITARIA',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EGSD','ESP GER ORG SALUD DISTANCIA',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDUD','PFPD ESTRAT PARA DISEÑO UNI DI',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TLA','TECNICO PROF INTER TERAP LENG',null,'N','TECNICO PROFESIONAL INTERMEDIO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TEE','TECNI PROF INTER EN EDU ESPEC',null,'N','TECNICO PROFESIONAL INTERMEDIO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCEC','CURSO CORTO ECON COMERC INTERN',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDPE','DIPLOM PRESCRIPC EJERC FISICO',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDFA','DIPLOM. FUND. DE AUDIOLOGIA',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAR','DIPLOM. EN ADMIN DEL RIESGO',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDRN','DIP ABORDAJE Y MANEJO RN EN CC',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PCPV','CONTADURIA PUBLICA VIRTUAL',null,'Y','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EPAC','ESP EN FORMUL Y GEST PROG ACON',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDIA','ESP EN DLLO INTEGRAL DE INFANC',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEEA','LIC. EN EDUC ESPECIAL ANTIGUO',null,'N','PROFESIONAL');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GEE','TECNOLOG EN EDUCACION ESPECIAL',null,'N','TECNOLOGICO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TEP','TEC PROF INTER EN EDU PREESCOL',null,'N','TECNICO PROFESIONAL INTERMEDIO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDTH','DIP EN GESTION Y DLLO TAL HUMA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDCI','DIP EN SEGUR LOG Y CIO INTERNA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDST','DIP SALUD Y SEG TRABAJO',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAB','DIPLOMADO EN AUDIOLOGIA BASICA',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAF','DIPLOM. EN FUNDA ACOND FISICO',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEI','DIP ESTRAT PED PARA LA INCLUS',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGI','DIP GESTION, TRANS INNO EN INV',null,'N','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDRC','DIPL EN REHABILITACION CARDIAC',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CPJ','DIP PSICOLOGIA JURIDICA',null,'Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCSI','CURSO CORTO SISTEMAS INF GEREN','PRESENCIAL','Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDNI','DIP.INTNALES DE INF FINAN IFRS',null,null,null);


Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','C','CASADO(A)');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','D','DIVORCIADO (A)');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','N','NO DECLARADO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','P','SEPARADO (A)');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','R','RELIGIOSO (A)');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','S','SOLTERO (A)');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','U','UNION LIBRE');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('ESTADO_CIVIL','V','VIUDO (A)');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('GENERO','F','FEMENINO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('GENERO','M','MASCULINO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','00','NO DECLARADO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','BA','BACHILLER');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','EC','EDUCACION CONTINUA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','ES','ESPECIALISTA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','MA','MAESTRIA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','PH','DOCTORADO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','PR','PROFESIONAL');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','TC','TECNICO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','TG','TECNOLOGICO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','TI','TECNICO PROFESIONAL INTERMEDIO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('NIVEL_EDUCATIVO','TP','TECNICO PROFESIONAL');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','1','INDIGENA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','2','MONTUBIO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','3','AFROCOLOMBIANO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','4','NEGRO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','5','MULATO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','6','MESTIZO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','7','BLANCO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_ETNIA','8','OTRO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','CC','CEDULA DE CIUDADANIA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','CE','CEDULA DE EXTRANJERIA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','NIT','NUMERO IDENTIFICACION TRIBUTA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','NUI','NUMERO UNICO DE IDENTIFICACION');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','PA','PASAPORTE');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','RUT','REGISTRO UNICO TRIBUTARIO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_DE_IDENTIFICACION','TI','TARJETA DE IDENTIDAD');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','A','ABUELA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','B','ABUELO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','C','AMIGA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','D','AMIGO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','E','ESPOSA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','F','ESPOSO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','G','GUARDIAN');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','H','HERMANA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','I','HERMANO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','J','HIJO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','K','HIJA');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','L','MADRE');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','M','OTRO');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','N','PADRE');
Insert into siup_v_parametros_table (TABLA,CODIGO,DESCRIPCION) values ('TIPO_PARENTESCO','O','VECINO');

--Comentario de prueba