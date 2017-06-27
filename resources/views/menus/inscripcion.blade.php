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

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                             <a href="{{ url('/preinscripcion') }}">Preinscribir Estudiante</a>							
                        </div>
						
						<div class="form-group">                             
							 <a href="{{ url('/preinscripcion') }}">Inscribir Estudiante</a>
                        </div>
						
						
						<div class="form-group">                             
							 <a href="{{ url('/preinscripcion') }}">Asociar Perfil a Usuario</a>
                        </div>

                      
                    </form>
                </div>
            </div>

           
        </div>
    </div>
@endsection
