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