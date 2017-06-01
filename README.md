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

drop table tipos_documento;
drop table tipos_identificacion;
drop table tipos_proceso;
drop table estados_civil;
drop table entrevistas;
drop table convenios;
drop table estados_validacion;
drop table grupos_etnicos;
drop table inscripciones;
drop table migrations;
drop table modalidades;
drop table password_resets;
drop table personas;
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