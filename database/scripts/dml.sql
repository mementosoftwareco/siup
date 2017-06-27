--Agregando los datos a las tablas de referencia

insert into modalidades (nombre, descripcion) values ('Presencial','Presencial');
insert into modalidades (nombre, descripcion) values ('Virtual','Virtual');

insert into tipos_proceso (nombre, descripcion) values ('Pregrado','Pregrado');
insert into tipos_proceso (nombre, descripcion) values ('Postgrado','Postgrado');
insert into tipos_proceso (nombre, descripcion) values ('Educaci�n continuada','Educaci�n continuada');

insert into TIPOS_identificacion (nombre, descripcion) values ('C�dula de ciudadn�a','C�dula de ciudadn�a');
insert into TIPOS_identificacion (nombre, descripcion) values ('C�dula de extranjer�a','C�dula de extranjer�a');
insert into TIPOS_identificacion (nombre, descripcion) values ('Pasaporte','Pasaporte');
insert into TIPOS_identificacion (nombre, descripcion) values ('Tarjeta de identidad','Tarjeta de identidad');

--Grupo Etnico
insert into grupos_etnicos(nombre, descripcion) values ('Afrocolombiano o Afrodescendiente','Afrocolombiano o Afrodescendiente');
insert into grupos_etnicos(nombre, descripcion) values ('Pueblos ind�genas','Pueblos ind�genas');
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
insert into estados_proceso_admision (nombre, descripcion) values ('Pre inscrito','Pre inscripci�n');
insert into estados_proceso_admision (nombre, descripcion) values ('Pre inscrito - formulario inscripci�n','Pre inscripci�n con formulario inscripci�n');
insert into estados_proceso_admision (nombre, descripcion) values ('Pre inscrito - documentos','Pre inscripci�n con documentos');
insert into estados_proceso_admision (nombre, descripcion) values ('Pendiente validaci�n inscripci�n','Pendiente validaci�n inscripci�n');
insert into estados_proceso_admision (nombre, descripcion) values ('Inscrito pendiente validaci�n comercial','Inscrito pendiente validaci�n comercial');
insert into estados_proceso_admision (nombre, descripcion) values ('Inscrito pendiente entrevista','Inscrito pendiente entrevista');
insert into estados_proceso_admision (nombre, descripcion) values ('Pendiente validaci�n entrevista','Pendiente validaci�n entrevista');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por inscripci�n','Rechazado por inscripci�n');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por documentos','Rechazado por documentos');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por entrevista','Rechazado por entrevista');
insert into estados_proceso_admision (nombre, descripcion) values ('Rechazado por admisi�n','Rechazado por admisi�n');
insert into estados_proceso_admision (nombre, descripcion) values ('Validado lider comercial','Validado lider comercial');
insert into estados_proceso_admision (nombre, descripcion) values ('Validado facultad','Validado facultad');
insert into estados_proceso_admision (nombre, descripcion) values ('Admitido','Admitido');