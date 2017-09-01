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
											<form action="{{url('mostrarHistorico/' . $procesoAdmon->id_proceso_admon)}}" method="POST" target="_blank">
												{{ csrf_field() }}

												<button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
													<i class="fa fa-btn fa-edit"></i>Histórico
												</button>
											</form>
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
            @endif
        </div>
    </div>
@endsection
