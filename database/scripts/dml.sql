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

--Grupo Etnico
insert into grupos_etnicos(nombre, descripcion) values ('Afrocolombiano o Afrodescendiente','Afrocolombiano o Afrodescendiente');
insert into grupos_etnicos(nombre, descripcion) values ('Pueblos indígenas','Pueblos indígenas');
insert into grupos_etnicos(nombre, descripcion) values ('Raizales','Raizales');
insert into grupos_etnicos(nombre, descripcion) values ('Rom','Rom');
insert into grupos_etnicos(nombre, descripcion) values ('No aplica','No Aplica');

--Estado civil
insert into estados_civil (nombre, descripcion) values ('Soltero/a','Soltero/a');
insert into estados_civil (nombre, descripcion) values ('Casado/a','Casado/a');

--Convenio
insert into convenios (nombre, descripcion) values ('No Aplica','No Aplica');
insert into convenios (nombre, descripcion) values ('Ser pilo paga','Ser pilo paga');
insert into convenios (nombre, descripcion) values ('icetex..otro','icetex..otro');

--estados proceso de admision
insert into estados_proceso_admision (nombre, descripcion) values ('Pre inscrito','Pre inscripción');
insert into estados_proceso_admision (nombre, descripcion) values ('Pre inscrito - formulario inscripción','Pre inscripción con formulario inscripción');
insert into estados_proceso_admision (nombre, descripcion) values ('Pre inscrito - documentos','Pre inscripción con documentos');
insert into estados_proceso_admision (nombre, descripcion) values ('Pendiente validación inscripción','Pendiente validación inscripción');
insert into estados_proceso_admision (nombre, descripcion) values ('Inscrito pendiente validación comercial','Inscrito pendiente validación comercial');
insert into estados_proceso_admision (nombre, descripcion) values ('Inscrito pendiente entrevista','Inscrito pendiente entrevista');
insert into estados_proceso_admision (nombre, descripcion) values ('Pendiente validación entrevista','Pendiente validación entrevista');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por inscripción','Rechazado por inscripción');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por documentos','Rechazado por documentos');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por entrevista','Rechazado por entrevista');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por admisión','Rechazado por admisión');
insert into estados_proceso_admision (nombre, descripcion) values ('Validado lider comercial','Validado lider comercial');
insert into estados_proceso_admision (nombre, descripcion) values ('Validado facultad','Validado facultad');
insert into estados_proceso_admision (nombre, descripcion) values ('Admitido','Admitido');