@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
            

            <!-- Current Procesos admision -->
            @if (count($procesosAdmon) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Entrevistas Pendientes por Validar
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
											<button 
												   type="button" 
												   class="btn btn-danger" 
												   data-toggle="modal"												   
												   data-ruta-historico="{{ url('mostrarHistoricoGet/' . $procesoAdmon->id_proceso_admon) }}"
												   data-target="#historicoModal">
												  <i class="fa fa-btn fa-history"></i>Histórico
											</button>
										</td>
										
										
										<td>
                                            <form action="{{url('evaluarEntrevista/' . $procesoAdmon->id_proceso_admon)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-edit"></i>Evaluar
                                                </button>
                                            </form>
                                        </td>
										<!-- Cargar documentos Button -->
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
            @endif
        </div>
    </div>
@endsection
