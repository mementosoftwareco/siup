<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoTipoProceso extends Model
{
    //
	protected $table = 'documentos_tipo_proceso';
	protected $primaryKey = 'id';
	
	
	public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento', 'id_tipo_documento');
    }
	
	public function tipoProcesoAdmision()
    {
        return $this->belongsTo(TipoProcesoAdmision::class, 'id_tipo_proceso', 'id_tipo_proceso');
    }
	
	public function documento()
    {
        return $this->belongsTo(Documento::class,  'id', 'id_documento_tipo_proceso');
    }
	
	
	
}
