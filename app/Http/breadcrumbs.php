<?php


// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('/'));
});

// Preinscripción
Breadcrumbs::register('preinscripcion', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Preinscripcion', route('preinscripcion'));
});

Breadcrumbs::register('administrador', function($breadcrumbs)
{
    $breadcrumbs->push('Administrador', route('menu'));
});


////////////////////Administración de Perfiles////////////////////////////

Breadcrumbs::register('perfil', function($breadcrumbs)
{
    $breadcrumbs->parent('administrador');
    $breadcrumbs->push('Perfil', route('nuevoPerfil'));
});

Breadcrumbs::register('editarPerfil', function($breadcrumbs, $perfil)
{
    $breadcrumbs->parent('perfil');
    $breadcrumbs->push('Editar Perfil', route('editarPerfil', $perfil->id));
});

Breadcrumbs::register('eliminarPerfil', function($breadcrumbs, $perfil)
{
    $breadcrumbs->parent('perfil');
    $breadcrumbs->push('Eliminar Perfil', route('eliminarPerfil', $perfil->id));
});


////////////////////Administración de Usuarios////////////////////////////

Breadcrumbs::register('usuario', function($breadcrumbs)
{
    $breadcrumbs->parent('administrador');
    $breadcrumbs->push('Usuario', route('nuevoRegistro'));
});

Breadcrumbs::register('editarUsuario', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('usuario');
    $breadcrumbs->push('Editar Usuario', route('editarRegistro', $user->id));
});


////////////////////Inscripción////////////////////////////

Breadcrumbs::register('comercial', function($breadcrumbs)
{
    $breadcrumbs->push('Gesti&oacute;n Comercial', route('menu'));
});



Breadcrumbs::register('inscripcionesPendientes', function($breadcrumbs)
{
    $breadcrumbs->parent('comercial');
    $breadcrumbs->push('Completar Inscripciones de Aspirantes', route('inscripcion.list'));
});

Breadcrumbs::register('formularioInscripcion', function($breadcrumbs,  $inscripcionPregrado)
{
    $breadcrumbs->parent('inscripcionesPendientes');
    $breadcrumbs->push('Formulario de Inscripci&oacute;n', route('inscripcion', $inscripcionPregrado->idProcesoAdmision));
});

Breadcrumbs::register('cargaDocumentos', function($breadcrumbs,  $idProceso)
{
    $breadcrumbs->parent('inscripcionesPendientes');
    $breadcrumbs->push('Carga de Documentos', route('prepararCargaDocumentos', $idProceso));
});


////////////////////Validación Líder Comercial////////////////////////////

Breadcrumbs::register('validacionGestionComercial', function($breadcrumbs)
{
    $breadcrumbs->push('Validaci&oacute;n Gesti&oacute;n Comercial', route('menu'));
});



Breadcrumbs::register('validacionInscripcionesAspirantes', function($breadcrumbs)
{
	$breadcrumbs->parent('validacionGestionComercial');
    $breadcrumbs->push('Validar Inscripciones de Aspirantes', route('lc.inscripcion.list'));
});


Breadcrumbs::register('validacionFormularioInscripcion', function($breadcrumbs,  $inscripcionPregrado)
{
    $breadcrumbs->parent('validacionInscripcionesAspirantes');
    $breadcrumbs->push('Validaci&oacute;n Formulario de Inscripci&oacute;n', route('lc.inscripcion', $inscripcionPregrado->idProcesoAdmision));
});

Breadcrumbs::register('validacionCargaDocumentos', function($breadcrumbs,  $idProceso)
{
    $breadcrumbs->parent('validacionComercial');
    $breadcrumbs->push('Validaci&oacute;n de Documentos', route('prepararCargaDocumentos', $idProceso));
});


////////////////////Histórico////////////////////////////

Breadcrumbs::register('historicoComercial', function($breadcrumbs)
{
	$breadcrumbs->parent('comercial');
    $breadcrumbs->push('Hist&oacute;rico de Procesos', route('cargarMisProcesosAdmision'));
});


Breadcrumbs::register('historicoValidacionComercial', function($breadcrumbs)
{
	$breadcrumbs->parent('validacionGestionComercial');
    $breadcrumbs->push('Hist&oacute;rico de Procesos', route('cargarMisProcesosAdmision'));
});



////////////////////Gestión Facultad////////////////////////////

Breadcrumbs::register('facultad', function($breadcrumbs)
{
    $breadcrumbs->push('Gesti&oacute;n Facultad', route('menu'));
});



Breadcrumbs::register('entrevistasPendientes', function($breadcrumbs)
{
    $breadcrumbs->parent('facultad');
    $breadcrumbs->push('Evaluar Entrevistas de Aspirantes', route('listarEntrevistas'));
});


















// Home > Blog
//Breadcrumbs::register('blog', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Blog', route('blog'));
//});
