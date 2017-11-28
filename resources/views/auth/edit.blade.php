@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		{!! Breadcrumbs::render('editarUsuario', $user) !!}
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>
                <div class="panel-body">
                   
					
						{!! Form::model($user, ['route' => ['actualizarRegistro', $user->id], 'class' => 'form-horizontal'])	!!}	
						
						
						
						 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            
							{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-md-6">
                                {!!  Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Estado</label>

                            <div class="col-sm-6">
							{{Form::select('state', ['ACT' => 'Activo',
														  'INA' => 'Inactivo'
														  ], null, ['class'=>'form-control'])}}
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">						
								{!! Form::submit('Actualizar', ['class' => 'btn btn-default']) !!}
								<!--<button type="submit" class="btn btn-default" onClick="javascript:window.history.back();">
                                    <i></i>Cancelar
                                </button>-->
							</div>	
						</div>

					
					
                </div>
            </div>
			
			
			
			
        </div>
    </div>
</div>
@endsection
