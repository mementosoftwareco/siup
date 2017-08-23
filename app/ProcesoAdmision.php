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
	
	public function tipoProcesoAdmision()
    {
        return $this->belongsTo(TipoProcesoAdmision::class, 'id_tipo_proceso', 'id_tipo_proceso');
    }
	
	public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'id_inscripcion', 'id_inscripcion');
    }
	
	public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
	
	public function historicosProcesoAdmision()
    {
        return $this->hasToMany(HistoricosProcesoAdmision::class, 'id_proceso_admon', 'id_proceso_admon');
    }
	
}
