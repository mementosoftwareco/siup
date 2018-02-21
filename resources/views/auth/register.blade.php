@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		{!! Breadcrumbs::render('usuario') !!}
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Nuevo Usuario</div>
                <div class="panel-body">
				<!-- Display Validation Errors -->
                    @include('common.errors')
				
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
							
							{{  Form::select('perfil', $perfiles, old('perfil'), ['class' => 'form-control', 'placeholder' => 'Seleccione...']) }}
							 
                                @if ($errors->has('perfil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perfil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<!-- Nodo -->
                        <div class="form-group" id="divNodo" name="divNodo">
                            <label for="task-name" class="col-md-4  control-label">Nodo</label>

                            <div class="col-md-6">
							{{Form::select('nodo', $listadoNodos, null, ['class'=>'form-control','placeholder' => 'Seleccione...'])}}
							</div>
                        </div>
						
						<!-- Convenio -->
                        <div class="form-group" id="divConvenio" name="divConvenio">
                            <label for="task-name" class="col-md-4 control-label">Convenio</label>

                            <div class="col-md-6">
							{{Form::select('convenio', $listadoConvenios, null, ['class'=>'form-control','placeholder' => 'Seleccione...'])}}
							</div>
                        </div>
						
						<!-- facultad -->
                        <div class="form-group" id="divFacultad" name="divFacultad">
                            <label for="task-name" class="col-md-4 control-label">Facultad</label>

                            <div class="col-md-6">
							{{Form::select('facultad', $listadoFacultades, null, ['class'=>'form-control','placeholder' => 'Seleccione...'])}}
							</div>
                        </div>
						
						<script>
						$(document).ready(function() {
							
							var idPerfilG = $('select[name="perfil"]').val();
							if(idPerfilG && (idPerfilG == 2 || idPerfilG == 3 || idPerfilG == 4 ) ) {
								$('div[name="divNodo"]').show();
								$('div[name="divConvenio"]').show();
							} else {
								$('div[name="divNodo"]').hide();
								$('div[name="divConvenio"]').hide();
							}
							
							if(idPerfilG && idPerfilG == 42 ) {
								$('div[name="divFacultad"]').show();
							} else {
								$('div[name="divFacultad"]').hide();
							}
							
							$('select[name="perfil"]').on('change', function(){
								var idPerfil = $(this).val();
								if(idPerfil && (idPerfil == 2 || idPerfil == 3 || idPerfil == 4 ) ) {
									$('div[name="divNodo"]').show();
									$('div[name="divConvenio"]').show();
								} else {
									$('div[name="divNodo"]').hide();
									$('div[name="divConvenio"]').hide();
								}
								
								if(idPerfil && idPerfil == 42 ) {
									$('div[name="divFacultad"]').show();
								} else {
									$('div[name="divFacultad"]').hide();
								}

							});
							
							$('select[name="nodo"]').on('change', function(){
								var idNodo = $(this).val();
								if(idNodo) {
									filtrarConvenioPorNodo(idNodo);
								} else {
									$('select[name="convenio"]').empty();
								}

							});
							
							function filtrarConvenioPorNodo(idNodo) {
								$.ajax({
										url: "{{ URL::to('ajax-convenio') }}" + '/' +idNodo,
										type:"GET",
										dataType:"json",
										beforeSend: function(){
											$('#loader').css("visibility", "visible");
										},

										success:function(data) {

											$('select[name="convenio"]').empty();
											$.each(data, function(key, value){

												$('select[name="convenio"]').append('<option value="'+ key +'">' + value + '</option>');

											});
										},
										complete: function(){
											$('#loader').css("visibility", "hidden");
										}
									});
							}

						});
						
						</script>

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
								<th>Estado</th>									
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="table-text"><div>{{ $user->name }}</div></td>
										
										<td class="table-text"><div>{{ $user->email }}</div></td>
										<td class="table-text"><div>{{ $user->perfil->nombre }}</div></td>
										<td class="table-text"><div>{{ $user->state }}</div></td>
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
