@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gestión Comercial
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                
                        <!-- Task Name -->
                        
                             <!--<a href="{{ url('/preinscripcion') }}">Preinscribir Estudiante</a>	-->						
                        
							<br><a href="{{ url('/inscripcion.list') }}">Completar Inscripciones de Aspirantes</a>
							<br><a href="{{ url('/cargarMisProcesosAdmision') }}">Ver Histórico de Procesos</a>
						
					

                 
                </div>
            </div>

           
        </div>
    </div>
@endsection
