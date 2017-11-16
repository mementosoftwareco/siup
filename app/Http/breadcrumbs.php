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








// Home > Blog
//Breadcrumbs::register('blog', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Blog', route('blog'));
//});
