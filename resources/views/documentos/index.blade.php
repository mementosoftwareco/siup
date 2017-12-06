@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
          
			{!! Breadcrumbs::render($breadcrumb, $idProceso) !!}
			
			 <!-- Current Tasks -->
            @if (count($documentosRequeridos) > 0)
				
					<div class="panel panel-default">
					
						<div class="panel-heading">
							Documentos requeridos para el Aspirante {{ $persona->nombres }} {{ $persona->apellidos }} inscrito/a al programa {{ $inscripcion->nombre_programa }}
						</div>

						<div class="panel-body">
						
							<form action="{{ url('/cargarDocumentos') }}" method="POST" class="form-horizontal"   enctype="multipart/form-data">
								{{ csrf_field() }}
								<table class="table table-striped task-table">
									<!--<thead>
										<th>Perfil</th>
										<th>&nbsp;</th>
									</thead>-->
									<thead>
									<th>Documento</th>
									<th>Estado</th>
									<th>Nombre</th>
									<th>Fecha Cargue</th>
									<th>Tamaño Máx</th>
									<th>Formato Requerido</th>
									
									<th>&nbsp;</th>
								</thead>
									<tbody>
									
										<?php echo 
														"<input type=\"hidden\" name=\"idProceso\" id=\"idProceso\" class=\"form-control\" value=\"".$idProceso."\"";
														
														
													?>
								
										@foreach ($documentosRequeridos as $documentoRequerido)
											<tr>
											 
												
												<td class="table-text"><div>{{ $documentoRequerido->tipoDocumento->nombre }}</div></td>
												
												<td class="table-text"><div>{{ $documentoRequerido->documento->estado }}</div></td>
										
												
												<td class="table-text"><div><a href="{{ route('mostrarDocumento', ['id' =>urlencode(encrypt($documentoRequerido->documento->id_documento))]) }}">{{ $documentoRequerido->documento->nombre }}</a></div></td>
												
													
												<td class="table-text"><div>{{ $documentoRequerido->documento->fecha_creacion }}</div></td>
												
												<td class="table-text"><div>{{ $documentoRequerido->tipoDocumento->tamano_max }}</div></td>
												
												<td class="table-text"><div>{{ $documentoRequerido->tipoDocumento->formato_req }}</div></td>
												
												<?php $nombre = 'file'.$documentoRequerido->id;?>
												
												@if ($edicion)
												 <td class="table-text"><div>
													<?php echo 	
														"<input size=\"3072\" accept=\".pdf\" disabled= \"true\"    type=\"file\" name=\"".$nombre."\" id=\"".$nombre."\" class=\"form-control\" value=\"{{ old('".$nombre."') }}\"";
														
														
													?>											
												</div>	</td>
												@endif
												@if (!$edicion)
												 <td class="table-text"><div>
													<?php echo 	
														"<input  size=\"3072\" accept=\".pdf\" type=\"file\" name=\"".$nombre."\" id=\"".$nombre."\" class=\"form-control\" value=\"{{ old('".$nombre."') }}\"";
														
														
													?>											
												</div>	</td>
												@endif
											</tr>
										@endforeach
										
									</tbody>
								</table>
								
							@if (!$edicion)
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-btn fa-upload"></i>Cargar Documentos
									</button>
									
									 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
								</div>
							@endif
                           
                    
								
								
							</form>
						</div>
					</div>
				@endif
			
				<div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
					
                    

                       
                   
                        
						
						
					
						
						
                    
                </div>
			
			
			
            
        </div>
    </div>
@endsection
