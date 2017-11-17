@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		{!! Breadcrumbs::render('usuario') !!}
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Nuevo Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/guardarRegistro') }}">
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

                        
						
						
						
						<div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Perfil</label>

                            <div class="col-md-6">
							
							{{  Form::select('perfil', $perfiles, old('perfil'), ['class' => 'form-control']) }}
							 
					
							
				
							
						

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
                                    <i class="fa fa-btn fa-user"></i>Registrar
                                </button>
								
								 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			
			
			  <!-- Current Tasks -->
            @if (count($users) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Usuarios Disponibles
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                           		<th>Nombre</th>
								<th>Email</th>		
								<th>Perfil</th>									
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="table-text"><div>{{ $user->name }}</div></td>
										
										<td class="table-text"><div>{{ $user->email }}</div></td>
										<td class="table-text"><div>{{ $user->perfil->nombre }}</div></td>
										
										<td class="table-text"><div><a href="{{route('editarRegistro' , ['id' =>$user->id ]) }}">Editar</a></div></td>
										
										<!--<td class="table-text"><div><a href="{{route('prepararEliminarRegistro' , ['id' =>$user->id ]) }}">Eliminar</a></div></td>-->
										
										
                                
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
			
			
			
			
        </div>
    </div>
</div>
@endsection
