
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulario de Entrevista Diligenciado
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
					
                    <!-- New inscripcion Form -->
                    {{ Form::model($entrevistaViewModel, array('route' => ['entrevista',$entrevistaViewModel->idProcesoAdmision], 'method' => 'post', 'class' => 'form-horizontal') ) }}

						
					
						
                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                             {{ Form::label('Tipo de identificación', null, ['class' => 'col-sm-3 control-label']) }}
							

                            <div class="col-sm-6">
							{{ Form::select('tipoIdentificacion', ['1' => 'Cédula de ciudadanía',
																  '2' => 'Cédula de extranjería',
																  '3' => 'Pasaporte',
																  '4' => 'Tarjeta de identidad'
																  ], null, ['class'=>'form-control','disabled'])}}
							
							
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
						
						
						
				
					
					<table style="border-collapse: separate; border-spacing: 10px;">
						<tr>
							<td>
							He ingresado a la página de la universidad y he navegado por ella
							</td>
							<td>
							  Si {{ Form::radio('pregunta1', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta1', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Leí el pensamiento Ibero (Misión y Visión) y me identifico en ellos 
							</td>
							<td>
							  Si {{ Form::radio('pregunta2', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta2', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							La universidad cuenta con un valor distintivo en comparación con otras instituciones
							</td>
							<td>
							  Si {{ Form::radio('pregunta3', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta3', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Conozco los convenios con los que cuenta la universidad
							</td>
							<td>
							  Si {{ Form::radio('pregunta4', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta4', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Conozco el proceso de admisión y los requisitos para mi matricula
							</td>
							<td>
							  Si {{ Form::radio('pregunta5', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta5', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Cuento con los recursos tecnológicos para garantizar mi proceso de formación
							</td>
							<td>
							  Si {{ Form::radio('pregunta6', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta6', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Tengo experiencia en procesos formativos bajo la modalidad virtual
							</td>
							<td>
							  Si {{ Form::radio('pregunta7', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta7', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Revisé el programa que oferta el programa al que me inscribí
							</td>
							<td>
							  Si {{ Form::radio('pregunta8', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta8', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Me identifico con el rol profesional y ocupacional de la carrera que elegí
							</td>
							<td>
							  Si {{ Form::radio('pregunta9', '1', null) }}
							</td>
							
							<td>
							  No {{ Form::radio('pregunta9', '0', null) }}
							</td>							
						</tr>						
					</table>
					<br/>
					
					<br/>
					<br/>
					
					<table style="border-collapse: separate; border-spacing: 10px;">
						<tr>
							<th>
							
							</th>
							<th>
							  Siempre
							</th>
							
							<th>
							  Casi siempre
							</th>
							<th>
							  A menudo
							</th>	
							<th>
							  Rara vez
							</th>
							<th>
							  Nunca
							</th>							
						</tr>
						<tr>
							<td>
							Al comenzar a estudiar una lectura, primero la leo toda de forma superficial
							</td>
							<td>
							 {{ Form::radio('pregunta10', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta10', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta10', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta10', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta10', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							A medida que voy estudiando busco el significado de las palabras desconocidas 
							</td>
							<td>
							 {{ Form::radio('pregunta11', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta11', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta11', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta11', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta11', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Cuando estudio trato de resumir mentalmente lo más importante
							</td>
							<td>
							 {{ Form::radio('pregunta12', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta12', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta12', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta12', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta12', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Cuando leo diferencio las ideas principales de las secundarias 
							</td>
							<td>
							 {{ Form::radio('pregunta13', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta13', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta13', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta13', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta13', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Establezco analogías elaborando metáforas con las cuestiones que estoy aprendiendo
							</td>
							<td>
							 {{ Form::radio('pregunta14', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta14', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta14', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta14', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta14', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Uso aquello que aprendo, en la medida de lo posible, en mi vida diaria
							</td>
							<td>
							 {{ Form::radio('pregunta15', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta15', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta15', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta15', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta15', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Me intereso por la aplicación que puedan tener los temas que estudio a los campos laborales que conozco
							</td>
							<td>
							 {{ Form::radio('pregunta16', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta16', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta16', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta16', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta16', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Hago resúmenes de lo estudiado al final de cada tema
							</td>
							<td>
							 {{ Form::radio('pregunta17', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta17', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta17', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta17', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta17', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Mientras estudio un tema hago mapas mentales o conceptuales
							</td>
							<td>
							 {{ Form::radio('pregunta18', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta18', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta18', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta18', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta18', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Antes de iniciar el estudio de un tema distribuyo el tiempo de que dispongo
							</td>
							<td>
							 {{ Form::radio('pregunta19', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta19', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta19', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta19', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta19', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Cuando se acercan los exámenes establezco un plan de trabajo para estudiar
							</td>
							<td>
							 {{ Form::radio('pregunta20', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta20', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta20', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta20', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta20', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Cuando compruebo que las estrategias que utilizo para “aprender” no son eficaces busco otras alternativas
							</td>
							<td>
							 {{ Form::radio('pregunta21', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta21', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta21', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta21', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta21', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Procuro que en el lugar que estudio no haya nada que pueda distraerme
							</td>
							<td>
							 {{ Form::radio('pregunta22', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta22', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta22', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta22', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta22', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Me digo a mi mismo que puedo superar mi nivel de rendimiento actual 
							</td>
							<td>
							 {{ Form::radio('pregunta23', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta23', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta23', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta23', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta23', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Cuando tengo conflictos familiares, procuro resolverlos antes , si puedo, para concentrarme mejor en el estudio
							</td>
							<td>
							 {{ Form::radio('pregunta24', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta24', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta24', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta24', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta24', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Me dirijo a mí mismo palabras de ánimo para estimularme y mantenerme en las tareas de estudio
							</td>
							<td>
							 {{ Form::radio('pregunta25', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta25', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta25', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta25', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta25', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Estudio para ampliar mis conocimientos, para saber más, para ser más experto
							</td>
							<td>
							 {{ Form::radio('pregunta26', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta26', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta26', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta26', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta26', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Me esfuerzo en el estudio para sentirme orgulloso 
							</td>
							<td>
							 {{ Form::radio('pregunta27', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta27', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta27', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta27', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta27', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Lo que he logrado en mi vida ha sido porque lo he buscado 
							</td>
							<td>
							 {{ Form::radio('pregunta28', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta28', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta28', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta28', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta28', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Los logros que he tenido en mi vida se deben a mi esfuerzo
							</td>
							<td>
							 {{ Form::radio('pregunta29', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta29', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta29', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta29', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta29', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Mejorará mi vida si me esfuerzo en ello
							</td>
							<td>
							 {{ Form::radio('pregunta30', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta30', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta30', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta30', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta30', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Mantengo a mis amigos por decisión propia
							</td>
							<td>
							 {{ Form::radio('pregunta31', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta31', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta31', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta31', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta31', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Las calificaciones que tengo se deben a mi empeño
							</td>
							<td>
							 {{ Form::radio('pregunta32', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta32', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta32', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta32', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta32', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Tengo habilidad para relacionarme con las personas
							</td>
							<td>
							 {{ Form::radio('pregunta33', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta33', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta33', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta33', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta33', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							He sacado buenas calificaciones porque le caigo bien a mis maestros
							</td>
							<td>
							 {{ Form::radio('pregunta34', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta34', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta34', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta34', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta34', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Los logros que he tenido en mi vida se deben a la casualidad
							</td>
							<td>
							 {{ Form::radio('pregunta35', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta35', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta35', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta35', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta35', '0', null) }}
							</td>							
						</tr>
						<tr>
							<td>
							Lo que he logrado en mi vida ha sido porque así tenía que suceder
							</td>
							<td>
							 {{ Form::radio('pregunta36', '4', null) }}
							</td>
							
							<td>
							 {{ Form::radio('pregunta36', '3', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta36', '2', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta36', '1', null) }}
							</td>
							<td>
							 {{ Form::radio('pregunta36', '0', null) }}
							</td>							
						</tr>
					</table>
<!-- Final subsección cuestionario de admisión ----------------------------------------------------------------------  -->						

<br/>
<br/>


                       <td>
							<form action="{{url('aprobarEntrevista/' . $entrevistaViewModel->idProcesoAdmision)}}" method="POST">
								{{ csrf_field() }}

								<button type="submit" id="edit-process-{{ $entrevistaViewModel->idProcesoAdmision }}" class="btn btn-danger">
									<i class="fa fa-btn fa-upload"></i>Aprobar
								</button>
							</form>
						</td>
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
    </div>
@endsection
