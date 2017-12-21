
@extends('layouts.app')

<script> 
function abrir(url) { 
	window.open(url,'','top=300,left=300,width=500,height=200, resizable=0'); 
} 
</script> 

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
		{!! Breadcrumbs::render($breadcrumb, $inscripcionPregrado) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Completa tus datos de inscripción en la Iberoamericana
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
					
                    <!-- New inscripcion Form -->
                    {{ Form::model($inscripcionPregrado, array('route' => ['inscripcion',$inscripcionPregrado->idProcesoAdmision], 'method' => 'post', 'class' => 'form-horizontal') ) }}

					
						{{ csrf_field() }}
					
						{{ Form::hidden('idUbicacion') }}
						{{ Form::hidden('idReferencia') }}
						{{ Form::hidden('idEducacion') }}
						{{ Form::hidden('idHomologacion') }}
						{{ Form::hidden('nombrePrograma') }}
						<input type="hidden" name="validacion" id="validacion"  />  
						
                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                             {{ Form::label('Tipo de Identificación', null, ['class' => 'col-sm-3 control-label']) }}
							

                            <div class="col-sm-6">
							{{Form::select('tipoIdentificacion', $tiposDocId, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
                            </div>
                        </div>
						
						<!-- Numero de identificacion -->
                        <div class="form-group">
                            
							{{ Form::label('Número de Identificación', null, ['class' => 'col-sm-3 control-label']) }}

                            <div class="col-sm-6">
                                
							{{ 	Form::text('numeroIdentificacion',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- fecha expedicion documento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha Expedición Documento</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaExpDocumento', $inscripcionPregrado->fechaExpDocumento == null ? null : $inscripcionPregrado->fechaExpDocumento->format('Y-m-d'), ['class'=>'form-control', 'disabled' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Lugar expedicion documento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Lugar Expedición Documento</label>

                            <div class="col-sm-6">
								{{ 	Form::text('lugarExpDocumento',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
								{{ 	Form::text('nombres',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
								{{ 	Form::text('apellidos',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Telefono -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Teléfono</label>

                            <div class="col-sm-6">
								{{ 	Form::text('telefono',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Celular -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
								{{ 	Form::text('celular',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
								{{  Form::email('email', null, ['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha de Nacimiento</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaNacimiento', $inscripcionPregrado->fechaNacimiento == null ? null : $inscripcionPregrado->fechaNacimiento->format('Y-m-d'), ['class'=>'form-control', 'disabled' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Genero -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Género</label>

                            <div class="col-sm-6">
							{{Form::select('genero', $listadoGeneros, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
                            </div>
                        </div>
						
						<!-- Grupo étnico -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Grupo Étnico</label>

                            <div class="col-sm-6">
								{{Form::select('grupoEtnico', $listadoTipoEtnia, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'readonly' => $edicion])}}
							</div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de Educación</label>

                            <div class="col-sm-6">
							{{Form::select('tipoEdu', ['1' => 'Pregrado',
														  '2' => 'Postgrado',
														  '3' => 'Educación continuada'
														  ], null, ['class'=>'form-control', 'readonly' => $edicion])}}
                            </div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Estado Civil</label>

                            <div class="col-sm-6">
							{{Form::select('estCivil', $listadoEstadosCiviles, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'readonly' => $edicion])}}
                            </div>
                        </div>
						
						<!-- procedencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Procedencia</label>

                            <div class="col-sm-6">
								{{ 	Form::text('procedencia',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Convenio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Convenio</label>

                            <div class="col-sm-6">
							{{Form::select('convenio', $listadoConvenios, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							</div>
                        </div>
						
						<!-- Modalidad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Modalidad</label>

                            <div class="col-sm-6">
							  {{ Form::radio('modalidad', 'PRESENCIAL', null) }} Presencial <br/>
							  {{ Form::radio('modalidad', 'VIRTUAL', null) }} Virtual <br/>
							  {{ Form::radio('modalidad', 'DISTANCIA', null) }} Distancia <br/>
							</div>
                        </div>
						
						<!-- Programa -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Programa</label>

                            <div class="col-sm-6">
								{{Form::select('programa', $progs, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
                            </div>
                        </div>
						
						<!-- Terminos y Condiciones -->
                        <div class="form-group">
                            <!--<label for="task-name" class="col-sm-3 control-label">Términos y Condiciones</label>-->
							<a href="javascript:abrir('/terminos')" class="col-sm-3 control-label">Términos y Condiciones</a> 

                            <div class="col-sm-6">
							  {{ Form::radio('termYCond', '1', null) }} Acepto <br/>
							  {{ Form::radio('termYCond', '0', null) }} No acepto  <br/>
							</div>
                        </div>
					
<!-- Inicio Subseccion ubicacion ----------------------------------------------------------------------  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							¿Dónde vives?
						</div>
						<br/>
						<!-- Direccion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-6">
								{{ 	Form::text('direccion',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Departamento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Departamento</label>

                            <div class="col-sm-6">
							{{Form::select('departamento', $deptos, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							
							</div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudad', $ciudades, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'readonly' => $edicion])}}
							</div>
                        </div>
						
						<!-- Municipio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Municipio</label>

                            <div class="col-sm-6">
							{{Form::select('municipio', $centrosPoblados, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'readonly' => $edicion])}}
							</div>
                        </div>
						
						<script>
						$(document).ready(function() {
							
							var oldCountryID = '{{old('departamento', '-1')}}';
							var oldCityID = '{{old('ciudad', '-1')}}';
							var oldMunicipalityID = '{{old('municipio', '-1')}}';
							
							if(oldCountryID != '-1'){
								cityUpdate(oldCountryID);
							}
							if(oldCityID != '-1'){
								municipalityUpdate(oldCityID);
							}
							
							function cityUpdate(countryId2Load) {
								$.ajax({
										url: "{{ URL::to('ajax-ciudad') }}"+'/'+countryId2Load,
										type:"GET",
										dataType:"json",
										beforeSend: function(){
											$('#loader').css("visibility", "visible");
										},

										success:function(data) {

											$('select[name="ciudad"]').empty();
											$('select[name="municipio"]').empty();

											$.each(data, function(key, value){

												$('select[name="ciudad"]').append('<option value="'+ key +'">' + value + '</option>');

											});
											
											if (oldCityID != '-1') {
												$('select[name="ciudad"]').val(oldCityID).prop('selected', true);
											}
										},
										complete: function(){
											$('#loader').css("visibility", "hidden");
										}
									});
							}
							
							function municipalityUpdate(cityId2Load) {
								$.ajax({
										url: "{{ URL::to('ajax-municipio') }}"+'/'+cityId2Load,
										type:"GET",
										dataType:"json",
										beforeSend: function(){
											$('#loader').css("visibility", "visible");
										},

										success:function(data) {

											$('select[name="municipio"]').empty();

											$.each(data, function(key, value){

												$('select[name="municipio"]').append('<option value="'+ key +'">' + value + '</option>');

											});
											
											if (oldMunicipalityID != '-1') {
												$('select[name="municipio"]').val(oldMunicipalityID).prop('selected', true);
											}
										},
										complete: function(){
											$('#loader').css("visibility", "hidden");
										}
									});
							}

							$('select[name="departamento"]').on('change', function(){
								var countryId = $(this).val();
								if(countryId) {
									console.log("entro a log");
									cityUpdate(countryId);
								} else {
									$('select[name="ciudad"]').empty();
								}

							});
							
							$('select[name="ciudad"]').on('change', function(){
								var ciudadId = $(this).val();
								if(ciudadId) {
									municipalityUpdate(ciudadId);
								} else {
									$('select[name="municipio"]').empty();
								}

							});
							
							$('select[name="programa"]').on('change', function(){
								var nombreProgramaVar = $('select[name="programa"] option:selected').text();
								$('input[name="nombrePrograma"]').val(nombreProgramaVar);
								//console.log("entro a con nombre programa: " + nombreProgramaVar);
							});
							
							$('select[name="tipoEdu"]').on('change', function(){
								var tipoEduId = $(this).val();
								if(tipoEduId) {
									console.log("Se filtraran los programas por el tipo " + tipoEduId);
									$.ajax({
										url: "{{ URL::to('ajax-programa') }}" + '/' +tipoEduId,
										type:"GET",
										dataType:"json",
										beforeSend: function(){
											$('#loader').css("visibility", "visible");
										},

										success:function(data) {

											$('select[name="programa"]').empty();
											$.each(data, function(key, value){

												$('select[name="programa"]').append('<option value="'+ key +'">' + value + '</option>');

											});
										},
										complete: function(){
											$('#loader').css("visibility", "hidden");
										}
									});
								} else {
									$('select[name="programa"]').empty();
								}

							});

						});
						</script>
						
						<!-- Barrio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Barrio</label>

                            <div class="col-sm-6">
								{{ 	Form::text('barrio',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Estrato -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Estrato</label>

                            <div class="col-sm-6">
							{{Form::select('estrato', ['1' => '1',
														'2' => '2',
														'3' => '3',
														'4' => '4',
														'5' => '5',
														'6' => '6'
													   ], null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							
							</div>
                        </div>
					</div>	
<!-- Fin Subseccion ubicacion ----------------------------------------------------------------------  -->
						
						
						
<!-- Inicio subsección referencia personal o familiar ----------------------------------------------------------------------  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							Alguien que te conozca
						</div>
						<br/>
						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
								{{ 	Form::text('nombresReferencia',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
								{{ 	Form::text('apellidosReferencia',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Direccion Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-6">
								{{ 	Form::text('direccionReferencia',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Telefono Referencia-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Teléfono</label>

                            <div class="col-sm-6">
								{{ 	Form::text('telefonoReferencia',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Celular Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
								{{ 	Form::text('celularReferencia',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- email Referencia-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
								{{  Form::email('emailReferencia', null, ['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Parentezco Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Parentesco</label>

                            <div class="col-sm-6">
							{{Form::select('parentescoRef', $listadoTipoParentesco, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							</div>
                        </div>
					</div>	
<!-- Fin subsección referencia personal o familiar ----------------------------------------------------------------------  -->

<!-- Inicio subsección información de estudios de secundaria ----------------------------------------------------------------------  -->
					<div class="panel panel-default" id="panelSecundaria" name="panelSecundaria">	
						<div class="panel-heading">
							¿En dónde estudiaste la secundaria?
						</div>
						<br/>
						<!-- Tipo de Colegio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de Colegio</label>

                            <div class="col-sm-6">
							{{Form::select('tipoDeColegio', ['1' => 'Privado',
														     '2' => 'Público'
													   ], null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							</div>
                        </div>
						
						<!-- Colegio -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Colegio</label>

                            <div class="col-sm-6">
								{{ 	Form::text('colegio',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudadColegio', $ciudadesTotal, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							</div>
                        </div>
						
						<!-- Barrio -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Barrio</label>

                            <div class="col-sm-6">
								{{ 	Form::text('barrioColegio',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Jornada -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Jornada</label>

                            <div class="col-sm-6">
							{{Form::select('jornadaColegio', ['AM' => 'Mañana',
														     'PM' => 'Tarde'
													   ], null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							
							</div>
                        </div>
						
						<!-- Código ICFES -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Código ICFES</label>

                            <div class="col-sm-6">
								{{ 	Form::text('codigoIcfesColegio',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Año ICFES -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Año ICFES</label>

                            <div class="col-sm-6">
								{{  Form::number('anioIcfesColegio', null, ['class'=>'form-control', 'placeholder'=>'Año del examen ICFES o Pruebas SABER','readonly' => $edicion]) }}
                            </div>
                        </div>
					</div>	
<!-- Inicio subsección información de estudios de secundaria ----------------------------------------------------------------------  -->

<!-- Inicio subsección homologación desde otra institución ----------------------------------------------------------------------  -->
					<div class="panel panel-default" id="panelHomologacion" name="panelHomologacion">	
						<div class="panel-heading">
							¿Vienes de otra U?
						</div>
						<br/>
						<!-- Homologado -->
						<div class="form-group">
                            
							<label for="task-name" class="col-sm-3 control-label">Homologación</label>
							<div class="col-sm-6">	  
								  {{ Form::checkbox('homologacion', '1', null) }}
                            </div>
                        </div>
						
						<!-- Titulo -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Título</label>

                            <div class="col-sm-6">
							{{ 	Form::text('tituloHomologacion',null,['class'=>'form-control', 'placeholder'=>'Nombre de la carrera que estudiaste', 'readonly' => $edicion]) }}
							</div>
                        </div>
						
						<!-- Institución -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Institución</label>

                            <div class="col-sm-6">
								{{ 	Form::text('instHomologacion',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudadHomologacion', $ciudadesTotal, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							</div>
                        </div>
						
						<!-- Fecha finalización -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha Finalización</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaFinHomologacion', $inscripcionPregrado->fechaFinHomologacion == null ? null : $inscripcionPregrado->fechaFinHomologacion->format('Y-m-d'), ['class'=>'form-control', 'disabled' => $edicion]) }}
                            </div>
                        </div>
					</div>	

<!-- Inicio subsección homologación desde otra institución ----------------------------------------------------------------------  -->
					<div class="panel panel-default" id="panelPregrado" name="panelPregrado">	
						<div class="panel-heading">
							Dínos de tu pregrado
						</div>
						<br/>
						<!-- Homologado -->
						<div class="form-group">
                            
							<label for="task-name" class="col-sm-3 control-label">Programa</label>
							<div class="col-sm-6">	  
							{{ 	Form::text('programaPregrado',null,['class'=>'form-control', 'placeholder'=>'Nombre de la carrera que estudiaste', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Titulo -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Título</label>

                            <div class="col-sm-6">
							{{ 	Form::text('tituloPregrado',null,['class'=>'form-control', 'placeholder'=>'El titulo como aparece en tu diploma', 'readonly' => $edicion]) }}
							</div>
                        </div>
						
						<!-- Institución -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Universidad</label>

                            <div class="col-sm-6">
								{{ 	Form::text('universidadPregado',null,['class'=>'form-control', 'readonly' => $edicion]) }}
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudadPregrado', $ciudadesTotal, null, ['class'=>'form-control','placeholder' => 'Seleccione...', 'disabled' => $edicion])}}
							</div>
                        </div>
						
						<!-- Fecha finalización -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha Finalización</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaFinPregrado', $inscripcionPregrado->fechaFinPregrado == null ? null : $inscripcionPregrado->fechaFinPregrado->format('Y-m-d'), ['class'=>'form-control', 'disabled' => $edicion]) }}
                            </div>
                        </div>
					</div>
					
					<script>
						$(document).ready(function() {
							
							if($('select[name="tipoEdu"]').val() == 1){
								$('div[name="panelHomologacion"]').show();
								$('div[name="panelSecundaria"]').show();
								$('div[name="panelPregrado"]').hide();
							}else if($('select[name="tipoEdu"]').val() == 2){
								$('div[name="panelHomologacion"]').hide();
								$('div[name="panelSecundaria"]').hide();
								$('div[name="panelPregrado"]').show();
							}
							else{
								$('div[name="panelHomologacion"]').hide();
								$('div[name="panelSecundaria"]').hide();
								$('div[name="panelPregrado"]').hide();
							}
														

							$('select[name="tipoEdu"]').on('change', function(){
								var tipoEduId = $(this).val();
								if(tipoEduId == 1) {
									$('div[name="panelHomologacion"]').show();
									$('div[name="panelSecundaria"]').show();
									$('div[name="panelPregrado"]').hide();
								} else if(tipoEduId == 2) {
									$('div[name="panelHomologacion"]').hide();
									$('div[name="panelSecundaria"]').hide();
									$('div[name="panelPregrado"]').show();
								}else {
									$('div[name="panelHomologacion"]').hide();
									$('div[name="panelSecundaria"]').hide();
									$('div[name="panelPregrado"]').hide();
								}

							});
							
						});
						</script>
<!-- Final subsección homologación desde otra institución ----------------------------------------------------------------------  -->						

                        <!-- inscripcion Button -->
                        
						@if (!$edicion)
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default" onclick="document.getElementById('validacion').value = 'false'"  >
										<i class="fa fa-btn fa-plus"></i>Guardar
									</button>
									 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default" onclick="document.getElementById('validacion').value = 'true'" >
										<i class="fa fa-btn fa-plus"></i>Completar mi Inscripción
									</button>
									 <!--<button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>-->
								</div>
							</div>
							
						@endif
						
						
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
    </div>
@endsection
