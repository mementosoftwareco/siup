<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\EstadosProcesoAdmision;
use Auth;
use Carbon\Carbon;

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
	
	
	public static function storeHistoricoProceso($idEstado, $comentarios, $idProceso){
		$historico = new HistoricosProcesoAdmision;	
		if (Auth::user() != null){
			$historico->id_usuario = Auth::user()->id;	
		} else{
			$historico->id_usuario = null;
		}
			
		$historico->id_estado = $idEstado;
		$historico->comentarios = $comentarios;
		$historico->fecha = Carbon::now();
		$historico->id_proceso_admon = $idProceso;
		$historico->save();
	}
	
	
}
