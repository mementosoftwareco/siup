@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo Perfil
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('perfil') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="perfil-nombre" class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-6">
                                <input type="text" name="nombre" id="perfil-nombre" class="form-control" value="{{ old('perfil') }}">
                            </div>						
                        </div>
						
						
						<div class="form-group">                          
							<label for="perfil-descripcion" class="col-sm-3 control-label">Descripción</label>

                            <div class="col-sm-6">
                                <input type="text" name="descripcion" id="perfil-descripcion" class="form-control" value="{{ old('perfil') }}">
                            </div>							
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($perfiles) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Perfiles Disponibles
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <!--<thead>
                                <th>Perfil</th>
                                <th>&nbsp;</th>
                            </thead>-->
                            <tbody>
                                @foreach ($perfiles as $perfil)
                                    <tr>
                                        <td class="table-text"><div>{{ $perfil->nombre }}</div></td>
										
										<td class="table-text"><div>{{ $perfil->descripcion }}</div></td>
                                
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
