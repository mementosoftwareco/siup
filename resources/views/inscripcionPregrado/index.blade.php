
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
                    <form action="{{ url('inscripcion') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

						<input type="hidden" name="idInscripcion" id="inscripcion-idInscripcion" class="form-control" value="{{ old('idInscripcion') }}">
						<input type="hidden" name="idProcesoAdmon" id="inscripcion-idProcesoAdmon" class="form-control" value="{{ old('idProcesoAdmon') }}">
						
                        <!-- Tipo de identificacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de identificación</label>

                            <div class="col-sm-6">
								<select name="tipoIdentificacion" id="inscripcion-tipoId" class="form-control">
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
                                <input type="text" name="numeroIdentificacion" id="inscripcion-numeroId" class="form-control" value="{{ old('numeroIdentificacion') }}">
                            </div>
                        </div>
						
						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
                                <input type="text" name="nombres" id="inscripcion-nombres" class="form-control" value="{{ old('nombres') }}">
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
                                <input type="text" name="apellidos" id="inscripcion-apellidos" class="form-control" value="{{ old('apellidos') }}">
                            </div>
                        </div>
						
						<!-- Telefono -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Telefono</label>

                            <div class="col-sm-6">
                                <input type="text" name="telefono" id="inscripcion-telefono" class="form-control" value="{{  old('telefono') }}">
                            </div>
                        </div>
						
						<!-- Celular -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
                                <input type="text" name="celular" id="inscripcion-celular" class="form-control" value="{{ old('celular') }}">
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
                                <input type="text" name="email" id="inscripcion-email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha nacimiento</label>

                            <div class="col-sm-6">
                                <input type="text" name="fechaNacimiento" id="inscripcion-fechaNac" class="form-control" value="{{ old('fechaNacimiento') }}">
                            </div>
                        </div>
						
						<!-- Genero -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Género</label>

                            <div class="col-sm-6">
							<select name="genero" id="inscripcion-genero" class="form-control">
								<option value="1">Femenino</option>
								<option value="2">Masculino</option>
							</select>
                            </div>
                        </div>
						
						<!-- Grupo étnico -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Grupo étnico</label>

                            <div class="col-sm-6">
							<select name="grupoEtnico" id="inscripcion-grupoEtnico" class="form-control">
								<option value="1">Afrocolombiano o Afrodescendiente</option>
								<option value="2">Pueblos indígenas</option>
								<option value="3">Raizales</option>
								<option value="4">Rom</option>
							</select>
							</div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de educación</label>

                            <div class="col-sm-6">
							<select name="tipoEdu" id="inscripcion-tipoEdu" class="form-control">
								<option value="1">Pregrado</option>
								<option value="2">Postgrado</option>
								<option value="3">Educación continuada</option>
							</select>
                            </div>
                        </div>
						
						<!-- Tipo educacion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Estado civil</label>

                            <div class="col-sm-6">
							<select name="estCivil" id="inscripcion-estCivil" class="form-control">
								<option value="1">Soltero</option>
								<option value="2">Casado</option>
							</select>
                            </div>
                        </div>
						
						<!-- procedencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Procedencia</label>

                            <div class="col-sm-6">
                                <input type="text" name="procedencia" id="inscripcion-procedencia" class="form-control" value="{{ old('procedencia') }}">
                            </div>
                        </div>
						
						<!-- Convenio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Convenio</label>

                            <div class="col-sm-6">
							<select name="convenio" id="inscripcion-convenio" class="form-control">
								<option value="1">Ser pilo paga</option>
								<option value="2">icetex..otro</option>
							</select>
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
								<select name="programa" id="inscripcion-programa" class="form-control">
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
						
<!-- Inicio Subseccion ubicacion ----------------------------------------------------------------------  -->
						
						<!-- Direccion -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-6">
                                <input type="text" name="direccion" id="inscripcion-direccion" class="form-control" value="{{ old('direccion') }}">
                            </div>
                        </div>
						
						<!-- Departamento -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Departamento</label>

                            <div class="col-sm-6">
							<select name="departamento" id="inscripcion-departamento" class="form-control">
									<option value="11001">Atlantico</option>
									<option value="11002">Cundinamarca</option>
							</select>
							</div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							<select name="ciudad" id="inscripcion-ciudad" class="form-control">
									<option value="11001">Bogotá</option>
									<option value="11002">Barranquilla</option>
							</select>
							</div>
                        </div>
						
						<!-- Municipio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Municipio</label>

                            <div class="col-sm-6">
							<select name="municipio" id="inscripcion-municipio" class="form-control">
									<option value="11001">Chía</option>
									<option value="11002">Cota</option>
							</select>
							</div>
                        </div>
						
						<!-- Barrio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Barrio</label>

                            <div class="col-sm-6">
                                <input type="text" name="barrio" id="inscripcion-barrio" class="form-control" value="{{ old('barrio') }}">
                            </div>
                        </div>
						
						<!-- Estrato -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Estrato</label>

                            <div class="col-sm-6">
							<select name="estrato" id="inscripcion-estrato" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
							</select>
							</div>
                        </div>
						
<!-- Fin Subseccion ubicacion ----------------------------------------------------------------------  -->
						
						
						
<!-- Inicio subsección referencia personal o familiar ----------------------------------------------------------------------  -->

						<!-- Nombres -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombres</label>

                            <div class="col-sm-6">
                                <input type="text" name="nombresReferencia" id="inscripcion-NomReferencia" class="form-control" value="{{ old('nombresReferencia') }}">
                            </div>
                        </div>
						
						<!-- Apellidos -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-6">
                                <input type="text" name="apellidosReferencia" id="inscripcion-apellReferencia" class="form-control" value="{{ old('apellidosReferencia') }}">
                            </div>
                        </div>
						
						<!-- Direccion Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-6">
                                <input type="text" name="direccionReferencia" id="inscripcion-direccionReferencia" class="form-control" value="{{ old('direccionReferencia') }}">
                            </div>
                        </div>
						
						<!-- Telefono Referencia-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Telefono</label>

                            <div class="col-sm-6">
                                <input type="text" name="telefonoReferencia" id="inscripcion-telefonoRef" class="form-control" value="{{ old('telefonoReferencia') }}">
                            </div>
                        </div>
						
						<!-- Celular Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-6">
                                <input type="text" name="celularReferencia" id="inscripcion-celularRef" class="form-control" value="{{ old('celularReferencia') }}">
                            </div>
                        </div>
						
						<!-- email Referencia-->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
                                <input type="text" name="emailReferencia" id="inscripcion-emailRef" class="form-control" value="{{ old('emailReferencia') }}">
                            </div>
                        </div>
						
						<!-- Parentezco Referencia -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Parentesco</label>

                            <div class="col-sm-6">
							 <select name="parentescoRef" id="inscripcion-parentescoRef" class="form-control">
									<option value="1">Familiar</option>
									<option value="2">Amigo</option>
							</select>
							</div>
                        </div>
						
<!-- Fin subsección referencia personal o familiar ----------------------------------------------------------------------  -->

<!-- Inicio subsección información de estudios de secundaria ----------------------------------------------------------------------  -->
						<!-- Tipo de Colegio -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tipo de colegio</label>

                            <div class="col-sm-6">
							 <select name="tipoDeColegio" id="inscripcion-tipoDeColegio" class="form-control">
									<option value="1">Privado</option>
									<option value="2">Público</option>
							</select>
							</div>
                        </div>
						
						<!-- Colegio -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Colegio</label>

                            <div class="col-sm-6">
                                <input type="text" name="colegio" id="inscripcion-colegio" class="form-control" value="{{ old('colegio') }}">
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							<select name="ciudadColegio" id="inscripcion-ciudadColegio" class="form-control">
									<option value="11001">Bogotá</option>
									<option value="11002">Barranquilla</option>
							</select>
							</div>
                        </div>
						
						<!-- Barrio -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Barrio</label>

                            <div class="col-sm-6">
                                <input type="text" name="barrioColegio" id="inscripcion-barrioColegio" class="form-control" value="{{ old('barrioColegio') }}">
                            </div>
                        </div>
						
						<!-- Jornada -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Jornada</label>

                            <div class="col-sm-6">
							<select name="jornadaColegio" id="inscripcion-jornadaColegio" class="form-control">
									<option value="11001">Mañana</option>
									<option value="11002">Tarde</option>
							</select>
							</div>
                        </div>
						
						<!-- Código ICFES -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Código ICFES</label>

                            <div class="col-sm-6">
                                <input type="text" name="codigoIcfesColegio" id="inscripcion-codigoIcfesColegio" class="form-control" value="{{ old('codigoIcfesColegio') }}">
                            </div>
                        </div>
						
						<!-- Año ICFES -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Año ICFES</label>

                            <div class="col-sm-6">
                                <input type="text" name="anioIcfesColegio" id="inscripcion-anioIcfesColegio" class="form-control" value="{{ old('anioIcfesColegio') }}">
                            </div>
                        </div>
						
<!-- Inicio subsección información de estudios de secundaria ----------------------------------------------------------------------  -->

<!-- Inicio subsección homologación desde otra institución ----------------------------------------------------------------------  -->
						<!-- Homologado -->
						<div class="form-group">
                            <div class="col-sm-6">
                                <input type="checkbox" name="homologacion" value="homologacion"> Homologación<br>
                            </div>
                        </div>
						
						<!-- Titulo -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Título</label>

                            <div class="col-sm-6">
							<select name="tituloHomologacion" id="inscripcion-tituloHomologacion" class="form-control">
									<option value="1">Ingeniero de Sistemas</option>
									<option value="2">Ingeniero Industrial</option>
							</select>
							</div>
                        </div>
						
						<!-- Institución -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Institución</label>

                            <div class="col-sm-6">
                                <input type="text" name="instHomologacion" id="inscripcion-instHomologacion" class="form-control" value="{{ old('instHomologacion') }}">
                            </div>
                        </div>
						
						<!-- Ciudad -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-6">
							<select name="ciudadHomologacion" id="inscripcion-ciudadHomologacion" class="form-control">
									<option value="11001">Bogotá</option>
									<option value="11002">Barranquilla</option>
							</select>
							</div>
                        </div>
						
						<!-- Fecha finalización -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Fecha finalización</label>

                            <div class="col-sm-6">
                                <input type="text" name="fechaFinHomologacion" id="inscripcion-fechaFinHomologacion" class="form-control" value="{{ old('fechaFinHomologacion') }}">
                            </div>
                        </div>
						
<!-- Final subsección homologación desde otra institución ----------------------------------------------------------------------  -->						

                        <!-- inscripcion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Completar mi Inscripción
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection
