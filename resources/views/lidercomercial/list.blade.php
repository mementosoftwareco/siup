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
				
				<form action="{{ url('/lc.buscarAspirante') }}" method="GET" class="form-horizontal">					
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
                        Inscripciones Pendientes
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

										<td class="table-text"><div><span id="nombre_programa">{{ $procesoAdmon->inscripcion == null ? 'viene nulo' : $procesoAdmon->inscripcion->nombre_programa }}</span></div></td>
											
									   <!-- Continuar inscripción Button -->
									   
									   <td>
											<form action="{{url('inscripcion/' . $procesoAdmon->id_proceso_admon)}}" method="GET">
												{{ csrf_field() }}

												<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
													<i class="fa fa-btn fa-search-plus"></i>Inscripción
												</button>
											</form>
										</td>
										<td>
											<form action="{{url('prepararCargaDocumentos').'/'. urlencode($procesoAdmon->id_proceso_admon) }}" method="GET">
													{{ csrf_field() }}
												<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
													<i class="fa fa-btn fa-search-plus"></i>Documentos
												</button>
											</form>
										</td>	
										
										
										
											
										<td>
											
											<button 
												   type="button" 
												   class="btn btn-danger" 
												   data-toggle="modal"												   
												   data-ruta-historico="{{ url('mostrarHistoricoGet/' . $procesoAdmon->id_proceso_admon) }}"
												   data-target="#historicoModal">
												  <i class="fa fa-btn fa-history"></i>Ver Histórico
											</button>
										</td>
										
									
										
										
										<?php if($procesoAdmon->estadoProceso->id_estado==EstadosProcesoAdmisionEnum::Inscrito) {?>
											
										
											<td>
												<button 
												   type="button" 
												   class="btn btn-danger" 
												   data-toggle="modal"
												   data-id="{{ $procesoAdmon->id_proceso_admon }}"
												   data-nombre_programa="{{ $procesoAdmon->inscripcion == null ? 'viene nulo' : $procesoAdmon->inscripcion->nombre_programa }}"
												   data-target="#aprobarModal">
												  <i class="fa fa-btn fa-check"></i>Aprobar
												</button>
											</td>
											<td>
												<button 
												   type="button" 
												   class="btn btn-danger" 
												   data-toggle="modal"
												   data-id="{{ $procesoAdmon->id_proceso_admon }}"
												   data-nombre_programa="{{ $procesoAdmon->inscripcion == null ? 'viene nulo' : $procesoAdmon->inscripcion->nombre_programa }}"
												   data-target="#rechazarModal">
												  <i class="fa fa-btn fa-close"></i>Rechazar
												</button>
											</td>
											
										<?php } ?>
									
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
						
						<script>
							$(function() {
								$('#aprobarModal').on("show.bs.modal", function (e) {
									 $("#fav-programa").html($(e.relatedTarget).data('nombre_programa'));
									 $("#idProceso").val($(e.relatedTarget).data('id'));
								});
							});
							
							$(function() {
								$('#rechazarModal').on("show.bs.modal", function (e) {
									 $("#fav-programa-r").html($(e.relatedTarget).data('nombre_programa'));
									 $("#idProcesoR").val($(e.relatedTarget).data('id'));
								});
							});
							
							$(function() {
								$('#historicoModal').on("show.bs.modal", function (e) {
									 
									 $("#historicoModal").load($(e.relatedTarget).data('ruta-historico'));
									 
								});
							});
						</script>
						
						<div class="modal fade" id="historicoModal" 
							 tabindex="-1" role="dialog" 
							 aria-labelledby="historicoLabel">
						</div>
						
						<div class="modal fade" id="aprobarModal" 
							 tabindex="-1" role="dialog" 
							 aria-labelledby="aprobarModalLabel">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" 
								  data-dismiss="modal" 
								  aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" 
								id="aprobarModalLabel">Vas a aprobar la Inscripcion</h4>
							  </div>
							  <div class="modal-body">
								<p>
								Por favor agrega un comentario para la aprobación de esta inscripción al programa
								<b><span id="fav-programa">Programa</span></b> 
								
								</p>
							  </div>
							  <div class="modal-footer">
							  
							  <form action="{{url('lc.aprobar.proceso/')}}" method="POST">
													{{ csrf_field() }}
													
									{{ Form::hidden('idProceso', null,  array('id' => 'idProceso')) }}
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" name="comentariosAprobacion" id="comentariosAprobacion" class="form-control" value="">
										</div>
									</div>
									<br>
									<br>
									<br>
									<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>   
									<span class="pull-right">
										<button type="submit" id="edit-process-btn" class="btn btn-danger">
											<i class="fa fa-btn fa-edit"></i>Aprobar
										</button>
									</span>
									</div>
									</div>
								</form>
								
							  </div>
							</div>
						  </div>
						</div>
						
						<div class="modal fade" id="rechazarModal" 
							 tabindex="-1" role="dialog" 
							 aria-labelledby="rechazarModalLabel">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" 
								  data-dismiss="modal" 
								  aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" 
								id="rechazarModalLabel">Vas a rechazar la Inscripcion</h4>
							  </div>
							  <div class="modal-body">
								<p>
								Por favor agrega un comentario para el rechazo de esta inscripción al programa
								<b><span id="fav-programa-r">Programa</span></b> 
								
								</p>
							  </div>
							  <div class="modal-footer">
							  
							  <form action="{{url('lc.rechazar.proceso/')}}" method="POST">
													{{ csrf_field() }}
													
									{{ Form::hidden('idProcesoR', null,  array('id' => 'idProcesoR')) }}
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" name="comentariosRechazo" id="comentariosRechazo" class="form-control" value="">
										</div>
									</div>
									<br>
									<br>
									<br>
									<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>   
									<span class="pull-right">
										<button type="submit" id="edit-process-btn" class="btn btn-danger">
											<i class="fa fa-btn fa-edit"></i>Rechazar
										</button>
									</span>
									</div>
									</div>
								</form>
								
							  </div>
							</div>
						  </div>
						</div>
						
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
