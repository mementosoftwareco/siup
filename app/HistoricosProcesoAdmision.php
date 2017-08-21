<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\EstadosProcesoAdmision;

class HistoricosProcesoAdmision extends Model
{
    protected $primaryKey = 'id_historico_proceso';
	//
	protected $table = 'historicos_proceso_admision';
	
	
	
	public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
	
	public function estado()
    {
        return $this->belongsTo(EstadosProcesoAdmision::class, 'id_estado', 'id_estado');
    }
	
	
}
