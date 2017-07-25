Hola {{$persona->nombres }}, Continúa tu proceso de admisión en la Ibero!!

Queremos saber más acerca de Tí, Por favor completa un breve cuestionario: <a href="{{ $link = url('entrevista').'/'.urlencode($procesoAdmon->id_proceso_admon) }}"> {{ $link }} </a>
