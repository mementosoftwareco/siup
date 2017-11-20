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
    $breadcrumbs->push('Inscripciones Pendientes', route('inscripcion.list'));
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

Breadcrumbs::register('validacionComercial', function($breadcrumbs)
{
    $breadcrumbs->push('Validaci&oacute;n Gesti&oacute;n Comercial', route('lc.inscripcion.list'));
});





Breadcrumbs::register('validacionFormularioInscripcion', function($breadcrumbs,  $inscripcionPregrado)
{
    $breadcrumbs->parent('validacionComercial');
    $breadcrumbs->push('Validaci&oacute;n Formulario de Inscripci&oacute;n', route('lc.inscripcion', $inscripcionPregrado->idProcesoAdmision));
});

Breadcrumbs::register('validacionCargaDocumentos', function($breadcrumbs,  $idProceso)
{
    $breadcrumbs->parent('validacionComercial');
    $breadcrumbs->push('Validaci&oacute;n Carga de Documentos', route('prepararCargaDocumentos', $idProceso));
});





// Home > Blog
//Breadcrumbs::register('blog', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Blog', route('blog'));
//});
