
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Completa tus datos de inscripción en la Iberoamericana
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
					
                    <!-- New inscripcion Form -->
                    {{ Form::model($inscripcionPregrado, array('route' => ['inscripcion-pregrado',$inscripcionPregrado->idProcesoAdmision], 'method' => 'post', 'class' => 'form-horizontal') ) }}

						{{ Form::hidden('idUbicacion') }}
						{{ Form::hidden('idReferencia') }}
						{{ Form::hidden('idEducacion') }}
						{{ Form::hidden('idHomologacion') }}
						
                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                             {{ Form::label('Tipo de identificación', null, ['class' => 'col-sm-3 control-label']) }}
							

                            <div class="col-sm-6">
							{{ Form::select('tipoIdentificacion', ['1' => 'Cédula de ciudadanía',
																  '2' => 'Cédula de extranjería',
																  '3' => 'Pasaporte',
																  '4' => 'Tarjeta de identidad'
																  ], null, ['class'=>'form-control'])}}
							
							
                            </div>
                        </div>
						
						<!-- Numero de identificacion -->
                        <div class="form-group">
                            
							{{ Form::label('Número de identificación', null, ['class' => 'col-sm-3 control-label']) }}

                            <div class="col-sm-6">
                                
							{{ 	Form::text('numeroIdentificacion',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- fecha expedicion documento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha expedición documento</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaExpDocumento', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Lugar expedicion documento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Lugar expedición documento</label>

                            <div class="col-sm-6">
								{{ 	Form::text('lugarExpDocumento',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
								{{ 	Form::text('nombres',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
								{{ 	Form::text('apellidos',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Telefono -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Telefono</label>

                            <div class="col-sm-6">
								{{ 	Form::text('telefono',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Celular -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
								{{ 	Form::text('celular',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
								{{  Form::email('email', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha nacimiento</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaNacimiento', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Genero -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Género</label>

                            <div class="col-sm-6">
							{{Form::select('genero', ['FEMENINO' => 'Femenino',
													'MASCULINO' => 'Masculino'
													], null, ['class'=>'form-control'])}}
                            </div>
                        </div>
						
						<!-- Grupo étnico -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Grupo étnico</label>

                            <div class="col-sm-6">
							{{Form::select('grupoEtnico', ['5' => 'No aplica',
														  '1' => 'Afrocolombiano o Afrodescendiente',
														  '2' => 'Pueblos indígenas',
														  '3' => 'Raizales',
														  '4' => 'Rom'
														  ], null, ['class'=>'form-control'])}}
							
							</div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de educación</label>

                            <div class="col-sm-6">
							{{Form::select('tipoEdu', ['1' => 'Pregrado',
														  '2' => 'Postgrado',
														  '3' => 'Educación continuada'
														  ], null, ['class'=>'form-control'])}}
                            </div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Estado civil</label>

                            <div class="col-sm-6">
							{{Form::select('estCivil', ['1' => 'Soltero',
														  '2' => 'Casado'
														  ], null, ['class'=>'form-control'])}}
							
                            </div>
                        </div>
						
						<!-- procedencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Procedencia</label>

                            <div class="col-sm-6">
								{{ 	Form::text('procedencia',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Convenio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Convenio</label>

                            <div class="col-sm-6">
							{{Form::select('convenio', ['1' => 'No aplica',
														  '2' => 'Ser pilo paga',
														  '3' => 'icetex..otro'
														  ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Modalidad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Modalidad</label>

                            <div class="col-sm-6">
							  {{ Form::radio('modalidad', '1', null) }} Presencial <br/>
							  {{ Form::radio('modalidad', '2', null) }} Virtual <br/>
							</div>
                        </div>
						
						<!-- Programa -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Programa</label>

                            <div class="col-sm-6">
								{{Form::select('programa', ['11001' => 'Administración Logística',
														  '11002' => 'Administración y Finanzas',
														  '11003' => 'Contaduría Pública Virtual',
														  '11004' => 'Contaduría Pública',
														  '11005' => 'Fisioterapia',
														  '11006' => 'Fonoaudiología',
														  '11007' => 'Licenciatura en Educación Especial Virtual',
														  '11008' => 'Licenciatura en Educación Especial',
														  '11009' => 'Licenciatura en Pedagogía Infantil',
														  '11010' => 'Marketing y Negocios Internacionales',
														  '11011' => 'Psicología Virtual',
														  '11012' => 'Psicología',
														  '11013' => 'Técnico Profesional en Logística',
														  '11014' => 'Tecnología en Logística'
														  ], null, ['class'=>'form-control'])}}
                            </div>
                        </div>
						
						<!-- Terminos y Condiciones -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Terminos y Condiciones</label>

                            <div class="col-sm-6">
							  {{ Form::radio('termYCond', '1', null) }} Acepto <br/>
							  {{ Form::radio('termYCond', '0', null) }} No acepto  <br/>
							</div>
                        </div>
					
<!-- Inicio Subseccion ubicacion ----------------------------------------------------------------------  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							¿Donde vives?
						</div>
						<!-- Direccion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-6">
								{{ 	Form::text('direccion',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Departamento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Departamento</label>

                            <div class="col-sm-6">
							{{Form::select('departamento', ['11001' => 'Atlantico',
														'11002' => 'Cundinamarca'
													   ], null, ['class'=>'form-control'])}}
							
							</div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudad', ['11001' => 'Bogotá',
														'11002' => 'Barranquilla'
													   ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Municipio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Municipio</label>

                            <div class="col-sm-6">
							{{Form::select('municipio', ['11001' => 'Chía',
														'11002' => 'Cota'
													   ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Barrio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Barrio</label>

                            <div class="col-sm-6">
								{{ 	Form::text('barrio',null,['class'=>'form-control']) }}
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
													   ], null, ['class'=>'form-control'])}}
							
							</div>
                        </div>
					</div>	
<!-- Fin Subseccion ubicacion ----------------------------------------------------------------------  -->
						
						
						
<!-- Inicio subsección referencia personal o familiar ----------------------------------------------------------------------  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							Alguien que te conozca
						</div>

						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
								{{ 	Form::text('nombresReferencia',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
								{{ 	Form::text('apellidosReferencia',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Direccion Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-6">
								{{ 	Form::text('direccionReferencia',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Telefono Referencia-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Telefono</label>

                            <div class="col-sm-6">
								{{ 	Form::text('telefonoReferencia',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Celular Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
								{{ 	Form::text('celularReferencia',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- email Referencia-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
								{{  Form::email('emailReferencia', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Parentezco Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Parentesco</label>

                            <div class="col-sm-6">
							{{Form::select('parentescoRef', ['1' => 'Familiar',
														     '2' => 'Amigo'
													   ], null, ['class'=>'form-control'])}}
							
							</div>
                        </div>
					</div>	
<!-- Fin subsección referencia personal o familiar ----------------------------------------------------------------------  -->

<!-- Inicio subsección información de estudios de secundaria ----------------------------------------------------------------------  -->
					<div class="panel panel-default">	
						<div class="panel-heading">
							¿Donde estudiaste la secundaria?
						</div>
						
						<!-- Tipo de Colegio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de colegio</label>

                            <div class="col-sm-6">
							{{Form::select('tipoDeColegio', ['1' => 'Privado',
														     '2' => 'Público'
													   ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Colegio -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Colegio</label>

                            <div class="col-sm-6">
								{{ 	Form::text('colegio',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudadColegio', ['11001' => 'Bogotá',
														     '11002' => 'Barranquilla'
													   ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Barrio -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Barrio</label>

                            <div class="col-sm-6">
								{{ 	Form::text('barrioColegio',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Jornada -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Jornada</label>

                            <div class="col-sm-6">
							{{Form::select('jornadaColegio', ['AM' => 'Mañana',
														     'PM' => 'Tarde'
													   ], null, ['class'=>'form-control'])}}
							
							</div>
                        </div>
						
						<!-- Código ICFES -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Código ICFES</label>

                            <div class="col-sm-6">
								{{ 	Form::text('codigoIcfesColegio',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Año ICFES -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Año ICFES</label>

                            <div class="col-sm-6">
								{{  Form::number('anioIcfesColegio', 2000, ['class'=>'form-control']) }}
                            </div>
                        </div>
					</div>	
<!-- Inicio subsección información de estudios de secundaria ----------------------------------------------------------------------  -->

<!-- Inicio subsección homologación desde otra institución ----------------------------------------------------------------------  -->
					<div class="panel panel-default">	
						<div class="panel-heading">
							¿Vienes de otra U?
						</div>
						
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
							{{Form::select('tituloHomologacion', ['Ingeniero de Sistemas' => 'Ingeniero de Sistemas',
														     'Ingeniero Industrial' => 'Ingeniero Industrial'
													   ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Institución -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Institución</label>

                            <div class="col-sm-6">
								{{ 	Form::text('instHomologacion',null,['class'=>'form-control']) }}
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							{{Form::select('ciudadHomologacion', ['11001' => 'Bogotá',
														     '11002' => 'Barranquilla'
													   ], null, ['class'=>'form-control'])}}
							</div>
                        </div>
						
						<!-- Fecha finalización -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha finalización</label>

                            <div class="col-sm-6">
								{{ Form::date('fechaFinHomologacion', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
                            </div>
                        </div>
					</div>	
<!-- Final subsección homologación desde otra institución ----------------------------------------------------------------------  -->						

                        <!-- inscripcion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Completar mi Inscripción
                                </button>
								 <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
    </div>
@endsection
