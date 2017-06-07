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

--Borrado de tablas

drop table procesos_admision cascade constraints;
drop table personas cascade constraints;
drop table tipos_documento cascade constraints;
drop table tipos_identificacion cascade constraints;
drop table tipos_proceso cascade constraints;
drop table estados_civil cascade constraints;
drop table entrevistas cascade constraints;
drop table convenios cascade constraints;
drop table estados_validacion cascade constraints;
drop table grupos_etnicos cascade constraints;
drop table inscripciones cascade constraints;
drop table migrations cascade constraints;
drop table modalidades cascade constraints;
drop table password_resets cascade constraints;
drop table detalle_entrevistas cascade constraints;
drop table documentos cascade constraints;
drop table preguntas cascade constraints;
drop table respuestas cascade constraints;
drop table validaciones cascade constraints;

drop table tasks;
drop table users;

drop sequence "SIUP"."CONVENIOS_ID_CONVENIO_SEQ";
drop sequence "SIUP"."ENTREVISTAS_ID_ENTREVISTA_SEQ";
drop sequence "SIUP"."ESTADOS_CIVIL_ID_ESTADO_CIVIL_";
drop sequence "SIUP"."ESTADOS_VALIDACION_ID_ESTADO_S";
drop sequence "SIUP"."GRUPOS_ETNICOS_ID_GRUPO_ETNICO";
drop sequence "SIUP"."INSCRIPCIONES_ID_INSCRIPCION_S";
drop sequence "SIUP"."MODALIDADES_ID_MODALIDAD_SEQ";
drop sequence "SIUP"."TASKS_ID_SEQ";
drop sequence "SIUP"."TIPOS_DOCUMENTO_ID_TIPO_DOCUME";
drop sequence "SIUP"."TIPOS_IDENTIFICACION_ID_TIPO_I";
drop sequence "SIUP"."TIPOS_PROCESO_ID_TIPO_PROCESO_";
drop sequence "SIUP"."USERS_ID_SEQ";
drop sequence "SIUP"."DETALLE_ENTREVISTAS_ID_DETALLE";
drop sequence "SIUP"."DOCUMENTOS_ID_DOCUMENTO_SEQ";
drop sequence "SIUP"."PREGUNTAS_ID_PREGUNTA_SEQ";
drop sequence "SIUP"."PROCESOS_ADMISION_ID_PROCESO_A";
drop sequence "SIUP"."RESPUESTAS_ID_RESPUESTA_SEQ";
drop sequence "SIUP"."VALIDACIONES_ID_VALIDACION_SEQ";

--Agregando los datos a las tablas de referencia

insert into modalidades (nombre, descripcion) values ('Presencial','Presencial');
insert into modalidades (nombre, descripcion) values ('Virtual','Virtual');

insert into tipos_proceso (nombre, descripcion) values ('Pregrado','Pregrado');
insert into tipos_proceso (nombre, descripcion) values ('Postgrado','Postgrado');
insert into tipos_proceso (nombre, descripcion) values ('Educación continuada','Educación continuada');

insert into TIPOS_identificacion (nombre, descripcion) values ('Cédula de ciudadnía','Cédula de ciudadnía');
insert into TIPOS_identificacion (nombre, descripcion) values ('Cédula de extranjería','Cédula de extranjería');
insert into TIPOS_identificacion (nombre, descripcion) values ('Pasaporte','Pasaporte');
insert into TIPOS_identificacion (nombre, descripcion) values ('Tarjeta de identidad','Tarjeta de identidad');