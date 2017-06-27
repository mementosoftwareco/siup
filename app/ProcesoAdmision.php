<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class ProcesoAdmision extends Model
{
    protected $primaryKey = 'id_proceso_admon';
	//
	protected $table = 'procesos_admision';
	
		
	public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }
	
	public function estadoProceso()
    {
        return $this->belongsTo(EstadosProcesoAdmision::class, 'id_estado', 'id_estado');
    }
}
