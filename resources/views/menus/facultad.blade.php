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
                
                        <!-- Task Name -->
                        
                             <!--<a href="{{ url('/preinscripcion') }}">Preinscribir Estudiante</a>	-->						
                        
						
						                           
							 <br><a href="{{ url('/listarEntrevistas') }}">Evaluar Entrevistas de Aspirantes</a>
                      
						
					

                 
                </div>
            </div>

           
        </div>
    </div>
@endsection
