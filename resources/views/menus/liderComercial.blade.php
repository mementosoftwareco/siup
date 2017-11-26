@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Validación Gestión Comercial
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                        
					<br><a href="{{ url('/lc.inscripcion.list') }}">Validar Inscripciones de Aspirantes</a>
					<br><a href="{{ url('/cargarMisProcesosAdmision') }}">Ver Histórico de Procesos</a>
						
                </div>
            </div>

           
        </div>
    </div>
@endsection
