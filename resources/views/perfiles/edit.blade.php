@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
		{!! Breadcrumbs::render('editarPerfil', $perfil) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Perfil
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                   
					
					
					{!! Form::model($perfil, ['route' => ['actualizarPerfil', $perfil->id], 'class' => 'form-horizontal'])	!!}	
					
	
						<!-- name -->
						<div class="form-group">
							
								{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
							
							<div class="col-sm-6">
								{!!  Form::text('nombre', null, ['class' => 'form-control']) !!}
							</div>	
						</div>

						
						<div class="form-group">
							
								{!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-3 control-label']) !!}
						
							<div class="col-sm-6">
							{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
							</div>	
						</div>				

						<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">						
								{!! Form::submit('Actualizar', ['class' => 'btn btn-default']) !!}
								 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
							</div>	
						</div>

					
					
					
					
					
					
					
                </div>
            </div>

          
        </div>
    </div>
@endsection
