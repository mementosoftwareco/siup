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
                        
					<br><a href="{{ url('/lc.inscripcion.list') }}">Aprobar o Rechazar Inscripciones</a>
					<br><a href="{{ url('/cargarMisProcesosAdmision') }}">Ver Histórico de Inscripciones</a>
						
                </div>
            </div>

           
        </div>
    </div>
@endsection
