@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            

            <!-- Current Procesos admision -->
            @if (count($procesosAdmon) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Completar inscripciones y cargar documentos
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Proceso</th>
								<th>Documento aspirante</th>
								<th>Aspirante</th>
								<th>Estado</th>
								<th>Fecha inscripción</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($procesosAdmon as $procesoAdmon)
                                    <tr>
                                        <td class="table-text"><div>{{ $procesoAdmon->id_proceso_admon }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->persona == null ? 'viene nulo' : $procesoAdmon->persona->id_persona }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->persona == null ? 'viene nulo' : $procesoAdmon->persona->nombres . ' ' . $procesoAdmon->persona->apellidos }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->estadoProceso == null ? 'viene nulo' : $procesoAdmon->estadoProceso->nombre }}</div></td>
										
										<td class="table-text"><div>{{ $procesoAdmon->created_at }}</div></td>

                                        <!-- Continuar inscripción Button -->
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
                                            <form action="{{url('prepararCargaDocumentos/' . $procesoAdmon->id_proceso_admon)}}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" id="edit-process-{{ $procesoAdmon->id_proceso_admon }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-upload"></i>Documentos
                                                </button>
                                            </form>
                                        </td>
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
