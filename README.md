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


Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PFT','FISIOTERAPIA','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPS','PSICOLOGIA','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPIV','LIC. EN PEDAG INFANTIL VIRTUAL',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EAU','ESP. EN AUDIOLOGIA',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EICD','ESP PROY INV CIENTIFICA DIST',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDFC','DIP NIV  FUND CARDIOPULM  SIST',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDSO','DIPLOM FISIO SALUD OCUPACIONAL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDTM','DIP TERAPIA MIOFUN Y DISFAGIA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGT','DIP GEST TALENTO HUM COMPETENC',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDIC','DIPL EN INVESTIGACION CINTIFIC',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CSG','CURSO SEMINARIO DE GRADO',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPIP','LIC. EN PEDAG INFANTIL PRESEN','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPID','LIC EN PEDAGOGIA INFANTIL DIST','DISTANCIA','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEEP','LIC. EN EDUCACION ESPECIAL PRE','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EFAC','ESP EN FONOAU EN CUIDA CRITICO',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EFAF','ESP EN FORML GEST PROG ACON FI',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EOAE','ESP ORIENT Y ASES EDUCATIVA',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EMED','ESP MEDIC Y EVAL CCIAS SOC DIS',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEED','LIC. EDUCACION ESPECIAL DIST','DISTANCIA','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GIP','TECNOL EN INFAN Y PREESCOLARES',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEEV','LIC EDUC ESPECIAL VIRTUAL',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDDF','DIP DID FLEX POB DIVERSAS VIRT',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CIPS','CURSO INTR PROG DE SALUD',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GDS','TECNOLOGIA EN DLLO SOFTWARE',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDIA','CURSO DLLO INT DE INFAN Y ADOL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CSGR','CURSO CTOS ESP SIST GRAL RIESG',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDVM','DIPLOMADO EN VENTILACION MECAN',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CGIV','CURSO MOD DE GRADO INF VIRTUAL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PPSV','PSICOLOGIA VIRTUAL',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CPPV','CURSO PREPA PSICOLOGÍA VIRT',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCCP','CURSO PREPA CONTADURIA PUBLIC',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DSRV','DIP SEG Y SAL TRAB RIESGOS PSI',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DSRP','DIP SEG Y SAL TRABA RIESG PRES',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EMEP','ESP MEDIC Y EVAL PRESENCIAL',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDIC','ESP DIS Y DLLO PROY  INV CIEN',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCPI','CURSO APROX A LA PRIM INFANCIA','DISTANCIA','Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEPB','LIC. EN EDUC PRE Y BAS PRIMARI',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ESST','ESP GCIA DE SEG SALUD EN TRABA',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CNIF','VI ENCUENTRO DE INV EN FONOAUD',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDSM','DIP SOPORTE VITAL MULTI',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDES','DIP PRESC EJER FIS SALUD',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEB','CURSO ESTAD BASC VIRTUAL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCIV','CURSO INVESTIGACION DE MERCADO',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CESC','DIP EDUC SUPERIOR COLOMBIA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDIV','ESP DLLO INT INF ADOLES VIRTUA',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEA','DIP EVAL AFASIA Y TRAS RELAC',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAT','DIPLOMADO EN ACTUAL TRIBUTARIA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGU','DIP GESTION Y DOC UNIVERSITARI',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DGPV','DIPLOMADO EN GESTION PUBL VIRT',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PCP','CONTADURIA PUBLICA','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PMNI','MKT Y NEGOCIOS INTERNACIONALES','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CEOV','CURSO EVAL OBJETIVA DE LA VOZ',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ECID','ESP CONT INTERNO AUD SALUD PRE',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EGSP','ESP GER ORG SALUD PRESENC',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EAF','ESP. EN AUDITORIA FINANCIERA',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEP','PFPD ESTRAT PED PARA LA INCLUS',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CMGI','CURSO MOD GRADO INF Y ADOLES',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDSD','ESP FOR Y EVAL PROY DLLO SOC D',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDMI','DIPL EN ESTRAT Y MK INTERNAL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CMGA','CURSO MODALID GRADO AUDIOLOGIA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCFN','CURSO CORTO ECON Y COMERC INTE',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TLG','TECNICO PROFESIONAL EN LOG','PRESENCIAL','Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDPT','DIPLOM PSI TRAB E INNOVA ORGAN',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PFA','FONOAUDIOLOGIA','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCPS','CUR PRE INGRESO PROG SALUD','PRESENCIAL','Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PAF','ADMINISTRACION Y FINANZAS','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CSTC','SEM TALLER CRECIM DLLO PERSONA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDPD','DIP DIDAC FLEX POB DIVER PRESE',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GTLA','TECNOL EN TERAP LENG AUDICION',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EGSV','ESP GERENCIA  CALIDAD EN SALUD',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CNE','DIPLOM NEUROPSICOLOGIA ESCOLAR',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EUCS','ESP UNIVERSID Y CAMBIO SOCIAL',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDNF','DIPLOM NEUROREHAB ENFO FISIOTE',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CEFA','CURSO EST Y FORMA AUD ISO:9001',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDIF','DIP  EN NIIF',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGL','DIPLOM EN GEST LOG INTEGRAL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEC','DIPLOM EDUCACION POR CICLOS',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDDU','DIPLOM EN DOCENCIA UNIVERSITAR',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCPV','CURSO COMPL PAT LJE, HABLA VOZ',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGP','DIPLOMADO EN GESTION PUBLICA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PAL','ADMINISTRACION LOGISTICA','PRESENCIAL','Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GLG','TECNOLOGIA EN LOGISTICA','PRESENCIAL','Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DINI','DIPLOMADO INTER DE INV E INDIC',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDSP','ESP FOR Y EVAL PROY DLLO SOC P',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EAI','ESP EN AUDITORIA INTEGRAL',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ERCI','ESP EN REHAB DISCAP COMUN INFA',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ECIP','ESP CONT INTERNO AUD SALUD PRE',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('ECIA','ESP GER CONTROL INT AUD MEDICA',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PCTA','CONTADURIA PUBLICA ANTIGUO','PRESENCIAL','N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GGTG','TECN GESTION TURISTICA Y GASTR',null,'Y','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CAIG','CURSO ANALISIS E INTE DE GASES',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DEEI','DIPLOM ESPECIAL EDUCA INFANTIL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEI','LICENCIATURA EN EDUCA INFANTIL',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EFCC','ESP. EN FISIOT EN CUIDADO CRIT',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGD','DIPLOM GESTION DOCUMENTAL',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDFP','DIP ABORDJE FISI PAC PED Y NEO',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGF','DIPLOMADO EN GESTION FINANC',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDNA','DIPL NEUROPS TRAST APR',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CMGC','CURSO MODAL DE GRADO CUD CRITI',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAO','DIPLO EN DISEÑ Y ADAP ORT MANO',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCMS','CURSO CORTO MERCADEO DE SEVICI',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('DCEB','DIP DLLO COMP EDU BASICA Y MED',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDU','ESP EN DOCENCIA UNIVERSITARIA',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EGSD','ESP GER ORG SALUD DISTANCIA',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDUD','PFPD ESTRAT PARA DISEÑO UNI DI',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TLA','TECNICO PROF INTER TERAP LENG',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TEE','TECNI PROF INTER EN EDU ESPEC',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCEC','CURSO CORTO ECON COMERC INTERN',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDPE','DIPLOM PRESCRIPC EJERC FISICO',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDFA','DIPLOM. FUND. DE AUDIOLOGIA',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAR','DIPLOM. EN ADMIN DEL RIESGO',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDRN','DIP ABORDAJE Y MANEJO RN EN CC',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PCPV','CONTADURIA PUBLICA VIRTUAL',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EPAC','ESP EN FORMUL Y GEST PROG ACON',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('EDIA','ESP EN DLLO INTEGRAL DE INFANC',null,'Y','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('PEEA','LIC. EN EDUC ESPECIAL ANTIGUO',null,'N','POSTGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('GEE','TECNOLOG EN EDUCACION ESPECIAL',null,'N','ESPECIALISTA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('TEP','TEC PROF INTER EN EDU PREESCOL',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDTH','DIP EN GESTION Y DLLO TAL HUMA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDCI','DIP EN SEGUR LOG Y CIO INTERNA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDST','DIP SALUD Y SEG TRABAJO',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAB','DIPLOMADO EN AUDIOLOGIA BASICA',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDAF','DIPLOM. EN FUNDA ACOND FISICO',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDEI','DIP ESTRAT PED PARA LA INCLUS',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDGI','DIP GESTION, TRANS INNO EN INV',null,'N','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDRC','DIPL EN REHABILITACION CARDIAC',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CPJ','DIP PSICOLOGIA JURIDICA',null,'Y','PREGRADO');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CCSI','CURSO CORTO SISTEMAS INF GEREN','PRESENCIAL','Y','EDUCACION CONTINUA');
Insert into siup_programas_table (COD_PROGRAMA,DESC_PROGRAMA,MODALIDAD,ACTIVO,TIPO_PROGRAMA) values ('CDNI','DIP.INTNALES DE INF FINAN IFRS',null,null,'PREGRADO');
commit;


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

--2017-11-20 creacion de tabla de convenios
--------------------------------------------------------
--  DDL for Table CONVENIOS_BANNER
--------------------------------------------------------

  CREATE TABLE "SIUP"."CONVENIOS_BANNER" 
   ("CODIGO" VARCHAR2(2 CHAR), 
	"NOMBRE" VARCHAR2(30 CHAR), 
	"FECHA" DATE, 
	"ESTADO" CHAR(1 BYTE)
   );
--------------------------------------------------------
--  Constraints for Table CONVENIOS_BANNER
--------------------------------------------------------

  ALTER TABLE "SIUP"."CONVENIOS_BANNER" MODIFY ("CODIGO" NOT NULL ENABLE);
  ALTER TABLE "SIUP"."CONVENIOS_BANNER" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "SIUP"."CONVENIOS_BANNER" MODIFY ("FECHA" NOT NULL ENABLE);

  REM INSERTING into SIUP.CONVENIOS_BANNER
SET DEFINE OFF;
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IS','INSTITUTO SANTAFE',to_date('26-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BQ','ICBF_CUNDINAMARCA',to_date('11-MAY-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FA','FABA',to_date('10-JUN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IU','INESUP',to_date('12-JUL-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IR','INTRO',to_date('15-NOV-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CN','CONEHIDU',to_date('08-FEB-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('AF','OTOÑO DE LA VIDA',to_date('11-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('JB','JORGE ORTIZ',to_date('23-SEP-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('RN','RAFAEL CECILIO NAVARRO',to_date('08-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('PD','CT_PERD1',to_date('25-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FO','FUNDACION CONSTRUIMOS',to_date('16-JAN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FC','FUNDECRED',to_date('27-JAN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FD','FOREDAM',to_date('08-MAR-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CD','CIADET',to_date('27-JAN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('EP','EKOS DE PAZ',to_date('08-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('ES','ESESCO',to_date('27-JAN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('PF','PROFUTURO',to_date('27-JAN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('TA','TIBERIO AREVALO',to_date('27-JAN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('EI','EICT',to_date('27-JAN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FM','FABIAN MONA',to_date('08-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FS','FUNDACION SOCIAL ASIST Y DLLO',to_date('17-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IC','INSTIT TECNICO DE CUNDINAMARCA',to_date('12-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CP','CORPOCEDEC',to_date('08-MAR-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BM','ICBF_META',to_date('07-APR-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BS','ICBF_SAN ANDRES',to_date('07-APR-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BC','ICBF_CAUCA',to_date('07-APR-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FE','FESNA',to_date('03-JUN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IH','INPAHU',to_date('03-JUN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CI','CIES_BOGOTA',to_date('16-JUN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('TM','TOMAS MORO',to_date('10-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('PR','OPERACION PROFIN',to_date('16-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IM','INSTITUTO MAYOR DEL META',to_date('17-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('DB','DIDIMO BENAVIDEZ BURBANO',to_date('18-NOV-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('II','ITEC',to_date('24-JAN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CM','CORIBEROAMERICA',to_date('08-FEB-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('PC','CORPORACION PAZ COLOMBIA',to_date('06-FEB-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('TC','CIBERTEC',to_date('26-APR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('C1','CENCONTEC',to_date('16-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('C2','CORPAFE',to_date('16-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('C3','CETAMA',to_date('17-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FL','AURA MARIA FONSECA LOPEZ',to_date('31-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BB','ICBF_BOGOTA',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BN','ICBF_NEIVA',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BO','DISTANCIA_BOGOTA',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('NE','IBERO_NEIVA',to_date('18-NOV-15','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CO','IBERO_COTA',to_date('18-NOV-15','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CF','CORFEDES',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IN','INCAD',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CE','CEP',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('MA','INSTITUCION MATAMOROS',to_date('17-DEC-14','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CG','COLOMBO GERMANA',to_date('21-JUL-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CB','FDLCB-FONDO DLLO CIU BOLIVAR',to_date('12-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CT','CODETEC',to_date('15-JUN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CR','CORSOVIN',to_date('28-JUL-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IO','INTESCO',to_date('16-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CU','CORPOUNE',to_date('12-JAN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('EC','EINCOL',to_date('12-JAN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('TI','TIMDO',to_date('20-JAN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('ER','EDGAR RENGIFO',to_date('30-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('AS','ASOCIACION ESPERANZA Y PROGRES',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('EG','EDGAR RENGIFO VARGAS',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('EQ','FUNTEQ',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('OL','IGLESIA CRIST INT MIS BUEN OLI',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('UR','INESUR',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('NL','NELSON GERMAN ZARATE CARVAJAL',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('NF','NESTOR FIDEL RODRIGUEZ RODRIGU',to_date('21-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('PI','POLITEC INT COLOMBIANO',to_date('19-JUL-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IT','INFOTEC',to_date('02-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('ET','EDUTEC DE LOS ANDES',to_date('02-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IE','INTECC',to_date('25-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('AC','ACEM',to_date('25-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CA','CENTRO DE ESTUDIOS ANDINO',to_date('13-FEB-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CC','COOPERACION CANDELARIA',to_date('25-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('FT','FUNTECALDAS',to_date('25-FEB-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('CH','CORTBOL',to_date('13-JUN-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('MV','MIRYAM VIVAS',to_date('07-JUL-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('SE','SENA CONVENIO NACIONAL',to_date('07-JUL-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('SM','SAN MATEO',to_date('25-NOV-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('IP','INSTIPETROL',to_date('31-JAN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('P1','CT_PERD2',to_date('25-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('P2','SM_PERD2',to_date('25-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('BG','BOG_VIRT',to_date('24-AUG-16','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('I1','INCULBI',to_date('24-MAR-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('GE','CORPCIGEC',to_date('22-JUN-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('JH','JHON EDWARD TENORIO GARCIA',to_date('02-AUG-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('EN','ESCUELA NACIONAL E INFORMATICA',to_date('02-AUG-17','DD-MON-RR'),'N');
Insert into SIUP.CONVENIOS_BANNER (CODIGO,NOMBRE,FECHA,ESTADO) values ('XX','PRUEBA CLAUDIA',to_date('26-OCT-17','DD-MON-RR'),'S');
commit;

update inscripciones set id_convenio = null;
commit;

ALTER TABLE INSCRIPCIONES 
DROP CONSTRAINT INSCRIPCIONES_ID_CONVENIO_FK;

drop table convenios;

ALTER TABLE INSCRIPCIONES  
MODIFY (ID_CONVENIO VARCHAR(10) );

--Actualizaciones por validacion de codigo icfes
ALTER TABLE EDUCACIONES  
MODIFY (COD_ICFES_INST VARCHAR2(14 BYTE) );