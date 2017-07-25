@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
          
			
			
			 <!-- Current Tasks -->
            @if (count($documentosRequeridos) > 0)
				
					<div class="panel panel-default">
					
						<div class="panel-heading">
							Documentos Requeridos
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
										
												
												<td class="table-text"><div><a href="{{ route('mostrarDocumento', ['id' =>$documentoRequerido->documento->id_documento]) }}">{{ $documentoRequerido->documento->nombre }}</a></div></td>
												
	
												
												<td class="table-text"><div>{{ $documentoRequerido->documento->fecha_creacion }}</div></td>
												
												<?php $nombre = 'file'.$documentoRequerido->id;?>
												
												
												 <td class="table-text"><div>
													<?php echo 
														"<input type=\"file\" name=\"".$nombre."\" id=\"".$nombre."\" class=\"form-control\" value=\"{{ old('".$nombre."') }}\"";
														
														
													?>
												 
												 
												
												</div>	</td>
												
												
											
										
											</tr>
										@endforeach
										
									</tbody>
								</table>
								
							
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Guardar Documentos
                                </button>
								
								 <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>
                            </div>
					
                           
                    
								
								
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
