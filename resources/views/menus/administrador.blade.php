@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Menú
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                   

                        <!-- Task Name -->
						<li><a href="{{ url('/nuevoPerfil') }}">Crear Nuevo Perfil</a></li>
                       <li><a href="{{ url('/nuevoRegistro') }}">Registrar Nuevo Usuario</a></li>						
					   

                      
                   
                </div>
            </div>

           
        </div>
    </div>
@endsection
