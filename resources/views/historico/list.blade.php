@extends('layouts.app')

@section('content')
    <div class="container">
        
		<div class="col-sm-offset-0 col-sm-12">
		
		{!! Breadcrumbs::render($breadcrumb) !!}
		
            <div class="panel panel-default">
                <div class="panel-heading">
                    Buscar Proceso
                </div>
				<div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
				
				<form action="{{ url('/cargarMisProcesosAdmision') }}" method="GET" class="form-horizontal">					
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
							
							 
							 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
							 
					 </div>					
				</form>
			</div>
        </div>

				
				
				
				
           <!-- Current Procesos admision -->
		   @if ($procesosAdmon != null)
            @if (count($procesosAdmon) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mis Procesos de Inscripción
                    </div>
					
					
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <!--<th>Proceso</th>-->
								<th>Identificación</th>
								<th>Nombre</th>
								<th>Estado</th>
								<th>Fecha inscripción</th>
								<th>Educación</th>
								<th>Programa</th>
								<th>Asesor Responsable</th>
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
											
										<td class="table-text"><div>{{ $procesoAdmon->usuario == null ? 'Aspirante' : $procesoAdmon->usuario->name }}</div></td>
									   <!-- Continuar inscripción Button -->
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
					
					<script>
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
                </div>
            @endif
		@endif
			
			
			
			
			
			
			
			
			
			
			
							
			<!-- Current Procesos admision -->
            @if (count($procesos) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Resultados de la Búsqueda
                    </div>
					
					
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <!--<th>Proceso</th>-->
								<th>Identificación</th>
								<th>Nombre</th>
								<th>Estado</th>
								<th>Fecha inscripción</th>
								<th>Educación</th>
								<th>Programa</th>
								<th>Asesor Responsable</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($procesos as $proceso)
                                    <tr>
                                     
										
										<td class="table-text"><div>{{ $proceso->persona == null ? 'viene nulo' : $proceso->persona->id_persona }}</div></td>
										
										<td class="table-text"><div>{{ $proceso->persona == null ? 'viene nulo' : $proceso->persona->nombres . ' ' . $proceso->persona->apellidos }}</div></td>
										
										<td class="table-text"><div>{{ $proceso->estadoProceso == null ? 'viene nulo' : $proceso->estadoProceso->nombre }}</div></td>
																				
										<td class="table-text"><div>{{ $proceso->created_at }}</div></td>
										
										<td class="table-text"><div>{{ $proceso->tipoProcesoAdmision == null ? 'viene nulo' : $proceso->tipoProcesoAdmision->nombre }}</div></td>

										<td class="table-text"><div>{{ $proceso->inscripcion == null ? 'viene nulo' : $proceso->inscripcion->nombre_programa }}</div></td>
											
										<td class="table-text"><div>{{ $proceso->usuario == null ? 'Aspirante' : $proceso->usuario->name }}</div></td>
									   <!-- Continuar inscripción Button -->
										<td>
											
											<button 
												   type="button" 
												   class="btn btn-danger" 
												   data-toggle="modal"												   
												   data-ruta-historico="{{ url('mostrarHistoricoGet/' . $proceso->id_proceso_admon) }}"
												   data-target="#historicoModal_1">
												  <i class="fa fa-btn fa-history"></i>Ver Histórico
											</button>
										</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
					
					<script>
							$(function() {
								$('#historicoModal_1').on("show.bs.modal", function (e) {
									 
									 $("#historicoModal_1").load($(e.relatedTarget).data('ruta-historico'));
									 
								});
							});
					</script>
					
					<div class="modal fade" id="historicoModal_1" 
							 tabindex="-1" role="dialog" 
							 aria-labelledby="historicoLabel">
					</div>
                </div>
            @endif	
				
				
        </div>
    </div>
@endsection
