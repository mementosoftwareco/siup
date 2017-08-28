Hola {{$persona->nombres }}, Continúa tu proceso de admisión en la Ibero!!
<br><br>
Queremos saber más acerca de Tí, Por favor completa un breve cuestionario: 
<br><br>
<a href="{{ $link = url('entrevista').'/'.urlencode(encrypt($procesoAdmon->id_proceso_admon)) }}"> {{ $link }} </a>
