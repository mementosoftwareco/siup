@extends('layouts.app')

<?php use App\EstadosProcesoAdmisionEnum;?>

@section('content')
    <div class="container">
        
		<div class="col-sm-offset-0 col-sm-22">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Buscar Aspirante
                </div>
				<div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
				
				<form action="{{ url('/buscarAspirante') }}" method="GET" class="form-horizontal">					
					{{ csrf_field() }}

					<div class="form-group">
						<label for="identificacion" class="col-sm-3 control-label">Identificación</label>

						<div class="col-sm-6">
							<input type="text" name="identificacion" id="id" class="form-control" value="{{ old('identificacion') }}">
						</div>						
					</div>					
					<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-btn fa-search"></i>Buscar
							</button>
							
							 <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>
							 
					 </div>					
				</form>
			</div>
        </div>

				
				
				
				
				
				
				

            <!-- Current Procesos admision -->
            @if (count($procesosAdmon) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Inscripciones Validadas
                    </div>
					
					
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <!--<th>Proceso</th>-->
								<th>Identificación</th>
								<th>Nombre</th>
								<th>Estado del Proceso</th>	
																
								<th>Fecha inscripción</th>
								<th>Educación</th>
								<th>Programa</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($procesosAdmon as $procesoAdmon)
                                    <tr>
                                       <!-- <td class="table-text"><div>{{ $procesoAdmon->id_proceso_admon }}</div></td>-->
										
										<td class="table-text"><div>{{ $procesoAdmon->persona == null ? 'viene nulo' : $procesoAdmon->persona->id_persona }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->persona == null ? 'viene nulo' : $procesoAdmon->persona->nombres . ' ' . $procesoAdmon->persona->apellidos }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->estadoProceso == null ? 'viene nulo' : $procesoAdmon->estadoProceso->nombre }}</div></td>
																				
										<td class="table-text"><div>{{ $procesoAdmon->created_at }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->tipoProcesoAdmision == null ? 'viene nulo' : $procesoAdmon->tipoProcesoAdmision->nombre }}</div></td>

										<td class="table-text"><div>{{ $procesoAdmon->inscripcion == null ? 'viene nulo' : $procesoAdmon->inscripcion->nombre_programa }}</div></td>
											
									   <!-- Continuar inscripción Button -->
									   
									   <td>
											<form action="{{url('mostrarHistorico/' . $procesoAdmon->id_proceso_admon)}}" method="POST">
												{{ csrf_field() }}

												<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
													<i class="fa fa-btn fa-edit"></i>Histórico
												</button>
											</form>
										</td>
										
                                        
										
									
											
											<td>
												<form action="{{url('admitirAspirante/' . $procesoAdmon->id_proceso_admon)}}" method="POST">
													{{ csrf_field() }}

													<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
														<i class="fa fa-btn fa-edit"></i>Admitir
													</button>
												</form>
											</td>
									
										
										
										
										
										
										<?php if($procesoAdmon->id_usuario != null && $procesoAdmon->id_usuario == Auth::user()->id && $procesoAdmon->estadoProceso->id_estado==EstadosProcesoAdmisionEnum::PreInscrito) {?>
											
										
											<td>
												<form action="{{url('inscripcion/' . $procesoAdmon->id_proceso_admon)}}" method="GET">
													{{ csrf_field() }}

													<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
														<i class="fa fa-btn fa-edit"></i>Inscripción
													</button>
												</form>
											</td>
											<!-- Cargar documentos Button -->
											<td>
												<form action="{{url('prepararCargaDocumentos').'/'. urlencode($procesoAdmon->id_proceso_admon) }}" method="GET">
													{{ csrf_field() }}

													<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
														<i class="fa fa-btn fa-upload"></i>Documentos
													</button>
												</form>
											</td>
											
											
											<td>
												<form action="{{url('enviarValidacionComercial/' . $procesoAdmon->id_proceso_admon)}}" method="POST">
													{{ csrf_field() }}

													<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
														<i class="fa fa-btn fa-upload"></i>Enviar a Validación
													</button>
												</form>
											</td>
											
											
											
										<?php } ?>
									
										
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
