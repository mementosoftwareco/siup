<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
	protected $table = 'documentos';
	protected $primaryKey = 'id_documento';
	protected $estado;
	
	public function tipoProcesoAdmision()
    {
        return $this->hasOne(DocumentoTipoProceso::class, 'id_documento_tipo_proceso', 'id');
    }
	
}
