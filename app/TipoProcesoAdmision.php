<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProcesoAdmision extends Model
{
   protected $table = 'tipos_proceso';
   protected $primaryKey = 'id_tipo_proceso';
   
   protected $fillable = [
        'nombre', 'descripcion'
    ];
   
   
	public function procesoAdmision()
    {
        return $this->hasMany(ProcesoAdmision::class, 'id_tipo_proceso', 'id_tipo_proceso');
    }
	
	
	public function documentoTipoProceso()
    {
        return $this->hasMany(DocumentoTipoProceso::class, 'id_tipo_proceso', 'id_tipo_proceso');
    }
	

}
