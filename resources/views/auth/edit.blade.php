@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>
                <div class="panel-body">
                    <!--<form class="form-horizontal" role="form" method="POST" action="{{ url('/guardarRegistro') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="contrasenia">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Perfil</label>

                            <div class="col-md-6">
							
							{{  Form::select('nombre', $perfiles, old('perfil'), ['class' => 'form-control']) }}
							 
					
							
				
							
						

                                @if ($errors->has('perfil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perfil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Actualizar
                                </button>
								<button type="submit" class="btn btn-default" onClick="javascript:window.history.back();">
                                    <i></i>Cancelar
                                </button>
                            </div>
                        </div>
                    </form>-->
					
						{!! Form::model($user, ['route' => ['actualizarRegistro', $user->id], 'class' => 'form-horizontal'])	!!}	
						
						
						
						 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            
							{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-md-6">
                                {!!  Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">						
								{!! Form::submit('Actualizar', ['class' => 'btn btn-default']) !!}
								<button type="submit" class="btn btn-default" onClick="javascript:window.history.back();">
                                    <i></i>Cancelar
                                </button>
							</div>	
						</div>

					
					
                </div>
            </div>
			
			
			
			
        </div>
    </div>
</div>
@endsection
