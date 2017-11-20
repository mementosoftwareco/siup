@extends('layouts.app')

@section('content')
    <div class="container">
        
		
				
				
				
				

            <!-- Current Procesos admision -->
            @if (count($historicos) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Histórico del Proceso de Inscripción para el Aspirante {{ $persona->nombres }} {{ $persona->apellidos }} inscrito/a al programa {{ $inscripcion->nombre_programa }}
                    </div>
					
					
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <!--<th>Proceso</th>-->
								<th>Fecha</th>
								<th>Usuario</th>
								<th>Estado</th>
								<th>Comentarios</th>								
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($historicos as $historico)
                                    <tr>
                                     
										
										<td class="table-text"><div>{{ $historico->fecha == null ? 'viene nulo' : $historico->fecha }}</div></td>
										
										<td class="table-text"><div>{{ $historico->usuario == null ? 'Aspirante' : $historico->usuario->name }}</div></td>
										
										<td class="table-text"><div>{{ $historico->estado == null ? 'viene nulo' : $historico->estado->nombre }}</div></td>
																				
										<td class="table-text"><div>{{ $historico->comentarios  == null ? 'viene nulo' : $historico->comentarios}}</div></td>
										
										
									
										
										
									
										
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
						
						<div class="col-sm-offset-5 col-sm-5">
							
							
							 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Aceptar</a></button>-->
							 
					 </div>	
						
						
                    </div>
					
						
					 
                </div>
            @endif
        </div>
    </div>
@endsection
