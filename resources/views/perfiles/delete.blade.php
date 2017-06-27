@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Eliminar Perfil
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                   
					
					
					{!! Form::model($perfil, ['route' => ['eliminarPerfil', $perfil->id], 'class' => 'form-horizontal'])	!!}	
					
	
						<!-- name -->
						<div class="form-group">
							
								{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
							
							<div class="col-sm-6">
								{!!  Form::text('nombre', null, ['readonly', 'class' => 'form-control']) !!}
							</div>	
						</div>

						
						<div class="form-group">
							
								{!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-3 control-label']) !!}
						
							<div class="col-sm-6">
							{!! Form::text('descripcion', null, ['readonly', 'class' => 'form-control']) !!}
							</div>	
						</div>				

						<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">						
								{!! Form::submit('Eliminar', ['class' => 'btn btn-default']) !!}
								<button type="submit" class="btn btn-default" onClick="javascript:window.history.back();">
                                    <i></i>Cancelar
                                </button>
							</div>	
						</div>

					
					
					
					
					
					
					
                </div>
            </div>

          
        </div>
    </div>
@endsection
