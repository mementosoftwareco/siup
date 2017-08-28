Hola {{$persona->nombres }},
<br>
Agradecemos que hayas confiado en nosotros para crear tu futuro profesional. Te confirmamos que has quedado preinscrito(a) al programa {{$inscripcion->nombre_programa}}.
<br>
Para continuar tu proceso te pedimos que nos proporciones algunos documentos, en este link podrás encontras mas detalles:
<br>
<a href="{{ $link = url('prepararCargaDocumentosP').'/'.urlencode(encrypt($proceso->id_proceso_admon)) }}"> {{ $link }} </a>
<br>
Pronto nos comunicaremos contigo para continuar con tu proceso!


