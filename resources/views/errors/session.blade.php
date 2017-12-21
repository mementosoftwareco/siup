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
                    Mensaje de Error
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Preinscripcion Form -->
					@if (Auth::guest() )
						<form action="{{ url('/login') }}" method="GET" class="form-horizontal">
						 
							
							
							

							<!-- Tipo de identificacion -->
							<div class="form-group">
								

								<div class="col-sm-6">
									Su sesión ha expirado. Por favor autentíquese nuevamente.
								</div>
								
								 <!-- Preinscripcion Button -->
						   
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-btn fa-check"></i>Continuar
									</button>
									<!-- <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
								</div>
							</div>
							
							
						</form>				
					@else
						<form action="{{ url('/home') }}" method="GET" class="form-horizontal">
						 
							
							
							

							<!-- Tipo de identificacion -->
							<div class="form-group">
								

								<div class="col-sm-6">
									Se ha excedido el tiempo límite de espera, por favor vuelva a ingresar
								</div>
								
								 <!-- Preinscripcion Button -->
						   
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-btn fa-check"></i>Continuar
									</button>
									<!-- <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
								</div>
							</div>
							
							
						</form>
					@endif
                </div>
            </div>
            
        </div>
    </div>
@endsection
