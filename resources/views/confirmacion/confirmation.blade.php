@extends('layouts.app')

<script> 
function abrir(url) { 
open(url,'','top=300,left=300,width=500,height=200, resizable=0') ; 
} 
</script> 

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
		<!--{!! Breadcrumbs::render('preinscripcion') !!}-->
            
			
			<div class="panel panel-default">
			
               <div class="panel-heading">
                    Mensaje de Confirmación
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Preinscripcion Form -->
                    <form action="{{ url('/') }}" method="GET" class="form-horizontal">
                     
						
						
						

                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                            

                            <div class="col-sm-6">
								El proceso se ha realizado correctamente!
                            </div>
							
							 <!-- Preinscripcion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-check"></i>Continuar
                                </button>
								<!-- <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
                            </div>
                        </div>
                        </div>
						
						
						
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection
