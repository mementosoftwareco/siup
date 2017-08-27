Hola {{$persona->nombres }},

Agradecemos que hayas confiado en nosotros para crear tu futuro profesional. Te confirmamos que has quedado preinscrito(a) al programa {{$inscripcion->nombre_programa}}.

Para continuar tu proceso te pedimos que nos proporciones algunos documentos, en este link podrás encontras mas detalles:

<a href="{{ $link = url('prepararCargaDocumentos').'/'.urlencode($proceso->id_proceso_admon) }}"> {{ $link }} </a>

Pronto nos comunicaremos contigo para continuar con tu proceso!


