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

                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de identificación</label>

                            <div class="col-sm-6">
								<select name="tipoIdentificacion" id="preinscripcion-tipoId" class="form-control">
									<option value="1">Cédula de ciudadanía</option>
									<option value="2">Cédula de extranjería</option>
									<option value="3">Pasaporte</option>
									<option value="4">Tarjeta de identidad</option>
								</select>
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
						
						<!-- Modalidad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Modalidad</label>

                            <div class="col-sm-6">
							  <input type="radio" name="modalidad" value="1" > Presencial <br/>
							  <input type="radio" name="modalidad" value="2"> Virtual <br/>
							</div>
                        </div>
						
						<!-- Programa -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Programa</label>

                            <div class="col-sm-6">
								<select name="programa" id="preinscripcion-programa" class="form-control">
									<option value="11001">Administración Logística</option>
									<option value="11002">Administración y Finanzas</option>
									<option value="11003">Contaduría Pública Virtual</option>
									<option value="11004">Contaduría Pública</option>
									<option value="11004">Fisioterapia</option>
									<option value="11005">Fonoaudiología</option>
									<option value="11006">Licenciatura en Educación Especial Virtual</option>
									<option value="11007">Licenciatura en Educación Especial</option>
									<option value="11008">Licenciatura en Pedagogía Infantil</option>
									<option value="11009">Marketing y Negocios Internacionales</option>
									<option value="11010">Psicología Virtual</option>
									<option value="11011">Psicología</option>
									<option value="11012">Técnico Profesional en Logística</option>
									<option value="11013">Tecnología en Logística</option>
								</select>
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

                        <!-- Preinscripcion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Pre inscribirme
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection
