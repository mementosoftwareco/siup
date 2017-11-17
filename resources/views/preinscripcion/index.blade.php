@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pre-inscribete en la Iberoamericana
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Preinscripcion Form -->
                    <form action="{{ url('preinscripcion') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
						
						{{ Form::hidden('nombrePrograma') }} 

                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de identificación</label>

                            <div class="col-sm-6">
								{{Form::select('tipoIdentificacion', $tiposDocId, null, ['class'=>'form-control','placeholder' => 'Seleccione...'])}}
                            </div>
                        </div>
						
						<!-- Numero de identificacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Número de identificación</label>

                            <div class="col-sm-6">
                                <input type="text" name="numeroIdentificacion" id="preinscripcion-numeroId" class="form-control" value="{{ old('numeroIdentificacion') }}">
                            </div>
                        </div>
						
						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
                                <input type="text" name="nombres" id="preinscripcion-nombres" class="form-control" value="{{ old('nombres') }}">
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
                                <input type="text" name="apellidos" id="preinscripcion-apellidos" class="form-control" value="{{ old('apellidos') }}">
                            </div>
                        </div>
						
						<!-- Telefono -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Telefono</label>

                            <div class="col-sm-6">
                                <input type="text" name="telefono" id="preinscripcion-telefono" class="form-control" value="{{ old('telefono') }}">
                            </div>
                        </div>
						
						<!-- Celular -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
                                <input type="text" name="celular" id="preinscripcion-celular" class="form-control" value="{{ old('celular') }}">
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
                                <input type="text" name="email" id="preinscripcion-email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de educación</label>

                            <div class="col-sm-6">
							  <input type="radio" name="tipoEdu" value="1" > Pregrado <br/>
							  <input type="radio" name="tipoEdu" value="2"> Postgrado <br/>
							  <input type="radio" name="tipoEdu" value="3"> Educación continuada
                            </div>
                        </div>
						
						
						
						<!-- Programa -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Programa</label>

                            <div class="col-sm-6">
								{{Form::select('programa', $progs, null, ['class'=>'form-control','placeholder' => 'Seleccione...'])}}
								
                            </div>
                        </div>
						
						<!-- Terminos y Condiciones -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Terminos y Condiciones</label>

                            <div class="col-sm-6">
							  <input type="radio" name="termYCond" value="1" > Acepto <br/>
							  <input type="radio" name="termYCond" value="0"> No acepto <br/>
							</div>
                        </div>
						
						<!-- Terminos y Condiciones -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label"></label>

                            <div class="col-sm-6">
							  {!! captcha_image_html('ExampleCaptcha') !!}
							  <input type="text" id="CaptchaCode" name="CaptchaCode">
							</div>
                        </div>
						
						

                        <!-- Preinscripcion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Pre inscribirme
                                </button>
								 <button type="submit" class="btn btn-default"><a href="{{ route('menu') }}">Cancelar</a></button>
                            </div>
                        </div>
						
						<script>
						$(document).ready(function() {
							
							$('select[name="programa"]').on('change', function(){
								var nombreProgramaVar = $('select[name="programa"] option:selected').text();
								$('input[name="nombrePrograma"]').val(nombreProgramaVar);
								//console.log("entro a con nombre programa: " + nombreProgramaVar);
							});
							
							$(':input[type="submit"]').prop('disabled', true);
							
							$("input[name='termYCond']:radio").change(function(){
								if($(this).val() == '1')
								{
								  $(':input[type="submit"]').prop('disabled', false);
								}
								else if($(this).val() == '0')
								{
								  $(':input[type="submit"]').prop('disabled', true);
								}
							});

						});
						</script>
						
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection
